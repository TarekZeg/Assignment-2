<x-layout title="Players stats">

    <h1 style="text-align: center">Players stats</h1>



    <form action="{{ route('players.search') }}" method="get" class="search-player">
          <input name="search" placeholder="Search for a player: "/>
          <button>Search</button>
    </form>
    
    @if(isset($message))
        <p style="text-align: center; color: red;">
            {{ $message }}
        </p>
        @else

    <table class="center">
        <tr>
            <th>Rank</th>
            <th>Player</th>
            <th>Team</th>
            <th>Shirt Number</th>
            <th>Position</th>
            <th>Games Played</th>
            <th>Goals</th>
            <th>Assists</th>
            <th>Yellow Cards</th>
            <th>Red Cards</th>
            <th>G/A</th>
        </tr>
        



        @foreach ($players as $player)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td> <a href="{{ url('/players/' . $player->id) }}" class="team-link"> {{ $player->player_name }} </a> </td>
            <td>{{ $player->league ? $player->league->team_name : 'No Team' }}</td>
            <td>{{ $player->player_number }}</td>
            <td>{{ $player->player_position }}</td>
            <td>{{ $player->player_games }}</td>
            <td>{{ $player->player_goals }}</td>
            <td>{{ $player->player_assists }}</td>
            <td>{{ $player->player_yellow }}</td>
            <td>{{ $player->player_red }}</td>
            <td>{{ $player->contributions }}</td>
        </tr>
        @endforeach

    </table>
 @endif
</x-layout>
