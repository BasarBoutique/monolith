<?php

namespace App\Services\Permission;

use App\Models\PermissionHierarchy;
use App\Repositories\Permissions\PermissionRepository;
use App\Repositories\Permissions\RolRepository;
use App\Repositories\Permissions\UserRolRepository;
use Nette\NotImplementedException;
use Exception;
use Illuminate\Support\Facades\Log;
class PermissionService
{
    public function showRoles()
    {
        try {
            $roles = PermissionHierarchy::all();

            $roles->load('permissions');

            return $roles;
        } catch (Exception $e) {
            Log::error($e->getMessage(),[
                'LEVEL' => 'Service',
                'TRACE' => $e->getTrace()//ponerlo asi a todos
            ]);

            throw $e;
        }

        
    }

    public function createPermission(array $params)
    {
        try {
            $repository = new PermissionRepository;

            return $repository->createPermission($params['role'], $params['attributes']);
        } catch (Exception $e) {
            Log::error($e->getMessage(),[
                'LEVEL' => 'Service',
                'TRACE' => $e->getTrace()//ponerlo asi a todos
            ]);

            throw $e;
        }
        
    }

    public function createRol(array $params)
    {
        try {
            $repository = new RolRepository;

            return $repository->createRol($params['role'], $params['attributes']);
        } catch (Exception $e) {
            Log::error($e->getMessage(),[
                'LEVEL' => 'Service',
                'TRACE' => $e->getTrace()//ponerlo asi a todos
            ]);

            throw $e;
        }
        
    }

    public function editPermission(array $params)
    {
        throw new NotImplementedException("Edit permission");
    }

    public function editRolLabel(array $params)
    {
        try {
            $repository = new RolRepository;

            return $repository->editRolLabel($params['role'], $params['label']);
        } catch (Exception $e) {
            Log::error($e->getMessage(),[
                'LEVEL' => 'Service',
                'TRACE' => $e->getTrace()//ponerlo asi a todos
            ]);

            throw $e;
        }
        
    }

    public function disablePermission(array $params)
    {
        throw new NotImplementedException("Disabled permission");
    }

    public function disableRol(array $params)
    {
        try {
            $repository = new RolRepository;

            return $repository->disableRol($params['role']);
        } catch (Exception $e) {
            Log::error($e->getMessage(),[
                'LEVEL' => 'Service',
                'TRACE' => $e->getTrace()//ponerlo asi a todos
            ]);

            throw $e;
        }
        
    }

    public function attachRolesToUser(array $params)
    {
        try {
            $repository = new UserRolRepository;

            return $repository->attachRolesToUser($params['roles'], $params['user']);
        } catch (Exception $e) {
            Log::error($e->getMessage(),[
                'LEVEL' => 'Service',
                'TRACE' => $e->getTrace()//ponerlo asi a todos
            ]);

            throw $e;
        }
        
    }

    public function dettachRolesToUser(array $params)
    {
        try {
            $repository = new UserRolRepository;

            return $repository->unattachRolesToUser($params['roles'], $params['user']);
        } catch (Exception $e) {
            Log::error($e->getMessage(),[
                'LEVEL' => 'Service',
                'TRACE' => $e->getTrace()//ponerlo asi a todos
            ]);

            throw $e;
        }

        
    }


}
