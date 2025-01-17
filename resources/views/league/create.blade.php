<x-layout title="Add a team">

    @if (session('success'))
    <div class="success">{{ session('success') }}</div><br>
    @endif

    <form action='/league' method="POST" class="form">
        @csrf
        
        <h1 style="text-align: center; margin-top: 5px;">Add a team</h1>

        <label for="team_name">Team's name</label>
        <input type="text" name="team_name" placeholder="Enter the team's name: " value="{{ old('team_name') }}">
        @error('team_name')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="games_played">Games played</label>
        <input type="number" name="games_played" placeholder="Enter the number of games played: " value="{{ old('games_played') }}">
        @error('games_played')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="games_won">Wins</label>
        <input type="number" name="games_won" placeholder="Enter the number of games won: " value="{{ old('games_won') }}">
        @error('games_won')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="games_drew">Draws</label>
        <input type="number" name="games_drew" placeholder="Enter the number of games drew: " value="{{ old('games_drew') }}">
        @error('games_drew')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="games_lost">Losses</label>
        <input type="number" name="games_lost" placeholder="Enter the number of games lost: " value="{{ old('games_lost') }}">
        @error('games_lost')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="goals_scored">Goals Scored</label>
        <input type="number" name="goals_scored" placeholder="Enter the number of goals scored: " value="{{ old('goals_scored') }}">
        @error('goals_scored')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="goals_conceded">Goals Against</label>
        <input type="number" name="goals_conceded" placeholder="Enter the number of goals conceded: " value="{{ old('goals_conceded') }}">
        @error('goals_conceded')
            <div class="error">{{ $message }}</div>
        @enderror

        <button type="submit" class="formbutton" onclick="return confirm('Are you sure you want to add a new team?')">Submit</button>
    </form>

</x-layout>
