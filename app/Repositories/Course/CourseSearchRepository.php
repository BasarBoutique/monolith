<?php

namespace App\Repositories\Course;

use App\Models\Courses;
use Exception;
use Illuminate\Support\Facades\Log;

class CourseSearchRepository
{

    private $courses;

    public function __construct()
    {
        $this->courses = new Courses();
    }

    public function searchById(int $courseId)
    {
        try {
            return Courses::find($courseId);
        } catch (Exception $e) {
            Log::error($e->getMessage(),[
                'LEVEL' => 'Repository',
                'TRACE' => $e->getTrace()//ponerlo asi a todos
            ]);

            throw $e;
        }

    }

    public function makeQuery(array $query)
    {
        $this->filterByCategories($query['categories'] ?? []);
        $this->filterByTitle($query['title'] ?? '');
        $this->filterByAuthors($query['authors'] ?? []);
        $this->courses->with('detail');
    }

    public function orderBy(array $order)
    {
        switch($order['sort_by'])
        {
            case 'author':
                break;
            case 'name':
                break;
            case 'category':
                break;
            case 'created':
                break;
        }
    }

    public function paginateSearch(int $limit = 20)
    {
        try {
            return $this->courses->paginate($limit);
        } catch (Exception $e) {
            Log::error($e->getMessage(),[
                'LEVEL' => 'Repository',
                'TRACE' => $e->getTrace()//ponerlo asi a todos
            ]);

            throw $e;
        }

    }

    private function filterByCategories(array $categories)
    {
        if(isset($categories) && !empty($categories)) {
            $this->courses = $this->courses->whereHas('category', function ($q) use ($categories) {
                $q->select('course_category.category_id')->whereIn('course_category.category_id', $categories);
            });
        }
    }

    private function filterByTitle(string $title)
    {
        if(!!$title && isset($title)) {
            $this->courses = $this->courses->where('course_title', 'LIKE', '%' . $title . '%');
        }
    }

    private function filterByAuthors(array $authors)
    {
        if(isset($authors) && !empty($authors)) {
            $this->courses = $this->courses->whereHas('detail', function ($detail) use ($authors) {
                $detail->whereIn('courses_details.cdetail_author', $authors);
            });
        }
    }



}
