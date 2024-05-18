<link rel="stylesheet" href="{{asset("css/nav.css")}}">
<nav>
<div class="nav-left">
<h1>Bug tracker</h1>
</div>
<div class="nav-right">
  <ul>
    
    @guest
   
    <li><a href="{{route("registration")}}">Register</a></li>
    <li><a href="{{route("login")}}">Login</a></li>
  @endguest   

  @auth
  <li><a href="{{route("bug.index")}}">Home</a></li>
    <li><a href="{{route("dashboard")}}">Dashboard</a></li>
    <li><a href="{{route("logout")}}">Logout</a></li>
    <li><a href="/bug/create">create Bugs</a></li>
   <li><div class="profile">
      <a href=""> profile</a>
    </div></li> 
  @endauth
  </ul>
  </div>
</nav>