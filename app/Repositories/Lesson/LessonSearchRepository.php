<?php

namespace App\Repositories\Lesson;

use App\Models\Lesson;

class LessonSearchRepository
{
    private $lessons;

    public function __construct()
    {
        $this->lessons = new Lesson;
    }

    public function makeQuery(array $query)
    {
        $this->withDisabledLessons($query['withDisabled'] ?? false);
        $this->filterByCourses($query['courses'] ?? []);
        $this->filterByTitle($query['title'] ?? '');
        $this->lessons->load('detail');
    }

    public function orderBy(array $order)
    {
        switch ($order['sort_by']) {
            case 'course':
                break;
            case 'title':
                break;
            case 'created':
                break;
        }
    }

    public function paginateSearch(int $limit = 20)
    {
        return $this->lessons->paginate($limit);
    }

    private function withDisabledLessons($withDisabled)
    {
        $withDisabled = filter_var($withDisabled, FILTER_VALIDATE_BOOLEAN);

        if($withDisabled) {
            $this->lessons->withDisabledLesson();
        }
    }

    private function filterByCourses(array $courses)
    {
        if(isset($courses) && !empty($courses)) {
            $this->lessons->whereHas('course', function($q) use ($courses) {
                $q->select('courses.course_id')->whereIn('courses.course_id', $courses);
            });
        }
    }

    private function filterByTitle(string $title)
    {
        if(!!$title && isset($title) && strlen($title) > 3)
        {
            $this->lessons->searchByTitle($title);
        }
    }
}
