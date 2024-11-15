<x-layout title="Table Standing">
    <style>
        .center th {
            text-align: center;
        }
    </style>
    
    <h1 style='text-align: center'>Here's the futsal league standing</h1>
    
    <table class="center">
        <tr>
            <th>Position</th>
            <th>Team</th>
            <th>Games played</th>
            <th>Wins</th>
            <th>Draws</th>
            <th>Losses</th>
            <th>Goals scored</th>
            <th>Goals conceded</th>
            <th>Goal Difference</th>
            <th>Points</th>
        </tr>
        
        @foreach ($teams as $team)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td><b>{{ $team->team_name }}</td>
            <td>{{ $team->games_played }}</td>
            <td>{{ $team->wins }}</td>
            <td>{{ $team->draws }}</td>
            <td>{{ $team->losses }}</td>
            <td>{{ $team->goals_scored }}</td>
            <td>{{ $team->goals_conceded }}</td>
            <td>{{ $team->goal_dif}}</td>
            <td>{{ $team->points }}</td>
        </tr>
        @endforeach
    </table>
</x-layout>
