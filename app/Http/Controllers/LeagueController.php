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
        $request->validate([
            'team_name' => 'required|string|min:4|max:30',
            'games_played' => 'required|integer|min:0',
            'games_won' => 'required|integer|min:0',
            'games_drew' => 'required|integer|min:0',
            'games_lost' => 'required|integer|min:0',
            'goals_scored' => 'required|integer|min:0',
            'goals_conceded' => 'required|integer|min:0',
        ]);
    
        $team = new League();
        $team->team_name = $request->team_name;
        $team->games_played = $request->games_played;
        $team->wins = $request->games_won; 
        $team->draws = $request->games_drew; 
        $team->losses = $request->games_lost; 
        $team->goals_scored = $request->goals_scored;
        $team->goals_conceded = $request->goals_conceded; 
        $team->save();
    
        return redirect('/league')->with('success', 'Team added successfully');
    }
    
    

    function show($id)
{
    $team = League::findOrFail($id);

    if ($team === null) {
        return redirect('league/index');
    }

    return view('league.show', ['team' => $team]);
}


    function table() {
        $teams = League::all()->sortByDesc('points')->sortByDesc('goal_dif'); 
    
        return view("league.table", ['teams' => $teams]);
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

    // public function update(Request $request, $id)
    // {
    //     $team = League::findOrFail($id); 
    //     $team->team_name = $request->input('team_name');
    //     $team->games_played = $request->input('games_played');
    //     $team->wins = $request->input('games_won');
    //     $team->draws = $request->input('games_drew');
    //     $team->losses = $request->input('games_lost');
    //     $team->goals_scored = $request->input('goals_scored');
    //     $team->goals_conceded = $request->input('goals_conceded');
    //     $team->save();
    
    //     return redirect("/league");
    // }
    
    
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

    return redirect("/league")->with('success', 'Team updated successfully!');
}



public function search(Request $request)
{
    $search = $request->input('search');

    $teams = League::where('team_name', 'like', '%' . $search . '%')->paginate(4);  

    return view('league.index', compact('teams'));
}







}
