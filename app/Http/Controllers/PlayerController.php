<?php

namespace App\Http\Controllers;
use App\Models\Player;
use Illuminate\Http\Request;
use App\Models\League;

class PlayerController extends Controller
{

    public function stats() {
        $players = Player::all()->sortByDesc('contributions');
        return view('players.stats', compact('players')); 
    }



    function create()
    {
        return view('players.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'player_name' => 'required|string|min:4|max:50|unique:players,player_name',
            'player_number' => ['required','integer','min:1','max:99',

            function ($attribute, $value, $fail) use ($request) {
                    $existingPlayer = Player::where('player_number', $value)
                        ->where('futsal_standings_id', $request->player_team)
                        ->first();
    
                    if ($existingPlayer) {
                        $fail('The player number is already taken by another player in the selected team.');
                    }
                },
            ],
            'player_position' => 'required|string|min:0|max:3',
            'player_games' => 'required|integer|min:0',
            'player_goals' => 'required|integer|min:0',
            'player_assists' => 'required|integer|min:0',
            'player_red' => 'required|integer|min:0',
            'player_yellow' => 'required|integer|min:0',
            'player_team' => 'required|exists:futsal_standings,team_name',
        ], [
            'player_name.unique' => 'The player inserted already exists. Please choose a different name.',
            'player_team.exists' => 'The selected team does not exist. Please select a valid team.',
        ]);
    
        // Find the team by team_name
        $team = League::where('team_name', $request->player_team)->first();
    
        // If team is not found, return with an error message
        if (!$team) {
            return redirect()->back()->withErrors(['player_team' => 'The selected team does not exist.'])->withInput();
        }
    
        // Create and save the new player
        $player = new Player();
        $player->player_name = $request->player_name;
        $player->player_number = $request->player_number;
        $player->player_position = $request->player_position;
        $player->player_games = $request->player_games;
        $player->player_goals = $request->player_goals;
        $player->player_assists = $request->player_assists;
        $player->player_yellow = $request->player_yellow;
        $player->player_red = $request->player_red;
        $player->futsal_standings_id = $team->id;  // Assign the team ID
        $player->save();
    
        // Redirect with success message
        return redirect('/league')->with('success', 'Player added successfully');
    }
    
    public function show($id)
    {
        $player = Player::with('league')->find($id);
        return view('players.show', compact('player'));
    }

    public function edit($id)
    {
        $player = Player::with('league')->find($id);
    
        if (!$player) {
            return redirect()->route('players.index')->with('error', 'Player not found.');
        }
    
        // $teams = League::all();
        return view("players.edit", compact("player"));
    }
    
    

    public function update(Request $request, $id)
    {
        // Validate the input data
        $request->validate([
            'player_name' => 'required|string|min:4|max:30',
            'player_number' => 'required|integer|min:0',
            'player_position' => 'required|string|min:0|max:3',
            'player_games' => 'required|integer|min:0',
            'player_goals' => 'required|integer|min:0',
            'player_assists' => 'required|integer|min:0',
            'player_yellow' => 'required|integer|min:0',
            'player_red' => 'required|integer|min:0',
            'player_team' => 'required|exists:futsal_standings,team_name', // Corrected validation to check the futsal_standings table
        ]);
    
        // Find the player by ID
        $player = Player::findOrFail($id);
    
        // Get the futsal_standings_id based on the selected team name
        $team = League::where('team_name', $request->input('player_team'))->first(); // Adjusted to query futsal_standings table
    
        if (!$team) {
            return redirect()->back()->with('error', 'Team not found.');
        }
    
        // Update the player's attributes
        $player->player_name = $request->input('player_name');
        $player->player_number = $request->input('player_number');
        $player->player_position = $request->input('player_position');
        $player->player_games = $request->input('player_games');
        $player->player_goals = $request->input('player_goals');
        $player->player_assists = $request->input('player_assists');
        $player->player_yellow = $request->input('player_yellow');
        $player->player_red = $request->input('player_red');
        $player->futsal_standings_id = $team->id; // Assign the correct futsal_standings_id
    
        // Save the updated player
        $player->save();
    
        // Redirect with success message
        return redirect("/players/stats")->with('success', 'Player updated successfully!');
    }
    
    
    
    public function delete($id) {
        $player = Player::find($id);

        if ($player) {
            $player->delete();
            return redirect('/players/stats')->with('success', 'Player deleted successfully.');
        } else {
            return redirect('/players/stats')->with('error', 'Player not found.');
        }
    }



    public function search(Request $request)
    {
        $search = $request->input('search');
    
        // Fetch players matching the search query
        $players = Player::where('player_name','like', '%' . $search . '%')->get();
    
        if ($players->count()>0) {
            return view('players.stats', compact('players', 'search'));
        }
        else { 
            return view('players.stats', ['message' => 'No players found matching your search.']);
        }

    }
    



    

}
