<?php

namespace App\Http\Resources\Category;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{


    const wrap = 'categories';

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        /** @var App/Models/Category $category */
        $category = $this;


        return [
            'id' => $category->category_id,
            'title' => $category->category_title,
            'photo-url' => $category->category_ico,
            'enabled' => $category->is_enabled
        ];
    }
}
