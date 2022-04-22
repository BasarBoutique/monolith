<?php

namespace App\Repositories;

use App\DTO\Interfaces\DTOInterface;
use App\Enums\PermissionRoleEnum;
use App\Models\PermissionUser;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserRepository
{
    public function create(DTOInterface $dto, array $attributes)
    {
        try {

            $userDTO = $dto::make($attributes);

            return DB::transaction(function () use ($userDTO) {

                $user = User::create($userDTO);

                $user->detail()->create($userDTO['detail']);

                $user->roles()->create(['permission_level' => PermissionRoleEnum::CLIENT]);

                $user->load(['roles', 'detail']);

                return $user;
            });


        } catch (Exception $e) {

            Log::error($e->getMessage(), [
                'LEVEL' => 'Repository',
                'TRACE' => $e->getTrace()
            ]);

           return null;
        }
    }

    public function updateUser(DTOInterface $dto, array $attributes, int $userId)
    {
        try {

            $userDTO = $dto::make($attributes);

            $user = User::findOrFail($userId);

            $user->update($userDTO);

            if(!empty($userDTO['detail'])) {
                $user->detail()->update($userDTO['detail']);
            }

            return $user;

        } catch (\Exception $e) {

            throw $e;

            Log::error($e->getMessage(), [
                'LEVEL' => 'Repository',
                'TRACE' => $e->getTrace()
            ]);
        }
    }


}
