<?php

namespace App\Repositories\Permissions;

use App\Enums\PermissionRoleEnum;
use App\Models\PermissionUser;
use App\Models\User;

class UserRolRepository {


    public function attachRolToUser(PermissionRoleEnum $role, User $user)
    {
        $permissionUser = PermissionUser::create([
            'permission_level' => $role,
            'user_id' => $user->user_id
        ]);

        return $permissionUser;
    }

    public function unattachRolToUser(PermissionRoleEnum $role, int $user_id)
    {
        $permissionUser = PermissionUser::where('permission_level', $role)->where('user_id', $user_id)->first();

        $permissionUser->update([
            'is_enabled' => false
        ]);

        return $permissionUser;
    }
}
