<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Competition implements Rule
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

        $competition = \Modules\Game\Entities\Competition::find($value);

        if (!$competition)
            return false;

        if (!$competition->is_active)
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
        return 'This competition is no longer available!';
    }
}
