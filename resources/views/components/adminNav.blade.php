<link rel="stylesheet" href="{{asset("css/adminnav.css")}}">
<nav>
    <div class="heading">
        <h1>Bug tracker</h1>
    </div>
    <div>
        <ul>
            <li><a href="{{route("bug.index")}}">Home</a></li>
            <li><a href="{{route("dashboard")}}">Dashboard</a></li>
            <li><a href="{{route("logout")}}">Logout</a></li>
            <li><a href="/bug/create">create Bugs</a></li>
            <li><a href="{{route("get.Allusers")}}">users</a></li>
            <li><a href="{{route("get.devs")}}">developers</a></li>
            <li><a href="{{route("admin.register")}}">Register User</a></li>
            <li><a href=""></a></li>
            <li>
                <div class="profile">
                    <a href="">profile</a>
                </div>
            </li>
        </ul>
    </div>
</nav>