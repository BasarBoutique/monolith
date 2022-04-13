<?php

namespace App\Services;

use App\DTO\ImageDTO;
use App\DTO\UserDTO;
use App\Enums\ImageFolderEnum;
use App\Events\UserRegistered;
use App\Repositories\UserRepository;
use App\Repositories\UserSearchRepository;
use App\Services\Image\ImageService;

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

        $imageDTO = new ImageDTO;

        $user = $this->userRepository->create($userDTO, $attributes);

        $imageAttr = [
            'file' => $attributes['file'],
            'id' => $user->detail->udetail_uuid,
            'folder' => 'user'
        ];

        $imageService = new ImageService(app('firebase.storage'));

        $uploadImage = $imageService->uploadImage($imageDTO, $imageAttr);

        $user->detail->udetail_photo = $imageService->getUrlPath($uploadImage);

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
