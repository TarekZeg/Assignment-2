<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class LeagueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('futsal_standings')->insert([
            [
                'team_name' => 'Falcon FC',
                'games_played' => 10,
                'wins' => 6,
                'draws' => 2,
                'losses' => 2,
                'goals_scored' => 18,
                'goals_conceded' => 10
            ],
            [
                'team_name' => 'Eagle United',
                'games_played' => 10,
                'wins' => 5,
                'draws' => 3,
                'losses' => 2,
                'goals_scored' => 15,
                'goals_conceded' => 11
            ],
            [
                'team_name' => 'Lion Hearts',
                'games_played' => 10,
                'wins' => 4,
                'draws' => 4,
                'losses' => 2,
                'goals_scored' => 14,
                'goals_conceded' => 12
            ],
            [
                'team_name' => 'Tiger Kings',
                'games_played' => 10,
                'wins' => 3,
                'draws' => 4,
                'losses' => 3,
                'goals_scored' => 13,
                'goals_conceded' => 13
            ],
            [
                'team_name' => 'Panther Warriors',
                'games_played' => 10,
                'wins' => 2,
                'draws' => 3,
                'losses' => 5,
                'goals_scored' => 10,
                'goals_conceded' => 15
            ],
            [
                'team_name' => 'NAFC',
                'games_played' => 10,
                'wins' => 9,
                'draws' => 1,
                'losses' => 0,
                'goals_scored' => 51,
                'goals_conceded' => 15
            ],
        ]);
    }
}
