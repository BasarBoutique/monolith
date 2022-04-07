<?php

namespace App\Http\Controllers\Permission;

use App\Enums\PermissionRoleEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Core\AuthorizationAdminRequest;
use App\Http\Requests\Permission\StoreRolRequest;
use App\Http\Resources\Permission\PermissionResource;
use App\Http\Response\APIResponse;
use App\Repositories\Permissions\RolRepository;
use App\Services\Permission\PermissionService;
use Exception;

class RolController extends Controller
{

    private PermissionService $service;

    public function __construct()
    {
        $this->service = new PermissionService;
    }

    public function showRoles(Request $request)
    {
        try {

            $roles = $this->service->showRoles();

            $resource = PermissionResource::collection($roles);

            return APIResponse::success($resource, 'Retrieve list of roles');

        } catch (Exception $e) {

            return APIResponse::fail($e->getMessage(), 500);
        }
    }

    public function createRol(StoreRolRequest $request)
    {
        try {
            $validatedRequest = $request->validated();

            $role = PermissionRoleEnum::tryFrom($validatedRequest['permission_level']);

            $params = [
                'role' => $role,
                'attributes' => $validatedRequest
            ];

            $rolCreated = $this->service->createRol($params);

            return APIResponse::success($rolCreated->toArray(), 'Successfully created role!');
        }
        catch(Exception $e) {
            return APIResponse::fail($e->getMessage(), 500);
        }
    }
}
