<?php

namespace App\Services;

use App\DTO\ImageDTO;
use App\DTO\UserDTO;
use App\Enums\ImageFolderEnum;
use App\Events\UserRegistered;
use App\Repositories\UserRepository;
use App\Repositories\UserSearchRepository;
use App\Services\Image\ImageService;
use Exception;
use Illuminate\Support\Facades\Log;

class UserService {

    private UserRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository;
    }

    public function slideAuthors()
    {
        try {
            $authors = $this->userRepository->showAllCategories(Category::SLIDE_PER_PAGE);


            return $repository->paginateSearch($queryParams['paginate']);
        } catch (Exception $e) {
            Log::error($e->getMessage(),[
                'LEVEL' => 'Service',
                'TRACE' => $e->getTrace()//ponerlo asi a todos
            ]);

            throw $e;
        }

        

    }

    public function searchUsers(array $queryParams)
    {
        try {
            $repository = new UserSearchRepository;

            $repository->makeQuery($queryParams['filters']);
            $repository->orderBy($queryParams['order']);

            return $repository->paginateSearch($queryParams['paginate']);
        } catch (Exception $e) {
            Log::error($e->getMessage(),[
                'LEVEL' => 'Service',
                'TRACE' => $e->getTrace()//ponerlo asi a todos
            ]);

            throw $e;
        }

        

    }


    public function create(array $attributes)
    {
        try {
            $userDTO = new UserDTO;

            $imageDTO = new ImageDTO;

            $imageService = new ImageService(app('firebase.storage'));

            $imageAttr = [
                'file' => $attributes['file'],
                'id' => null,
                'folder' => 'user'
            ];

            $uploadImage = $imageService->uploadImage($imageDTO, $imageAttr);

            $attributes['detail']['photo'] = $uploadImage['name'];

            $user = $this->userRepository->create($userDTO, $attributes);

            if(is_null($user)) {
                throw new Exception("Has been ocurred error when proceed to register user");
            }

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

    public function updateUser(array $attributes, int $userId)
    {
        try {
            $userDTO = new UserDTO;

            $user = $this->userRepository->updateUser($userDTO, $attributes, $userId);

            return $user;
        } catch (Exception $e) {
            Log::error($e->getMessage(),[
                'LEVEL' => 'Repository',
                'TRACE' => $e->getTrace()//ponerlo asi a todos
            ]);

            throw $e;
        }
        
    }

}
