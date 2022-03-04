<?php

namespace App\Http\Controllers\Permission;

use App\Enums\PermissionRoleEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Core\AuthorizationAdminRequest;
use App\Http\Requests\Permission\StoreRolRequest;
use App\Repositories\Permissions\RolRepository;

class RolController extends Controller
{
    public function showRoles(AuthorizationAdminRequest $request)
    {
        $repository = new RolRepository;

        return $repository->showRoles();
    }

    public function createRol(StoreRolRequest $request)
    {
        $validatedRequest = $request->validated();
        $permission_level = $validatedRequest['permission_level'];

        $role = PermissionRoleEnum::tryFrom($permission_level);

        $repository = new RolRepository;

        return $repository->createRol($role, $validatedRequest);

    }
}