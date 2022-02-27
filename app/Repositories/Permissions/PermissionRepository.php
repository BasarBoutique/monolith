<?php

namespace App\Repositories\Permissions;

use App\Enums\PermissionRoleEnum;
use App\Models\Permission;
use App\Models\PermissionDetail;


class PermissionRepository  {

    public function createPermission(PermissionRoleEnum $role, array $attributes)
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

    public function editPermission(PermissionRoleEnum $role, array $search)
    {
        return true;
    }

    public function disablePermission(PermissionRoleEnum $role, array $search)
    {
        return true;
    }

}
