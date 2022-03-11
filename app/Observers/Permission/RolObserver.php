<?php

namespace App\Observers\Permission;

use App\Enums\RoleLogEnum;
use App\Models\PermissionHierarchy;
use App\Models\PermissionLog;
use Illuminate\Support\Facades\Log;

class RolObserver
{
    /**
     * Handle the PermissionHierarchy "created" event.
     *
     * @param  \App\Models\PermissionHierarchy  $permissionHierarchy
     * @return void
     */
    public function created(PermissionHierarchy $permissionHierarchy)
    {
        $permissionLog = PermissionLog::create([
            'plog_context' => RoleLogEnum::ROLE_CREATED,
            'plog_author' => optional(request()->user())->user_id ?? 'SYSTEM'
        ]);

        Log::info('New role has been created', [
            'context' => $permissionLog->plog_context,
            'author' => $permissionLog->plog_author,
            'details' => [
                'permission_level' => $permissionHierarchy->permission_level,
                'label' => $permissionHierarchy->ph_label
            ]
        ]);
    }

    /**
     * Handle the PermissionHierarchy "updated" event.
     *
     * @param  \App\Models\PermissionHierarchy  $permissionHierarchy
     * @return void
     */
    public function updated(PermissionHierarchy $permissionHierarchy)
    {
        //
    }

    /**
     * Handle the PermissionHierarchy "deleted" event.
     *
     * @param  \App\Models\PermissionHierarchy  $permissionHierarchy
     * @return void
     */
    public function deleted(PermissionHierarchy $permissionHierarchy)
    {
        //
    }

    /**
     * Handle the PermissionHierarchy "restored" event.
     *
     * @param  \App\Models\PermissionHierarchy  $permissionHierarchy
     * @return void
     */
    public function restored(PermissionHierarchy $permissionHierarchy)
    {
        //
    }

    /**
     * Handle the PermissionHierarchy "force deleted" event.
     *
     * @param  \App\Models\PermissionHierarchy  $permissionHierarchy
     * @return void
     */
    public function forceDeleted(PermissionHierarchy $permissionHierarchy)
    {
        //
    }
}
