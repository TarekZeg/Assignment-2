<x-layout title="Show player details">

    <div class='teamcard'>
        <h1>{{$player->player_name}}</h1>
        <h4 class="player-team">{{ $player->league ? $player->league->team_name : 'No Team' }}</h4>
        <p> Player's position: {{ $player->player_position }}</p>
        <p> Games Played: {{ $player->player_games }}</p>
        <p> Goals: {{ $player->player_goals}}</p>
        <p> Assists: {{ $player->player_assists }}</p>
        <p> Yellow Cards: {{ $player->player_yellow }}</p>
        <p> Red Cards: {{ $player->player_red }}</p>
        <p> Shirt Number: {{ $player->player_number }}</p>


        @can('edit')
        <a href='/players/{{$player->id}}/edit'>
            <button class="formbutton">Edit</button>
        </a>

        <form method='POST' action="{{ route('players.delete', $player->id) }}" >
            @csrf
            @method('DELETE')
            <input type="hidden" name="id" value="{{$player->id}}">
            <button type='submit' class="deletebutton" onclick="return confirm('Are you sure you want to remove {{$player->player_name}}?')"
             >Delete</button>
        </form>
        @endcan
        

    </div>

</x-layout>