<!DOCTYPE html>
<html>
  <head>
    <title>{{$title}}</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <!-- @vite(['resources/css/app.css', 'resources/js/app.js']) -->
    <!-- <link href="tailwind.css" rel="stylesheet"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="{{asset('css/style.css')}}" type="text/css" rel="stylesheet" />
  </head>
  <body>



<nav class="navbar navbar-expand-lg custom-navbar">
  <a class="navbar-brand" href="#">
    <img src='/images/HUDD_FUTSAL.png' alt='Logo' class='logo-img'>
  </a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ms-auto">
      <li class="nav-item">
        <a class="nav-link" href="/league">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/league/table">Table</a>
      </li>
      @can('edit')
      <li class="nav-item">
        <a class="nav-link" href="/league/create">Add new team</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/players/create">Add a player</a>
      </li>
      @endcan
      <li class="nav-item">
        <a class="nav-link" href="/players/stats">Players stats</a>
      </li>
      @guest
      <li class="nav-item">
        <a class="nav-link" href="/login">Login</a>
      </li>
      @endguest

      <li class="nav-item">
        <a class="userdisplay" href="/auth/user">Users</a>
      </li>

    </ul>
    <form action="{{ route('league.search') }}" method="get" class="d-flex ms-auto search-team">
      <input name="search" class="form-control" placeholder="Search for teams: " />
      <button type="submit" class="btn btn-outline-light">Search</button>
    </form>
    @auth
    <a href="/auth/user">
      <img class="userimage" src="/images/user.png" alt="user image" />
    </a>
    @endauth
  </div>
</nav>






    <br><br><br><br><br><br><br>

    {{$slot}}




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

  </body>
</html>