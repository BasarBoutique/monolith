<?php

namespace App\Repositories\Lesson;

use App\Models\Lesson;
use Exception;
use Illuminate\Support\Facades\Log;
class LessonSearchRepository
{
    private $lessons;

    public function __construct()
    {
        $this->lessons = Lesson::with('detail');
    }

    public function makeQuery(array $query)
    {
        $this->withDisabledLessons($query['withDisabled'] ?? false);
        $this->filterByCourses($query['courses'] ?? []);
        $this->filterByTitle($query['title'] ?? '');

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
        try {
            return $this->lessons->paginate($limit);
        } catch (Exception $e) {
            Log::error($e->getMessage(),[
                'LEVEL' => 'Repository',
                'TRACE' => $e->getTrace()//ponerlo asi a todos
            ]);

            throw $e;
        }

    }

    private function withDisabledLessons($withDisabled = false)
    {
        $withDisabled = filter_var($withDisabled, FILTER_VALIDATE_BOOLEAN);

        if($withDisabled) {
            $this->lessons = $this->lessons->withDisabledLesson();
        }
    }

    private function filterByCourses(array $courses)
    {
        if(isset($courses) && !empty($courses)) {
            $this->lessons = $this->lessons->whereHas('course', function($q) use ($courses) {
                $q->select('courses.course_id')->whereIn('courses.course_id', $courses);
            });
        }
    }

    private function filterByTitle(string $title)
    {
        if(!!$title && isset($title) && strlen($title) > 3)
        {
            $this->lessons = $this->lessons->searchByTitle($title);
        }
    }
}
