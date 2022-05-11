<?php

namespace App\Http\Resources\Course;

use Illuminate\Http\Resources\Json\JsonResource;

class CoursesUserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $course = $this->course;
        $author = $course->detail->teacher;

        return [
            'id' => $this->cu_id,
            'purcharsed_at' => $this->registered_at,
            'course' => [
                'id' => $course->course_id,
                'title' => $course->course_title,
                'image' => $course->course_photo
            ],
            'author' => [
                'id' => $author->user_id,
                'name' => $author->name
            ]
        ];
    }
}
