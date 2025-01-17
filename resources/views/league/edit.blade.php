<x-layout title="Edit a team">

    @if (session('success'))
    <div class="success">{{ session('success') }}</div> <br>
    @endif
    

    <form action='/league/{{ $team->id }}' method="POST" class="form">
        @csrf
        @method("PUT")
        
        <h1 style="text-align: center; margin-top: 5px;">Update {{ $team->team_name }}</h1>

        <label for="team_name">Team's name</label>
        <input type="text" name="team_name" value="{{ $team->team_name }}">
        @error('team_name')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="games_played">Games played</label>
        <input type="number" name="games_played" value="{{ $team->games_played }}">
        @error('games_played')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="games_won">Wins</label>
        <input type="number" name="games_won" value="{{ $team->wins }}">
        @error('games_won')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="games_drew">Draws</label>
        <input type="number" name="games_drew" value="{{ $team->draws }}">
        @error('games_drew')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="games_lost">Losses</label>
        <input type="number" name="games_lost" value="{{ $team->losses }}">
        @error('games_lost')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="goals_scored">Goals Scored</label>
        <input type="number" name="goals_scored" value="{{ $team->goals_scored }}">
        @error('goals_scored')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="goals_conceded">Goals Against</label>
        <input type="number" name="goals_conceded" value="{{ $team->goals_conceded }}">
        @error('goals_conceded')
            <div class="error">{{ $message }}</div>
        @enderror

        <button type="submit" class="formbutton" onclick="return confirm('Are you sure you want to update this team')">Update</button>
    </form>
</x-layout>
