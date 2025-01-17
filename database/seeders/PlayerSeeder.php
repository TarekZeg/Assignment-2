<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlayerSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('players')->insert([
            [
                'player_name' => 'John Doe',
                'player_number' => 10,
                'player_games' => 25,
                'player_goals' => 15,
                'player_assists' => 5,
                'player_yellow' => 2,
                'player_red' => 0,
                'futsal_standings_id' => 1, 
                'player_position' => 'CM',
            ],
            [
                'player_name' => 'Jane Smith',
                'player_number' => 7,
                'player_games' => 20,
                'player_goals' => 10,
                'player_assists' => 8,
                'player_yellow' => 1,
                'player_red' => 0,
                'futsal_standings_id' => 6, 
                'player_position' => 'ST',
            ],
            [
                'player_name' => 'Alex Johnson',
                'player_number' => 4,
                'player_games' => 30,
                'player_goals' => 5,
                'player_assists' => 12,
                'player_yellow' => 4,
                'player_red' => 1,
                'futsal_standings_id' => 1, 
                'player_position' => 'LW',
            ],
        ]);
    }
}
