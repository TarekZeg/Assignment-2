<x-layout title="Show the details for a team">

    <div class='teamcard'>
        <h1>{{$team->team_name}}</h1>
        <p> Games Played: {{ $team->games_played }}</p>
        <p> Wins: {{ $team->wins}}</p>
        <p> Draws: {{ $team->draws }}</p>
        <p> Losses: {{ $team->losses }}</p>
        <p> Goals Scored: {{ $team->goals_scored }}</p>
        <p> Goals Conceded: {{ $team->goals_conceded }}</p>
        <p> Goal Difference: {{ $team->goal_dif }} </p>
        <p> Points: {{$team->points}}</p>


        <a href='/league/{{$team->id}}/edit'>
            <button class="formbutton">Edit</button>
        </a>

        <form method='POST' action="{{ route('league.delete', $team->id) }}" >
            @csrf
            @method('DELETE')
            <input type="hidden" name="id" value="{{$team->id}}">
            <button type='submit' class="deletebutton">Delete</button>
        </form>

        

    </div>

</x-layout>