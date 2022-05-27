<?php

namespace App\Services;

use App\DTO\User\UserGoogleDTO;
use App\DTO\UserDTO;
use App\Events\UserRegistered;
use App\Repositories\UserRepository;
use App\Services\Interfaces\UserServiceInterface;
use Exception;
use Illuminate\Support\Facades\Log;

class UserGoogleService extends UserService
{
    public function create(array $attributes)
    {
        try {
            $userDTO = new UserGoogleDTO;

            $repository = new UserRepository;

            $user = $repository->create($userDTO, $attributes);

            event(new UserRegistered($user));

            return $user;

        } catch (Exception $e) {
            
            Log::error($e->getMessage(), [
                'LEVEL' => 'Repository',
                'TRACE' => $e->getTrace()
            ]);

            throw $e;

        }
    }
}