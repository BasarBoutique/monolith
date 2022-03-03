<?php

namespace App\Services;

use App\DTO\UserDTO;
use App\Repositories\UserRepository;

class UserService {

    private $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository;
    }

    public function create(array $attributes)
    {
        $userDTO = new UserDTO;

        $user = $this->userRepository->create($userDTO, $attributes);

        return $user;
    }

    public function validateAuth(array $attributes)
    {

    }

    public function token(array $attributes)
    {
        
    }

}
