<?php

namespace App\Repositories;

use App\DTO\Interfaces\DTOInterface;
use App\Events\UserRegistered;
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

            $user->user_detail()->create($userDTO['details']);

            event(new UserRegistered($user));

            return true;
        } catch (Exception $e) {

            Log::error($e->getMessage(), [
                'LEVEL' => 'Repository',
                'TRACE' => $e->getTraceAsString()
            ]);

            throw $e;

            return false;
        }
    }
}
