<?php

namespace App\Repositories\Permissions;

use App\Enums\PermissionRoleEnum;
use App\Models\PermissionHierarchy;
use Exception;
use Illuminate\Support\Facades\Log;

class RolRepository {


    public function showRoles()
    {
        try {
            $roles = PermissionHierarchy::all();

            return compact('roles');
        } catch (Exception $e) {
            Log::error($e->getMessage(),[
                'LEVEL' => 'Repository',
                'TRACE' => $e->getTrace()//ponerlo asi a todos
            ]);

            throw $e;
        }
        
    }

    public function createRol(PermissionRoleEnum $role, array $attributes)
    {
        try {
            $rol = PermissionHierarchy::create([
            'permission_level' => $role->value,
            'ph_label' => $attributes['label']
            ]);

            return $rol;
        } catch (Exception $e) {
            Log::error($e->getMessage(),[
                'LEVEL' => 'Repository',
                'TRACE' => $e->getTrace()//ponerlo asi a todos
            ]);

            throw $e;
        }
        
    }

    public function editRolLabel(PermissionRoleEnum $role, string $label)
    {
        try {
            $rol = PermissionHierarchy::findOrFail($role->value)->update(['ph_label' => $label]);

            return $rol;
        } catch (Exception $e) {
            Log::error($e->getMessage(),[
                'LEVEL' => 'Repository',
                'TRACE' => $e->getTrace()//ponerlo asi a todos
            ]);

            throw $e;
        }
        
    }

    public function disableRol(PermissionRoleEnum $role)
    {
        try {
            $rol = PermissionHierarchy::findOrFail($role->value)->update(['is_enabled' => false]);

            return $rol;
        } catch (Exception $e) {
            Log::error($e->getMessage(),[
                'LEVEL' => 'Repository',
                'TRACE' => $e->getTrace()//ponerlo asi a todos
            ]);

            throw $e;
        }
        
    }
}