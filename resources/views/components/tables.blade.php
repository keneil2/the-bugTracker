<link rel="stylesheet" href="{{asset("css/tables.css")}}">
@auth
<section>

    

    
<div>
<h1>Latest Bugs</h1>
    <table>
        <th>Name</th>
        <th>Type</th>
        <th>Priority</th>
        <th>Severity</th>
        <th>Status</th>
        <th>Reported by</th>
        @foreach ($bugs as $bug )
        <tr>
        <td>{{$bug->title}}</td>
        <td>{{$bug->type}}</td>
        <td>{{$bug->priority}}</td>
        <td>{{$bug->severity}}</td>
        <td>{{$bug->Status}}</td>
        <td>{{$bug->user->name}}</td>
        <td><a href="{{route("admin.showBug",$bug->id)}}">View More </a></td>
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
<th><form action=""><input type="text" placeholder="..search"></form></th>
@foreach ( $projects as $Project )

     <tr>
        <td><h5>{{$Project->Project_name}}</h5></td>
        <td><p>{{$Project->Project_Manager}}</p></td>
       <td><p>{{$Project->user->name}}</p></td>
       <td>{{$Project->status}}</td>
       <td>
       <form action="{{route("bug.create")}}" >
    <input type="hidden" value="{{$Project->id}}" name="id">
     @csrf
       <button>view more</button>
    </form></td>
        </tr>
        
            
    
    </table>
    @can("createPolicy",App\Models\Project::class)
<form action="{{route("project.create")}}"><button type="submit">add Project</button></form>
@endcan
</div>
</section>
@endforeach
@endauth