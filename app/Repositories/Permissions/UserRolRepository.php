<?php

namespace App\Repositories\Permissions;

use App\Enums\PermissionRoleEnum;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Log;

class UserRolRepository {


    public function attachRolesToUser(array $roles, User $user)
    {
        try {
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
        } catch (Exception $e) {
            Log::error($e->getMessage(),[
                'LEVEL' => 'Repository',
                'TRACE' => $e->getTrace()//ponerlo asi a todos
            ]);

            throw $e;
        }

        
    }

    public function unattachRolesToUser(array $roles, User $user)
    {
        try {
            $userRoles = $user->roles();

            $uniqueIds = $userRoles->whereIn('permission_level', $roles);

            return DB::transaction(function () use ($uniqueIds) {

                if($uniqueIds->exists()) {
                    return $uniqueIds->update([
                        'is_enabled' => false
                    ]);

                }

                return false;
            });
        } catch (Exception $e) {
            Log::error($e->getMessage(),[
                'LEVEL' => 'Repository',
                'TRACE' => $e->getTrace()//ponerlo asi a todos
            ]);

            throw $e;
        }

        


    }
}
