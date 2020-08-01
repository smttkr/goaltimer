<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class createdAt implements Rule
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
        return preg_match('/^20[0-2][0-9]-[0-5][0-9]$/', $value) !== 0
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return '正しい形式で入力してください';
    }
}
