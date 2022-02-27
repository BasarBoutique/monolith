<?php

namespace App\Observers\Permission;

use App\Enums\RoleLogEnum;
use App\Models\PermissionLog;
use App\Models\PermissionUser;
use Illuminate\Support\Facades\Log;

class UserRolObserver
{
    /**
     * Handle the PermissionUser "created" event.
     *
     * @param  \App\Models\PermissionUser  $permissionUser
     * @return void
     */
    public function created(PermissionUser $permissionUser)
    {
        $permissionLog = PermissionLog::create([
            'plog_context' => RoleLogEnum::ROL_USER_GRANTED,
            'plog_author' => optional(request()->user())->user_id ?? 'SYSTEM'
        ]);

        Log::info('New role has been created', [
            'context' => $permissionLog->plog_context,
            'author' => $permissionLog->plog_author,
            'details' => [
                'permission_level' => $permissionUser->permission_level,
                'user' => $permissionUser->user_id
            ]
        ]);
    }

    /**
     * Handle the PermissionUser "updated" event.
     *
     * @param  \App\Models\PermissionUser  $permissionUser
     * @return void
     */
    public function updated(PermissionUser $permissionUser)
    {
        //
    }

    /**
     * Handle the PermissionUser "deleted" event.
     *
     * @param  \App\Models\PermissionUser  $permissionUser
     * @return void
     */
    public function deleted(PermissionUser $permissionUser)
    {
        //
    }

    /**
     * Handle the PermissionUser "restored" event.
     *
     * @param  \App\Models\PermissionUser  $permissionUser
     * @return void
     */
    public function restored(PermissionUser $permissionUser)
    {
        //
    }

    /**
     * Handle the PermissionUser "force deleted" event.
     *
     * @param  \App\Models\PermissionUser  $permissionUser
     * @return void
     */
    public function forceDeleted(PermissionUser $permissionUser)
    {
        //
    }
}
