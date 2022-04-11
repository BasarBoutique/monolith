<?php

namespace App\Http\Resources\Lesson;

use Illuminate\Http\Resources\Json\JsonResource;

class LessonResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        /** @var App/Models/Lesson $lesson */
        $lesson = $this;

        return [
            'id' => $lesson->lesson_id,
            'curso' => $lesson->course_id,
            'lesson' => $lesson->ld_id,
            'detail' => $this->whenLoaded('detail', function () use ($lesson) {
                return new LessonDetailResource($lesson->detail);
            }),
            'enabled' => boolval($lesson->is_enabled)
        ];
    }
}
