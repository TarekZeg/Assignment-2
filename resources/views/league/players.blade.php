<x-layout title="{{$team->team_name}}'s Players">




        <div class='playerscard'>
            <div class="playerstable">
                <h1>{{ $team->team_name }}'s Players</h1>
                <table class="center">
                    <tr>
                        <th>Player</th>
                        <th>Shirt Number</th>
                        <th>Position</th>
                        <th>Games Played</th>
                        <th>Goals</th>
                        <th>Assists</th>
                        <th>Yellow Cards</th>
                        <th>Red Cards</th>
                        <th>G/A</th>
                    </tr>
                    



                    @foreach($team->players as $player)
                    <tr>
                        <td> <a href="{{ url('/players/' . $player->id) }}" class="team-link"> {{ $player->player_name }} </a> </td>
                        <td>{{ $player->player_number }}</td>
                        <td><b>{{ $player->player_position }}</td>
                        <td>{{ $player->player_games }}</td>
                        <td>{{ $player->player_goals }}</td>
                        <td>{{ $player->player_assists }}</td>
                        <td>{{ $player->player_yellow }}</td>
                        <td>{{ $player->player_red }}</td>
                        <td>{{ $player->contributions }}</td>
                    </tr>
                    @endforeach

                </table>

                @if(isset($message))
                    <p style="text-align: center; color: red;">{{ $message }}</p>
                @endif
            </div>


    </div>

</x-layout>
