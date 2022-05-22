<?php

namespace App\Repositories\Permissions;

use App\Enums\PermissionRoleEnum;
use App\Models\PermissionUser;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Log;

class UserRolRepository
{

    public function attachRolesToUser(array $roles, int $user_id)
    {
        try {

            DB::transaction(function () use ($roles, $user_id) {

                collect($roles)->each(fn ($permission_level) => PermissionUser::withDisabledRoles()->updateOrCreate(
                    ['user_id' => $user_id, 'permission_level' => $permission_level, 'is_enabled' => false],
                    ['is_enabled' => true]
                ));
            });

            return User::with('roles.rol')->find($user_id);
        } catch (Exception $e) {
            Log::error($e->getMessage(), [
                'LEVEL' => 'Repository',
                'TRACE' => $e->getTrace()
            ]);

            throw $e;
        }
    }

    public function unattachRolesToUser(array $roles, User $user)
    {
        try {
            $userRoles = $user->roles()->withDisabledRoles();

            $uniqueIds = $userRoles->whereIn('permission_level', $roles);

            return DB::transaction(function () use ($uniqueIds) {

                if ($uniqueIds->exists()) {
                    return $uniqueIds->update([
                        'is_enabled' => false
                    ]);
                }

                return false;
            });
        } catch (Exception $e) {
            Log::error($e->getMessage(), [
                'LEVEL' => 'Repository',
                'TRACE' => $e->getTrace() //ponerlo asi a todos
            ]);

            throw $e;
        }
    }
}
