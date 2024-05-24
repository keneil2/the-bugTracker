<x-adminNav/>
    <link rel="stylesheet" href="{{asset("css/adminDashboard.css")}}">
    <!-- add a table displaying task -->
    <div class="tables">
        <div class="bugs_Table_container"> 
            <h1>Bugs</h1>   
    <table>
        <th>title</th>
        <th>type</th>
        <th>Assigned to</th>
        <th>description</th>
        <th>staus</th>
        <th>priority</th>
        <th>severity</th>
        <th>Project</th>
        <th>vist</th>
       
        @foreach($bugs as $bug)
             <tr>
             <td>{{$bug->title}}</td>
             <td>{{$bug->type}}</td>
             <td>{{$bug->user->name}}</td>
             <td>{{$bug->description}}</td>
             <td>{{$bug->Status}}</td>
             <td>{{$bug->priority}}</td>
             <td>{{$bug->severity}}</td>
             <td>{{$bug->project->Project_Manager}}</td>
             <td><a href="{{route("admin.showBug",$bug->id)}}"> View More</td>
            </tr>
        @endforeach    
    </table>
    </div>




    <div class="project_Table_container">
    <div> <h1>Project</h1>
    
    <table>
        
    <th>Project name</th>
    <th>Project Manager</th>
    <th>Added by</th>
    <th>Project status</th>
    <th><form action=""><input type="text" placeholder="...search"></form></th>
    @foreach ($Projects as $project )
    <tr>
        <td>{{$project->Project_name}}</td>
        <td>{{$project->Project_Manager}}</td>
        <td>{{$project->user->name}}</td>
        <td>{{$project->status}}</td>
        <td><form action="{{route("bug.create")}}" >
        <input type="hidden" value="{{$project->id}}" name="id">
         @csrf
           <button>view more</button>
        </form></td>
      
    </tr>
    @endforeach
    </table>
<form action="{{route("project.create")}}"><button type="submit">add Project</button></form></div>
    </div>
    </div>