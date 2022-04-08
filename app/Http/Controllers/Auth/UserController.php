<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
}
