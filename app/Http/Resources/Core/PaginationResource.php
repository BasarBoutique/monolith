<?php

namespace App\Http\Resources\Core;

use Illuminate\Http\Resources\Json\JsonResource;

class PaginationResource extends JsonResource
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
            'first_page' => $this->url(1),
            'next_page' => $this->nextPageUrl(),
            'total' => $this->total(),
            'current_page' => $this->url($this->currentPage())
        ];
    }
}
