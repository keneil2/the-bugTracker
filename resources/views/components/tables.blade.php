<link rel="stylesheet" href="{{asset("css/tables.css")}}">
<style>
    .list{
        display:none;
        /* width:0px; */
    }
    .showmenu{
        padding:0px;
        width: fit-content;
        display: unset;
        position: absolute;
        z-index:1;
        /* border: 1px solid black; */
        right:10px;
    }
    .showmenu ul{
        /* background-color: white; */
       
        padding: 10px;
    }
    #menu{
        position:relative;
    }
    .menu_button{
    rotate:180deg;
    }
    .tags{
        background-color:lemonchiffon;
        color: red;
        font-size: 12px;
        padding:3px;
        border-radius:2px;

    }
    .route_menuBtn{
        rotate:90deg
    }
    .menu_button{
        cursor: pointer;
    }
    .showmenu ul li{
        list-style: none;
        box-shadow: 2px 2px 2px rgba(0,0,0,0.3);
        background-color: white;
        padding:10px;
        width:100%;
        /* border-bottom: 1px solid rgba(0,0,0,0.3); */
        /* border-top: 1px solid rgba(0,0,0,0.3); */

    }
    .showmenu ul li a:hover,.showmenu ul li:hover{
        background-color:whitesmoke;
    }
    .showmenu ul li a{
        text-decoration: none;
        color:black;
    }
</style>
@auth
<section>

    

    
<div>
<h1>Latest Tickets</h1>
    <table>
        <th>Name</th>
        <th>Type</th>
        <th>Priority</th>
        <th>Severity</th>
        <th>Status</th>
        <th>Reported by</th>
        <th>
            action
        </th>
        @foreach ($bugs as $bug )
        <tr>
        <td>{{$bug->title}}</td>
        <td ><span class="tags">{{$bug->type}}</span></td>
        <td>{{$bug->priority}}</td>
        <td>{{$bug->severity}}</td>
        <td>{{$bug->Status}}</td>
        <td>{{$bug->user->name}}</td>
        <td>
    <div id="menu" calss="menu">
     <div id="menu" class="menu_button">
        <i class="fa-solid fa-ellipsis-vertical" style="color: #000000;"></i>
     </div>
            <div id="list" class="list">
            <ul>
                <li><a href="{{route("admin.showBug",$bug->id)}}">view more</a></li>
                <li><a href="{{route("bug.edit",$bug->id)}}">update</a></li>
            </ul>
            </div>
    </div>
        <!-- <td><a href="{{route("admin.showBug",$bug->id)}}">View More </a></td> -->
    </tr>
            
        @endforeach
    </table>
</div>

<div>
    Projects
<table>
<th>Project name</th>
<th>Project Manager</th>
<th>Added by</th>
<th>Project status</th>
<th>action</th>
<th><form action=""><input type="text" placeholder="..search"></form></th>
@foreach ( $projects as $Project )

     <tr>
        <td><h5>{{$Project->Project_name}}</h5></td>
        <td><p>{{$Project->Project_Manager}}</p></td>
       <td><p>{{$Project->user->name}}</p></td>
       <td>{{$Project->status}}</td>
       <td>
    <div id="menu" calss="menu">
     <div id="menu" class="menu_button">
        <i class="fa-solid fa-ellipsis-vertical" style="color: #000000;"></i>
     </div>
            <div id="list" class="list">
            <ul>
                <li><a href="{{route("assign.Project",$Project->id)}}">view more</a></li>
                <li><a href="{{route("edit.project",$Project->id)}}">update</a></li>
            </ul>
            </div>
    </div>
</td>
        </tr>
        @endforeach
            
    
    </table>
    @can("createPolicy",App\Models\Project::class)
<form action="{{route("project.create")}}"><button type="submit">add Project</button></form>
@endcan
</div>
</section>
@endauth

<script>
    let menu = document.querySelectorAll(".menu_button");
    menu.forEach(function(m){
        m.addEventListener("click",function(){
        // menu.style.rotate="90deg";
        list= this.nextElementSibling;
     list.classList.toggle("showmenu");
     menu.classList.toggle("route_menuBtn");
    });
    });
</script>
<script src="https://kit.fontawesome.com/f05da63fd8.js" crossorigin="anonymous"></script>