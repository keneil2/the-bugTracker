<x-layout>
    <link rel="stylesheet" href="{{asset("css/index.css")}}">
    @auth
    <h1>welcome {{Auth::user()->name}}</h1>
    @endauth

    @guest
        <h1>Guess</h1>
    @endguest

     {{Session::get("sucess")}}
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
            @can("viewAny",)
                
            @endcan
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
    @foreach ( $Projects as $Project )

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

    
</x-layout>