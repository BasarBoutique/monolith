<?php

namespace App\Services;

use App\DTO\UserDTO;
use App\Events\UserRegistered;
use App\Repositories\UserRepository;

class UserService {

    private UserRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository;
    }

    public function create(array $attributes)
    {
        $userDTO = new UserDTO;

        $user = $this->userRepository->create($userDTO, $attributes);

        event(new UserRegistered($user));

        return $user;
    }

    public function updateUser(array $attributes)
    {

    }

}
