<?php

namespace App\Repositories\Course;

use App\Models\Courses;

class CourseSearchRepository
{

    private $courses;

    public function __construct()
    {
        $this->courses = Courses::with(['detail']);
    }

    public function searchById(int $courseId)
    {
        return Courses::find($courseId);
    }

    public function makeQuery(array $query)
    {
        $this->filterByCategories($query['categories'] ?? []);
        $this->filterByTitle($query['title'] ?? '');
        $this->filterByAuthors($query['authors'] ?? []);
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
        return $this->courses->paginate($limit);
    }

    private function filterByCategories(array $categories)
    {
        if(isset($categories) && !empty($categories)) {
            $this->courses->whereHas('category', function ($q) use ($categories) {
                $q->select('course_category.category_id')->whereIn('course_category.category_id', $categories);
            });
        }
    }

    private function filterByTitle(string $title)
    {
        if(!!$title && isset($title) && strlen($title) > 3) {
            $this->courses->where('course_title', 'LIKE', '%' . $title . '%');
        }
    }

    private function filterByAuthors(array $authors)
    {
        if(isset($authors) && !empty($authors)) {
            $this->courses->whereHas('detail', function ($detail) use ($authors) {
                $detail->whereIn('courses_details.cdetail_author', $authors);
            });
        }
    }



}
