<x-layout title="Add a Player">

    <form action="/players" method="POST" class="form">
        @csrf

        <h1 style="text-align: center; margin-top: 5px;">Add a Player</h1>

        <label for="player_name">Player's Name</label>
        <input type="text" id="player_name" name="player_name" placeholder="Enter the player's name" value="{{ old('player_name') }}">
        @error('player_name')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="player_number">Player's Number</label>
        <input type="number" id="player_number" name="player_number" placeholder="Enter the player's number" value="{{ old('player_number') }}">
        @error('player_number')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="player_position">Player's Position</label>
        <input type="text" id="player_position" name="player_position" placeholder="Enter the player's position" value="{{ old('player_position') }}">
        @error('player_position')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="player_games">Games Played</label>
        <input type="number" id="player_games" name="player_games" placeholder="Enter the number of games played" value="{{ old('player_games') }}">
        @error('player_games')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="player_goals">Goals Scored</label>
        <input type="number" id="player_goals" name="player_goals" placeholder="Enter the number of goals scored" value="{{ old('player_goals') }}">
        @error('player_goals')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="player_assists">Assists</label>
        <input type="number" id="player_assists" name="player_assists" placeholder="Enter the number of assists" value="{{ old('player_assists') }}">
        @error('player_assists')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="player_yellow">Yellow Cards</label>
        <input type="number" id="player_yellow" name="player_yellow" placeholder="Enter the number of yellow cards" value="{{ old('player_yellow') }}">
        @error('player_yellow')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="player_red">Red Cards</label>
        <input type="number" id="player_red" name="player_red" placeholder="Enter the number of red cards" value="{{ old('player_red') }}">
        @error('player_red')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="player_team">Team</label>
        <input type="text" id="player_team" name="player_team" placeholder="Enter the team's name" value="{{ old('player_team') }}">
        @error('player_team')
            <div class="error">{{ $message }}</div>
        @enderror

        <button type="submit" class="formbutton" onclick="return confirm('Are you sure you want to add this player?')">Submit</button>
    </form>

</x-layout>
