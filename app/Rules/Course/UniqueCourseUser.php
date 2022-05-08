<?php

namespace App\Rules\Course;

use App\Models\CourseUser;
use Illuminate\Contracts\Validation\Rule;

class UniqueCourseUser implements Rule
{

    public $user_id;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($user_id)
    {
        $this->user_id = $user_id;
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
        $exists = CourseUser::where('course_id', $value)->where('user_id', request()->get('user_id'))->exists();

        return !$exists;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The user has been attached to the course';
    }
}
