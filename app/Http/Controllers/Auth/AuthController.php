<?php

namespace App\Http\Controllers\Auth;

use App\Events\UserRegistered;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserDetail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function signUp(Request $request){
        try{
            $request->validate([
                'name'=>'required|string',
                'email'=>'required|string|email|unique:users',
                'password'=>'required|string',
                'details' => 'nullable|array'
            ]);

            $user = User::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>bcrypt($request->password)
            ]);

            $userDetails = optional($request->details);

            $user->user_detail()->create([
                'udetail_fullname' => $userDetails['fullname'] ?? $user->name,
                'udetail_photo' => $userDetails['photo'] ?? '',
                'udetail_direction'=> $userDetails['direction'] ?? '',
                'udetail_movil'=> $userDetails['movil'] ?? ''
            ]);

            event(new UserRegistered($user));

            return response()->json([
                'message'=>'Successfully created user!',
            ],201);

        }
        catch(Exception $e){
            return response()->json(['message'=>$e->getMessage()],500);
        }
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);

        $credentials = request(['email', 'password']);

        if (!Auth::attempt($credentials))
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);

        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');

        $token = $tokenResult->token;
        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();

        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse($token->expires_at)->toDateTimeString()
        ]);
    }

    public function logout(Request $request){
        $request->user()->token()->revoke();
        return response()->json([
            'message'=>'Successfully logged out'
        ]);
    }

    public function user(Request $request){
        return response()->json($request->user());
    }
}
