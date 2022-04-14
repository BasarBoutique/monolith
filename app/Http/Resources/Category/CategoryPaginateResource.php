<?php

namespace App\Http\Resources\Category;

use App\Http\Resources\Core\PaginationResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryPaginateResource extends JsonResource
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
            'categories' => CategoryResource::collection($this->getCollection()),
            'pagination' => new PaginationResource($this)
        ];
    }
}
