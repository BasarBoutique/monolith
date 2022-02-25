<?php

namespace App\Repositories;

use App\Enums\PermissionRoleEnum;
use App\Models\Permission;
use App\Models\PermissionDetail;
use App\Models\PermissionUser;
use App\Models\User;

class PermissionRepository  {

    public function create(PermissionRoleEnum $role, array $attributes)
    {
        $permissionDetail = PermissionDetail::create([
            'pd_label' => $attributes['label'],
            'pd_description' => $attributes['description']
        ]);

        $permission = Permission::create([
            'permission_level' => $role,
            'pd_id' => $permissionDetail->pd_id,
            'is_enabled' => true,
        ]);

        return $permission;
    }

    public function attachRolToUser(PermissionRoleEnum $role, User $user)
    {
        $permissionUser = PermissionUser::create([
            'permission_level' => $role,
            'user_id' => $user->user_id
        ]);

        return $permissionUser;
    }
}
