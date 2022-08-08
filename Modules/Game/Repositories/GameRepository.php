<?php


namespace Modules\Game\Repositories;


use Modules\Game\Entities\Competition;

class GameRepository
{
    /**
     * Return a list with all companies
     * @return array
     */
    public function get_competitions_list()
    {
        $data = [];
        $competitions = Competition::ofActive()->get();

        if ($competitions->count() > 0)
        {
            foreach ($competitions as $competition)
            {
                $data[] = [
                    'id' => $competition->id,
                    'name' => $competition->name,
                    'players_number' => $competition->players_number,
                ];
            }
        }

        return $data;
    }

    public function get_competition_players($competition,$page)
    {
        $offset = $page;

        if ($page == 1)
            $offset = 0;

        $perPage = 2;
        $data = [
            'id' => $competition->id,
            'name' => $competition->name,
            'players_number' => $competition->nr_of_players,
            'players_list' => [],
        ];

        if ($competition->nr_of_players > 0)
        {
            $players = $competition->players()
                ->orderBy('points', 'desc')
                /*->offset($offset)
                ->limit($perPage)*/
                ->get();
            foreach ($players as $player)
            {
                $data['players_list'][$player->id] = [
                    'name' => $player->name,
                    'points' => $player->points,
                ];
            }
        }

        return $data;
    }
}
