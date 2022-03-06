<?php
    
namespace App\Repositories\Lesson;

use App\Models\Lesson;

class LessonRepository{

    public function Lesson(){
        $lesson = Lesson::all()->where('is_enabled',true);
        return compact('lesson');
    }
    
    public function Lessonshow()
    {
        //set model name in here, this is necessary!
    }

    public function Lessoncreate()
    {
        //set model name in here, this is necessary!
    }

    public function Lessonedit()
    {
        //set model name in here, this is necessary!
    }
        
    public function Lessondisable()
    {
        //set model name in here, this is necessary!
    }

}