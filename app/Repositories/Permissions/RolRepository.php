<?php

namespace App\Repositories\Permissions;

use App\Enums\PermissionRoleEnum;
use App\Models\PermissionHierarchy;

class RolRepository {


    public function showRoles()
    {
        $roles = PermissionHierarchy::all();

        return $roles;
    }

    public function createRol(PermissionRoleEnum $role, array $attributes)
    {
        $rol = PermissionHierarchy::create([
            'permission_level' => $role->value,
            'ph_label' => $attributes['label']
        ]);

        return $rol;
    }

    public function editRolLabel(PermissionRoleEnum $role, string $label)
    {
        $rol = PermissionHierarchy::findOrFail($role->value)->update(['ph_label' => $label]);

        return $rol;
    }

    public function disableRol(PermissionRoleEnum $role)
    {
        $rol = PermissionHierarchy::findOrFail($role->value)->update(['is_enabled' => false]);

        return $rol;
    }
}
