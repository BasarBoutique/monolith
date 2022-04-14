<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\Auth\UserResource;
use App\Http\Response\APIResponse;
use App\Models\User;
use App\Services\AuthService;
use App\Services\UserService;
use Exception;
use Google_AccessToken_Verify;
use Google_Client;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function signUp(StoreUserRequest $request){
        try {

            $attributes = $request->validated();

            $service = new UserService;

            $user = $service->create($attributes);

            $resource = new UserResource($user);

            return APIResponse::success($resource, 'Successfully created user!');

        }
        catch(Exception $e){
            return APIResponse::fail($e->getMessage(), 500);
        }
    }

    public function loginWithGoogle(Request $request)
    {
        try {
            $token = app(Google_AccessToken_Verify::class)->verifyIdToken($request->idToken);

            if(!$token) {
                return APIResponse::fail("Token is expired.", 403);
            }

            $service = new UserService;



            return APIResponse::success(['token' => $token], '');
        } catch (Exception $e) {

            return APIResponse::fail($e->getMessage());
        }
    }

    public function login(LoginRequest $request)
    {

        try {
            $service = new AuthService;

            $authenticated = $service->createToken($request->user(), $request->validated());

            return APIResponse::make(
                $authenticated['http_code'] === 202,
                $authenticated['details'],
                $authenticated['message'],
                $authenticated['http_code']);

        } catch (Exception $e) {
            return APIResponse::fail($e->getMessage(), 500);
        }
    }

    public function logout(Request $request){

        try {
            $request->user()->token()->revoke();

            return APIResponse::success([], 'Successfully logged out', 202);
        } catch (Exception $e) {
            return APIResponse::fail($e->getMessage(), 500);
        }
    }

    public function user(Request $request) {

        try {

            $user = User::find($request->user()->user_id)->load('detail', 'roles');

            $resource = new UserResource($user);

            return APIResponse::success($resource, 'Retrieve successfully user');

        } catch (Exception $e){
            return APIResponse::fail($e->getMessage(), 500);
        }
    }
}
