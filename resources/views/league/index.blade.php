<x-layout title="Table Standing">

    <h1 style="text-align: center;">All Futsal Teams</h1>

    @if (isset($message))
        <p style="text-align: center; color: red;">
            {{ $message }}
        </p>
    @else
        @auth
            @foreach ($teams as $team)
                <p>
                    <a href="{{ url('/league/' . $team->id) }}" class="team-text">
                        {{ $team->team_name }} - Points: {{ $team->points }}
                    </a>
                </p>
            @endforeach

            <div class="pagination" style="text-align: center;">
                {{ $teams->links() }}
            </div>
        @endauth

        @guest
            <p style="text-align: center;">Please log in to view the teams and standings.</p>
        @endguest
    @endif

</x-layout>
