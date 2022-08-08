<?php


namespace Modules\Game\Http\Controllers\Api;


use App\Facades\GameRepository;
use App\Http\Controllers\Controller;
use Modules\Game\Entities\Competition;
use Modules\Game\Entities\Log;
use Modules\Game\Entities\Player;
use Modules\Game\Http\Requests\CompetitionRequest;
use Modules\Game\Http\Requests\PlayerPointsRequest;
use Modules\Game\Http\Requests\PlayerRequest;

class GameController extends Controller
{
    /**
     * Get all competitions
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCompetitionsList()
    {
        $data = GameRepository::get_competitions_list();

        //create response data
        $response = [
            'success' => true,
            'message' =>'List of all competitions',
            'data' => $data,
        ];

        //return data
        return response()->json($response);
    }

    /**
     * @param $competitionId
     * @param int $page
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCompetitionPlayers($competitionId,$page = 0)
    {
        $competition = Competition::find($competitionId);

        if (!$competition || !$competition->is_active)
        {
            //create response data
            $response = [
                'success' => true,
                'message' =>'This competition is no longer available!',
                'data' => [],
            ];

            //return data
            return response()->json($response);
        }
        $data = GameRepository::get_competition_players($competition,$page);

        //create response data
        $response = [
            'success' => true,
            'message' =>'List all competition '.$competition->name.' players!',
            'data' => $data,
        ];

        //return data
        return response()->json($response);
    }

    /**
     * Add new competition
     * @param CompetitionRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addNewCompetition(CompetitionRequest $request)
    {
        $data = [
            'name' => $request->name,
            'players_number' => $request->players_number,
        ];

        try {
            $competition = Competition::firstOrCreate($data);

            $dataCompetition = [
                'id' => $competition->id,
                'name' => $competition->name,
                'players_number' => $competition->players_number,
                'created_at' => $competition->created_at->format('Y-m-d H:i:s'),
                'updated_at' => $competition->updated_at->format('Y-m-d H:i:s'),
            ];

            //create response data
            $response = [
                'success' => true,
                'message' =>'New competition created',
                'data' => $dataCompetition,
            ];
        }
        catch (\Exception $exception)
        {
            //create response data
            $response = [
                'success' => false,
                'message' =>'API error: '.$exception->getMessage(),
                'data' => [],
            ];
        }

        //return data
        return response()->json($response);
    }

    /**
     * Add new player in competition
     * @param PlayerRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addNewPlayer(PlayerRequest $request)
    {
        $player = Player::where('name',$request->name)->where('competition_id',$request->competition_id)->first();

        if ($player && $player->competition)
        {
            //create response data
            $response = [
                'success' => false,
                'message' =>$player->name.' is already registred in '.$player->competition->name,
                'data' => [],
            ];

            //return data
            return response()->json($response);
        }

        try {
            $data = [
                'name' => $request->name,
                'competition_id' => $request->competition_id,
            ];

            $player = Player::firstOrCreate($data);

            $dataPlayer = [
                'name' => $player->name,
                'id' => $player->id,
                'competition_id' => $player->competition ? $player->competition->id : null,
                'competition_name' => $player->competition ? $player->competition->name : null,
                'created_at' => $player->created_at->format('Y-m-d H:i:s'),
                'updated_at' => $player->updated_at->format('Y-m-d H:i:s'),
            ];

            //create response data
            $response = [
                'success' => true,
                'message' =>'New player created',
                'data' => $dataPlayer,
            ];
        }
        catch (\Exception $exception)
        {
            //create response data
            $response = [
                'success' => false,
                'message' =>'API error: '.$exception->getMessage(),
                'data' => [],
            ];
        }

        //return data
        return response()->json($response);
    }

    /**
     * Add points to player
     * @param PlayerPointsRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addPlayerPoints(PlayerPointsRequest $request)
    {
        $competition = Competition::find($request->competition_id);
        $player = Player::find($request->player_id);

        if (!$competition)
        {
            //create response data
            $response = [
                'success' => false,
                'message' => "This competition is no longer available!",
                'data' => [],
            ];

            //return data
            return response()->json($response);
        }

        if (!$player)
        {
            //create response data
            $response = [
                'success' => false,
                'message' => "This player is no longer available!",
                'data' => [],
            ];

            //return data
            return response()->json($response);
        }

        $playerCompetition = Player::where('id',$request->player_id)->where('competition_id',$request->competition_id)->first();

        if (!$playerCompetition)
        {
            //create response data
            $response = [
                'success' => false,
                'message' =>$player->name.' is not playing in '.$player->competition->name,
                'data' => [],
            ];

            //return data
            return response()->json($response);
        }

        $points = $playerCompetition->points;
        $newPoints = $points + $request->points;
        $playerCompetition->points = $newPoints;

        $dataLog = [
            'competition_id' => $player->competition ? $player->competition->id : null,
            'players_id' => $player->id,
            'points' => $request->points,
        ];
        $log = Log::create($dataLog);
        $playerCompetition->save();

        $dataPlayer = [
            'name' => $playerCompetition->name,
            'id' => $playerCompetition->id,
            'points' => $playerCompetition->points,
            'competition_id' => $playerCompetition->competition ? $playerCompetition->competition->id : null,
            'competition_name' => $playerCompetition->competition ? $playerCompetition->competition->name : null,
            'created_at' => $playerCompetition->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $playerCompetition->updated_at->format('Y-m-d H:i:s'),
        ];

        //create response data
        $response = [
            'success' => true,
            'message' =>$playerCompetition->name.' has now '.$playerCompetition->points.' points!',
            'data' => $dataPlayer,
        ];

        //return data
        return response()->json($response);
    }
}
