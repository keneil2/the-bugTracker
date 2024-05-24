<link rel="stylesheet" href="{{asset("css/nav.css")}}">

<nav>
<div class="nav-left">
<h1>Bug tracker</h1>
@auth
   
    @endauth
</div>
<div class="nav-right">


@guest
  <ul>
    <li><a href="{{route("registration")}}">Register</a></li>
    <li><a href="{{route("login")}}">Login</a></li>
    </ul>
  @endguest   
 

  @auth
  <div class="menu">
  <i class="fa-solid fa-bars" style="color: #ffffff; display:none;"></i>

  <div class="menu_items">
  <ul>
  <li><a href="{{route("logout")}}">Logout</a></li>
    @can("isAssigned")
      <li><a href="{{route("bug.assigned")}}">task</a></li>
    @endcan
  <li><a href="{{route("bug.index")}}">Home</a></li>
    <li><a href="{{route("dashboard")}}">Dashboard</a></li>
    
    <li><a href="/bug/create">create Bugs</a></li>
   <li</li> 
  
  </ul>
  
  </div>
  </div>
  <div class="profile">
      <a href=""> profile</a>
    </div>
</div>
@endauth
</nav>
