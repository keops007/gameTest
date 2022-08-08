<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CompetitionMaxPlayers implements Rule
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
        $competition = \Modules\Game\Entities\Competition::find($value);

        if ($competition->nr_of_players+1 > $competition->players_number)
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
        return 'This competition has reached the maximum numbers of players!';
    }
}
