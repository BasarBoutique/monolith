<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchUsersRequest;
use App\Http\Resources\Auth\UserSearchResource;
use App\Http\Response\APIResponse;
use App\Services\UserService;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function updateUser()
    {
        try {

            $service = new UserService;


        } catch (Exception $e) {

            return APIResponse::fail($e->getMessage(), 500);
        }
    }

    public function searchAuthors()
    {

        try {

            $service = new UserService;

            $users = $service->slideAuthors();

            $resource = new UserSlideResource($users);

            return APIResponse::success($resource, 'Retrieve succesfully users');

        } catch (Exception $e) {
            return APIResponse::fail($e->getMessage(), 500);
        }

    }

    public function searchUsers(SearchUsersRequest $request)
    {

        try {

            $validatedRequest = $request->validated();

            $service = new UserService;

            $users = $service->searchUsers($validatedRequest);

            $resource = new UserSearchResource($users);

            return APIResponse::success($resource, 'Retrieve succesfully filtered users');

        } catch (Exception $e) {

            return APIResponse::fail($e->getMessage(), 500);
        }

    }

}
