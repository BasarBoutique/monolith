<?php

namespace App\Http\Controllers\Permission;

use App\Enums\PermissionRoleEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Permission\StoreUserRolRequest;
use App\Repositories\Permissions\UserRolRepository;

class RolUserController extends Controller
{
    public function assignRolToUser(StoreUserRolRequest $request)
    {
        $validatedRequest = $request->validated();

        $permission_level = $validatedRequest['permission_level'];

        $role = PermissionRoleEnum::tryFrom($permission_level) ?? PermissionRoleEnum::CLIENT;

        $repository = new UserRolRepository;

        return $repository->attachRolToUser($role, $request->user());
    }
}
