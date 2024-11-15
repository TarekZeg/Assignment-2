<x-layout title="Table Standing">


    <h1 style='text-align: center'>All Futsal Teams</h1>
    @foreach ($teams as $team)
        <p style='text-align: center'>
            <a href="/league/{{$team->id}}">
                {{$team->team_name}} - Points: {{$team->points}}
            </a>
        </p>
    @endforeach

    <br><br>
    <div class="pagination" style="text-align: center;">
        {{$teams->links()}} 
    </div>
    
</x-layout>
