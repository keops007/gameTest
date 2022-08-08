<?php


namespace Modules\Game\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class CompetitionRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|unique:game_competition',
            'players_number' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The competition name is required!',
            'players_number.required' => 'The competition players number is required!',
            'players_number.integer' => 'The competition players number must be an integer!',
        ];
    }
}
