<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Response\APIResponse;
use App\Services\AuthService;
use App\Services\UserService;
use Exception;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function signUp(StoreUserRequest $request){
        try {

            $attributes = $request->validated();

            $service = new UserService;

            $service->create($attributes);

            return APIResponse::success([], 'Successfully created user!');

        }
        catch(Exception $e){
            return APIResponse::fail($e->getMessage(), [], 500);
        }
    }

    public function login(LoginRequest $request)
    {

        $service = new AuthService;

        $authenticated = $service->createToken($request->user(), $request->validated());

        return APIResponse::make(
                    $authenticated['http_code'] === 202,
                    $authenticated['details'],
                    $authenticated['message'],
                    $authenticated['http_code']);
    }

    public function logout(Request $request){

        $request->user()->token()->revoke();

        return APIResponse::success([], 'Successfully logged out', 202);
    }

    public function user(Request $request){

        return response()->json($request->user());
    }
}
