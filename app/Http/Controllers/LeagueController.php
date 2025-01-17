<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\League;

class LeagueController extends Controller
{
    public function index()
    {
        // $teams = League::all()->sortByDesc('points')->sortByDesc('goal_dif');
        $teams = League::paginate(4);
        return view('league.index', compact('teams'));

    }
    
    function create()
    {
        return view('league.create');
    }

    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'team_name' => 'required|string|min:4|max:30|unique:futsal_standings,team_name',
            'games_played' => 'required|integer|min:0',
            'games_won' => 'required|integer|min:0',
            'games_drew' => 'required|integer|min:0',
            'games_lost' => 'required|integer|min:0',
            'goals_scored' => 'required|integer|min:0',
            'goals_conceded' => 'required|integer|min:0',
        ], [
            // Custom error message for duplicate team name
            'team_name.unique' => 'The team name already exists. Please choose a different name.',
        ]);
    
        // Check if the sum of wins, draws, and losses equals games played
        $totalGames = $request->games_won + $request->games_drew + $request->games_lost;
        if ($totalGames != $request->games_played) {
            return redirect()->back()->withErrors([
                'games_played' => 'The total of wins, draws, and losses must equal games played.',
            ])->withInput();
        }
    
        // Create and save the new team
        $team = new League();
        $team->team_name = $request->team_name;
        $team->games_played = $request->games_played;
        $team->wins = $request->games_won;
        $team->draws = $request->games_drew;
        $team->losses = $request->games_lost;
        $team->goals_scored = $request->goals_scored;
        $team->goals_conceded = $request->goals_conceded;
        $team->save();
    

        return redirect()->back()->with('success', 'Team added successfully.');
    }
    
    
    

    function show($id)
    {
        $team = League::with('players')->findOrFail($id);
    
        if ($team === null) {
            return redirect('league/index');
        }
    
        return view('league.show', ['team' => $team]);
    }
    


    function table() {
        // Retrieve and sort the teams by points and goal difference
        $teams = League::all()->sortBy([
            ['points', 'desc'],
            ['goal_dif', 'desc'],
        ]);

        // Return the sorted teams to the view
        return view("league.table", compact('teams'));
    }

    

    public function delete($id) {
        $team = League::find($id);

        if ($team) {
            $team->delete();
            return redirect('/league')->with('success', 'Team deleted successfully.');
        } else {
            return redirect('/league')->with('error', 'Team not found.');
        }
    }






    public function edit ($id) {
        $team = League::find($id);
        return view("league.edit",compact("team"));

    }
 
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'team_name' => 'required|string|min:4|max:30',
            'games_played' => 'required|integer|min:0',
            'games_won' => 'required|integer|min:0',
            'games_drew' => 'required|integer|min:0',
            'games_lost' => 'required|integer|min:0',
            'goals_scored' => 'required|integer|min:0',
            'goals_conceded' => 'required|integer|min:0',
        ]);

        $team = League::findOrFail($id);
        
        $team->team_name = $request->input('team_name');
        $team->games_played = $request->input('games_played');
        $team->wins = $request->input('games_won');
        $team->draws = $request->input('games_drew');
        $team->losses = $request->input('games_lost');
        $team->goals_scored = $request->input('goals_scored');
        $team->goals_conceded = $request->input('goals_conceded');
        
        $team->save();

        return redirect()->back()->with('success', $team->team_name . ' has been updated successfully.');
    }



    public function search(Request $request)
    {
        $search = $request->input('search');

        $teams = League::where('team_name', 'like', '%' . $search . '%')->paginate(4);

        if ($teams->count() > 0) {
            return view('league.index', compact('teams'));
        } else {

            return view('league.index', ['message' => 'No teams found matching your search.']);
        }
    }


    public function teamPlayers($id)
    {
        // Load the team with players and sort them by contributions in descending order
        $team = League::with(['players'])
            ->findOrFail($id);
    
        // Sort players by the custom contributions attribute
        $team->players = $team->players->sortByDesc('contributions');
    
        // Check if players exist
        if ($team->players->count() > 0) {
            return view('league.players', compact('team'));
        } else {
            return view('league.players', [
                'team' => $team,
                'message' => 'No players assigned for this team yet',
            ]);
        }
    }
    

    

    





}
