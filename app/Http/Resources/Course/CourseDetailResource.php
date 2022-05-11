<?php

namespace App\Http\Resources\Course;

use Illuminate\Http\Resources\Json\JsonResource;

class CourseDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'about' => json_decode($this->cdetail_description),
            'author' => [
                'name' => $this->teacher->user_id,
                'photo_url' => $this->teacher->detail->udetailPhoto
            ]
        ];
    }

}
