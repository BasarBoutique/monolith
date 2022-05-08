<?php

namespace App\Http\Resources\Course;

use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        /** @var \App\Models\Courses $course */
        $course = $this;

        return [
            'id' => $course->course_id,
            'title' => $course->course_title,
            'photo' => $course->course_photo,
            'detail' => new CourseDetailResource($this->whenLoaded('detail')),
            'category' => $this->whenLoaded('category', function () {
                return $this->category->category_id;
            }),
            'nro_lessons' => $this->countLessons(),
            'enabled' => $this->is_enabled,
            'updatedAt' => $this->updated_at
        ];
    }
}
