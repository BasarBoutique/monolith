<?php

namespace App\Repositories;

use App\DTO\Interfaces\DTOInterface;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Log;

class UserRepository
{
    public function create(DTOInterface $dto, array $attributes)
    {
        try {
            $userDTO = $dto::make($attributes);

            $user = User::create($userDTO);

            $user->detail()->create($userDTO['details']);

            $user->load('detail', 'permissions');

            return $user;
        } catch (Exception $e) {

            Log::error($e->getMessage(), [
                'LEVEL' => 'Repository',
                'TRACE' => $e->getTraceAsString()
            ]);

           return null;
        }
    }

    public function updateUser(DTOInterface $dto, array $attributes)
    {
        try {

            $userDTO = $dto::make($attributes);

            // $user = User::findOrFail($user)

        } catch (\Exception $e) {

            throw $e;

            Log::error($e->getMessage(), [
                'LEVEL' => 'Repository',
                'TRACE' => $e->getTraceAsString()
            ]);
        }
    }


}
