<?php

namespace App\Rules\Lesson;

use App\Models\CourseUser;
use Illuminate\Contracts\Validation\Rule;

class UserHaveCourse implements Rule
{

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {

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
        $courseUser = CourseUser::where('course_id', $value)->where('user_id', auth()->user()->user_id)->exists();

        return $courseUser;
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
