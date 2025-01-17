<x-layout title="Edit a player">

@can('edit')

    <form action='/players/{{ $player->id }}' method="POST" class="form">
        @csrf
        @method("PUT")

        <h1 style="text-align: center; margin-top: 5px;">Update {{$player->player_name}}'s stats</h1>

        <label for="player_name">Player's name</label>
        <input type="text" name="player_name" value="{{ $player->player_name }}">
        @error('player_name')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="player_number">Player's number</label>
        <input type="number" name="player_number" value="{{ $player->player_number }}">
        @error('player_number')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="player_position">Player's position</label>
        <input type="text" name="player_position" value="{{ $player->player_position }}">
        @error('player_position')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="player_games">Games played</label>
        <input type="number" name="player_games" value="{{ $player->player_games }}">
        @error('player_games')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="player_goals">Goals scored</label>
        <input type="number" name="player_goals" value="{{ $player->player_goals }}">
        @error('player_goals')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="player_assists">Assists</label>
        <input type="number" name="player_assists" value="{{ $player->player_assists }}">
        @error('player_assists')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="player_yellow">Yellow cards</label>
        <input type="number" name="player_yellow"  value="{{ $player->player_yellow }}">
        @error('player_yellow')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="player_red">Red cards</label>
        <input type="number" name="player_red" value="{{ $player->player_red }}">
        @error('player_red')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="player_team">Team</label>
        <input type="text" name="player_team" value="{{ $player->league ? $player->league->team_name : 'No Team' }}" >
        @error('player_team')
            <div class="error">{{ $message }}</div>
        @enderror




        <button type="submit" class="formbutton" onclick="return confirm('Are you sure you want to update this team?')">Update</button>
    </form>
    @endcan
</x-layout>
