<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Player implements Rule
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
        if (!$value)
            return  false;

        $competition = \Modules\Game\Entities\Player::find($value);

        if (!$competition)
            return false;

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'This player is no longer available!';
    }
}
