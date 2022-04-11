<?php

namespace App\Http\Resources\Course;

use App\Http\Resources\Core\PaginationResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseSearchResource extends JsonResource
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
            'courses' => CourseResource::collection($this->getCollection()),
            'filters' => $request->filters,
            'pagination' => new PaginationResource($this)
        ];
    }
}
