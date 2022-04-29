<?php

namespace App\Repositories\Permissions;

use App\Enums\PermissionRoleEnum;
use App\Models\Permission;
use App\Models\PermissionDetail;
use Exception;
use Illuminate\Support\Facades\Log;

class PermissionRepository  {

    public function createPermission(PermissionRoleEnum $role, array $attributes)
    {
        try {
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
        } catch (Exception $e) {
            Log::error($e->getMessage(),[
                'LEVEL' => 'Repository',
                'TRACE' => $e->getTrace()//ponerlo asi a todos
            ]);

            throw $e;
        }
        
    }

    public function editPermission(PermissionRoleEnum $role, array $search)
    {
        try {
            return true;
        } catch (Exception $e) {
            Log::error($e->getMessage(),[
                'LEVEL' => 'Repository',
                'TRACE' => $e->getTrace()//ponerlo asi a todos
            ]);

            throw $e;
        }
        
    }

    public function disablePermission(PermissionRoleEnum $role, array $search)
    {
        try {
            return true;
        } catch (Exception $e) {
            Log::error($e->getMessage(),[
                'LEVEL' => 'Repository',
                'TRACE' => $e->getTrace()//ponerlo asi a todos
            ]);

            throw $e;
        }
        
    }

}
