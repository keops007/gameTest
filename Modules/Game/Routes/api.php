<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/game', function (Request $request) {
    return $request->user();
});*/

Route::namespace('Api')->group(function () {

    //Competitions list
    Route::get('/competitions/list', ['as' => 'api.competitions.list', 'uses' => 'GameController@getCompetitionsList']);

    //Competition plaer list
    Route::get('/competitions/list/{competition_id}/{page?}', ['as' => 'api.competitions.list', 'uses' => 'GameController@getCompetitionPlayers']);

    //Competitions create
    Route::post('/competitions/create', ['as' => 'api.competitions.create', 'uses' => 'GameController@addNewCompetition']);

    //Competitions create create player
    Route::post('/competitions/create_player', ['as' => 'api.competitions.create_player', 'uses' => 'GameController@addNewPlayer']);

    //Competitions player add points
    Route::post('/competitions/player/add_points', ['as' => 'api.competitions.player_add_points', 'uses' => 'GameController@addPlayerPoints']);
});
