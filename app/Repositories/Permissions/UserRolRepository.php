<?php

namespace App\Repositories\Permissions;

use App\Enums\PermissionRoleEnum;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserRolRepository {


    public function attachRolesToUser(array $roles, User $user)
    {

        $userRoles = $user->roles()->withDisabledRoles();

        $filteredRoles = $userRoles->pluck('permission_level')->toArray();

        $uniqueIds = array_filter($roles, function (PermissionRoleEnum $prol) use ($filteredRoles) {
            return !in_array($prol->value, $filteredRoles);
        });

        $roleIds = array_map(function (PermissionRoleEnum $prol) {

            return ['permission_level' => $prol];

        }, $uniqueIds);

        $transaction = DB::transaction(function () use ($roleIds, $userRoles) {

            if(empty($roleIds)) {
                return $userRoles->get();
            }

            return $userRoles->createMany($roleIds);

        });

        return $transaction->load('rol');
    }

    public function unattachRolesToUser(array $roles, User $user)
    {

        $userRoles = $user->roles();

        $roleIds = array_map(function(PermissionRoleEnum $rol) {

            return $rol->value;

        }, $roles);

        $uniqueIds = $userRoles->whereIn('permission_level', $roles);

        $transaction = DB::transaction(function () use ($uniqueIds, $userRoles) {

            if(!$uniqueIds->exists()) {
                return $userRoles->withDisabledRoles()->get();
            }

            $uniqueIds->update([
                'is_enabled' => false
            ]);


            return $userRoles->withDisabledRoles()->get();
        });

        return $transaction->load('rol');
    }
}
