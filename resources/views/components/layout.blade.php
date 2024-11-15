<!DOCTYPE html>
<html>
  <head>
    <title>{{$title}}</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <link href="{{asset('css/style.css')}}" type="text/css" rel="stylesheet" />
  </head>
  <body>
    <nav class='navbar'>
      <ul>
        <li><a href="/league">Home</a></li>
        <li><a href="/league/table">Table</a></li>
        <li><a href="/league/create">Add new team</a></li>


        
      </ul>

      <form action="{{ route('league.search') }}" method="get" class="search">
          <input name="search" placeholder="Search for teams: "/>
          <button>Search</button>
        </form>
    </nav>

    <br><br><br><br><br><br>

    {{$slot}}


  </body>
</html>