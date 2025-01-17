<x-layout title="User">

@auth
    <div class='usercard'>
        <h1 style="text-align: center;">User's Details</h1>
        <p>Logged in as <b>{{ Auth::user()->name }}</b></p>
        <p>Username: {{ Auth::user()->name }}</p>
        <p>Email: {{ Auth::user()->email }}</p>
        <form method='POST' action='/logout'>
            @csrf
            <button type='submit' class="formbutton">Logout</button>
        </form>
        @can('edit')
        <a href="/auth/role" class="formbutton" style="color:white; font-weight: normal;">See all users</a>
        @endcan
    </div>
@else
    <script>
        window.location.href = '/login';
    </script>
@endauth


@guest
    <div>
        <p>Please login to view your account details.</p>
    </div>
@endguest



</x-layout>
