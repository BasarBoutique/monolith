<?php

namespace App\Http\Controllers\Permission;

use App\Enums\PermissionRoleEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Permission\DettachRolRequest;
use App\Http\Requests\Permission\StoreUserRolRequest;
use App\Http\Resources\Permission\PermissionResource;
use App\Http\Resources\Permission\UserRolResource;
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

    public function assignRolesToUser(StoreUserRolRequest $request)
    {
        try {
            $validatedRequest = $request->validated();

            $permission_level = $validatedRequest['permission_level'];

            $roles = array_unique($permission_level);

            $params = [
                'roles' => array_map(function($value) {
                                return PermissionRoleEnum::tryFrom($value);
                            }, $roles),
                'user' => $validatedRequest['user']
            ];


            $attachRolToUser = $this->service->attachRolesToUser($params);

            $resource = new UserRolResource($attachRolToUser);

            return APIResponse::success($resource, 'Attached Roles to User successfully');

        } catch (Exception $e) {
            return APIResponse::fail($e->getMessage(), 500);
        }
    }

    public function dettachRolesToUser(DettachRolRequest $request)
    {
        try {

            $validatedRequest = $request->validated();

            $permission_level = $validatedRequest['permission_level'];

            $roles = array_unique($permission_level);

            $params = [
                'roles' => array_map(function($value) {
                                return PermissionRoleEnum::tryFrom($value);
                            }, $roles),
                'user' => $validatedRequest['user']
            ];

            $dettachRolToUser = $this->service->dettachRolesToUser($params);

            return APIResponse::success($dettachRolToUser, "Retrieve list of roles disabled of user");


        } catch (Exception $e) {

            return APIResponse::fail($e->getMessage(), 500);
        }
    }
}
