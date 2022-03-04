<?php

namespace App\Http\Controllers\Permission;

use App\Enums\PermissionRoleEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Core\AuthorizationAdminRequest;
use App\Http\Requests\Permission\StoreRolRequest;
use App\Http\Response\APIResponse;
use App\Repositories\Permissions\RolRepository;
use Exception;

class RolController extends Controller
{
    public function showRoles(AuthorizationAdminRequest $request)
    {
        try {
            $repository = new RolRepository;

            return APIResponse::success($repository->showRoles(), 'Retrieve list of roles');
        } catch (Exception $e) {
            return APIResponse::fail($e->getMessage(), 500);
        }
    }

    public function createRol(StoreRolRequest $request)
    {
        try {
            $validatedRequest = $request->validated();
            $permission_level = $validatedRequest['permission_level'];
            $role = PermissionRoleEnum::tryFrom($permission_level);

            $repository = new RolRepository;

            $repository->createRol($role, $validatedRequest);

            return APIResponse::success([], 'Successfully created role!');
        }
        catch(Exception $e){
            return APIResponse::fail($e->getMessage(), 500);
        }
    }
}
