<?php

namespace App\Rules\Course;

use App\Enums\PermissionRoleEnum;
use App\Models\PermissionUser;
use Illuminate\Contracts\Validation\Rule;

class IsTeacher implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        return PermissionUser::where('permission_level', PermissionRoleEnum::TEACHER)->where('user_id', $value)->exists();
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
