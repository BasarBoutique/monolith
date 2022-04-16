<?php

namespace App\Http\Resources\Auth;

use App\Http\Resources\Core\PaginationResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserSearchResource extends JsonResource
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
            'users' => UserResource::collection($this->getCollection()),
            'filters' => $request->filters,
            'paginate' => new PaginationResource($this)
        ];
    }
}
