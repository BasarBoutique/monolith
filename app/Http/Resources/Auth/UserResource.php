<?php

namespace App\Http\Resources\Auth;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        /** @var \App\Models\User $user */
        $user = $this;
        return [
            'id' => $user->user_id,
            'name' => $user->name,
            'email' => $user->email,
            'detail' => $user->detail,
            'permissions' => $this->whenLoaded('permissions', function () {
                return 'permisos';
            }),
        ];
    }
}
