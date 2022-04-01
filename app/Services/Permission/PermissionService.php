<?php

namespace App\Services\Permission;

use App\Models\PermissionHierarchy;
use App\Repositories\Permissions\PermissionRepository;
use App\Repositories\Permissions\RolRepository;
use App\Repositories\Permissions\UserRolRepository;
use Nette\NotImplementedException;

class PermissionService
{
    public function showRoles()
    {
        return PermissionHierarchy::all();
    }

    public function createPermission(array $params)
    {
        $repository = new PermissionRepository;

        return $repository->createPermission($params['role'], $params['attributes']);
    }

    public function createRol(array $params)
    {
        $repository = new RolRepository;

        return $repository->createRol($params['role'], $params['attributes']);
    }

    public function editPermission(array $params)
    {
        throw new NotImplementedException("Edit permission");
    }

    public function editRolLabel(array $params)
    {
        $repository = new RolRepository;

        return $repository->editRolLabel($params['role'], $params['label']);
    }

    public function disablePermission(array $params)
    {
        throw new NotImplementedException("Disabled permission");
    }

    public function disableRol(array $params)
    {
        $repository = new RolRepository;

        return $repository->disableRol($params['role']);
    }

    public function attachRolToUser(array $params)
    {
        $repository = new UserRolRepository;

        return $repository->attachRolToUser($params['role'], $params['user']);
    }

    public function unattachRolToUser(array $params)
    {
        throw new NotImplementedException("unattach rol to user");
    }


}
