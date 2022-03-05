<?php

namespace App\Http\Controllers\Permission;

use App\Enums\PermissionRoleEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Permission\StoreUserRolRequest;
use App\Http\Response\APIResponse;
use App\Repositories\Permissions\UserRolRepository;
use Exception;

class RolUserController extends Controller
{
    public function assignRolToUser(StoreUserRolRequest $request)
    {
        try {
            $validatedRequest = $request->validated();

            $permission_level = $validatedRequest['permission_level'];

            $role = PermissionRoleEnum::tryFrom($permission_level) ?? PermissionRoleEnum::CLIENT;

            $repository = new UserRolRepository;
            $attachRolToUser = $repository->attachRolToUser($role, $request->user());

            return APIResponse::success($attachRolToUser, 'Attached Rol to User successfully');
        } catch (Exception $e) {
            return APIResponse::fail($e->getMessage(), 500);
        }
    }
}