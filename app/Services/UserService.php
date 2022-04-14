<?php

namespace App\Services;

use App\DTO\UserDTO;
use App\Events\UserRegistered;
use App\Repositories\UserRepository;
use App\Repositories\UserSearchRepository;

class UserService {

    private UserRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository;
    }

    public function searchUsers(array $queryParams)
    {

        $repository = new UserSearchRepository;

        $repository->makeQuery($queryParams['filters']);
        $repository->orderBy($queryParams['order']);

        return $repository->paginateSearch($queryParams['paginate']);

    }


    public function create(array $attributes)
    {
        $userDTO = new UserDTO;

        $user = $this->userRepository->create($userDTO, $attributes);

        event(new UserRegistered($user));

        return $user;
    }

    public function updateUser(array $attributes, int $userId)
    {
        $userDTO = new UserDTO;

        $user = $this->userRepository->updateUser($userDTO, $attributes, $userId);

        return $user;
    }

}
