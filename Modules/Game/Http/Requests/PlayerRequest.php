<?php


namespace Modules\Game\Http\Requests;


use App\Rules\Competition;
use App\Rules\CompetitionMaxPlayers;
use Illuminate\Foundation\Http\FormRequest;

class PlayerRequest extends FormRequest
{
    public function rules()
    {
        $competition = new Competition();
        $competitionMaxPlayers = new CompetitionMaxPlayers();
        return [
            'name' => 'required',
            'competition_id' => ['required',$competition,$competitionMaxPlayers],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The player name is required!',
            'competition_id.required' => 'The competition is required!',
        ];
    }
}
