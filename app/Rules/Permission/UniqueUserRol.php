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
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return PermissionUser::where('permission_level', $value)->where('user_id', $this->userId)->count() == 0;
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
