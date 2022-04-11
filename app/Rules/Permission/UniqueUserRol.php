<?php

namespace App\Rules\Permission;

use App\Models\PermissionUser;
use Illuminate\Contracts\Validation\Rule;

class UniqueUserRol implements Rule
{

    private $userId;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($userId)
    {
        $this->userId = $userId;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $values
     * @return bool
     */
    public function passes($attribute, $values)
    {
        $permissionUser = PermissionUser::withDisabledRoles()->whereIn('permission_level', $values)->where('user_id', $this->userId)->exists();

        return !$permissionUser;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
