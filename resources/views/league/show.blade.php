<x-layout title="Show team's details">

    <div class='teamcard'>
        <img src="/images/HUFSC.jpg" alt="Team photo"></img>
        <h1>{{$team->team_name}}</h1>
        <p> Games Played: {{ $team->games_played }}</p>
        <p> Wins: {{ $team->wins}}</p>
        <p> Draws: {{ $team->draws }}</p>
        <p> Losses: {{ $team->losses }}</p>
        <p> Goals Scored: {{ $team->goals_scored }}</p>
        <p> Goals Conceded: {{ $team->goals_conceded }}</p>
        <p> Goal Difference: {{ $team->goal_dif }} </p>
        <p> Points: {{$team->points}}</p>
        
        <a href="{{ url('/league/' . $team->id . '/players') }}">
            <p>{{ $team->team_name }}'s Players:</p>
        </a>

        @can('edit')
        <a href='/league/{{$team->id}}/edit'>
            <button class="formbutton">Edit</button>
        </a>

        <form method='POST' action="{{ route('league.delete', $team->id) }}" >
            @csrf
            @method('DELETE')
            <input type="hidden" name="id" value="{{$team->id}}">
            <button type='submit' class="deletebutton" onclick="return confirm('Are you sure you want to delete this team?')"
             >Delete</button>
        </form>
        @endcan
        

    </div>

</x-layout>