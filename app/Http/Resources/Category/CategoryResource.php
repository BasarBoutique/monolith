<?php

namespace App\Http\Resources\Category;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
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
            'category' => $category->category_title,
            'photo' => $category->category_ico,
            'enabled' => boolval($category->is_enabled)
        ];
    }
}
