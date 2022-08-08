<?php


namespace Modules\Game\Http\Requests;


use App\Rules\Competition;
use App\Rules\CompetitionMaxPlayers;
use App\Rules\Player;
use Illuminate\Foundation\Http\FormRequest;

class PlayerPointsRequest extends FormRequest
{
    public function rules()
    {
        return [
            'player_id' => 'required|integer',
            'competition_id' => 'required|integer',
            'points' => 'required|integer|max:1',
        ];
    }

    public function messages()
    {
        return [
            'player_id.required' => 'The player is required!',
            'player_id.integer' => 'The player id must be an integer!',

            'competition_id.required' => 'The competition is required!',
            'competition_id.integer' => 'The competition id must be an integer!',

            'points.required' => 'The nr. of points is required!',
            'points.integer' => 'The nr. of points must be an integer!',
            'points.max' => 'You cannot add more than one point!',
        ];
    }
}
