<?php

namespace App\Http\Controllers\Permission;

use App\Enums\PermissionRoleEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Permission\DettachRolRequest;
use App\Http\Requests\Permission\StoreUserRolRequest;
use App\Http\Response\APIResponse;
use App\Services\Permission\PermissionService;
use Exception;

class RolUserController extends Controller
{

    private PermissionService $service;

    public function __construct()
    {
        $this->service = new PermissionService;
    }

    public function assignRolToUser(StoreUserRolRequest $request)
    {
        try {
            $validatedRequest = $request->validated();

            $permission_level = $validatedRequest['permission_level'];

            $role = PermissionRoleEnum::tryFrom($permission_level) ?? PermissionRoleEnum::CLIENT;

            $params = [
                'role' => $role,
                'user' => $validatedRequest['user']
            ];


            $attachRolToUser = $this->service->attachRolToUser($params);

            return APIResponse::success($attachRolToUser->toArray(), 'Attached Rol to User successfully');
        } catch (Exception $e) {
            return APIResponse::fail($e->getMessage(), 500);
        }
    }

    public function dettachRolToUser(DettachRolRequest $request)
    {
        try {

            $validatedRequest = $request->validated();

            $role = PermissionRoleEnum::tryFrom($validatedRequest['permission_level']);

            $params = [
                'role' => $role,
                'user' => $validatedRequest['user']
            ];

            $dettachRolToUser = $this->service->unattachRolToUser($params);


        } catch (Exception $e) {

            return APIResponse::fail($e->getMessage(), 500);
        }
    }
}
