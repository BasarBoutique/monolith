<?php

namespace App\Repositories\Course;

use App\Models\CourseCategory;
use App\Models\Courses;

class CourseSearchRepository
{

    private Courses $courses;

    public function __construct()
    {
        $this->courses = new Courses;
    }

    public function searchById(int $courseId)
    {
        return Courses::find($courseId);
    }

    public function makeQuery(array $query)
    {
        $this->filterByCategories($query['categories']);
        $this->filterByTitle($query['title']);
        $this->filterByAuthors($query['authors']);
        $this->order($query['order']);
    }

    public function paginateSearch(int $limit = 20)
    {
        return $this->courses->paginate($limit);
    }


    private function filterByCategories(array $categories)
    {
        if(isset($categories) && !empty($categories)) {
            $this->courses->whereHas('category', function ($q) use ($categories) {
                $q->whereIn('category_id', $categories);
            });
        }
    }

    private function filterByTitle(string $title)
    {
        if(isset($title)) {
            $this->courses->where('course_title', 'LIKE', '%' . $title . '%');
        }
    }

    private function filterByAuthors(array $authors)
    {
        if(isset($authors) && !empty($authors)) {
            $this->courses->whereHas('detail', function ($detail) use ($authors) {
                $detail->whereIn('cdetail_author', $authors);
            });
        }
    }

    private function order(array $order)
    {
        switch($order['by'])
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

        return $this->courses;
    }

}
