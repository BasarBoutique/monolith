<?php

namespace App\Http\Resources\Auth;

use App\Http\Resources\Permission\PermissionResource;
use App\Models\PermissionHierarchy;
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
            'email' => $user->email,
            'detail' => $this->whenLoaded('detail', function () {

                $detail = $this->detail;

                return [
                    'fullname' => $detail->udetail_fullname,
                    'photo' => $detail->udetail_photo,
                    'address' => $detail->udetail_direction,
                    'phone' => $detail->udetail_movil,
                    'uuid' => $detail->udetail_uuid
                ];
            }),
            'roles' => $this->whenLoaded('roles', function () {
                $roles = $this->roles->load('rol')->pluck('rol');
                return PermissionResource::collection($roles);

            }),
        ];
    }
}
