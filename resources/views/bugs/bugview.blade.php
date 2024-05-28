<x-layout>
<x-adminNav/>
    <div>
        <h1>{{$bug->title}}</h1>
        <div>
        {{$bug->description}}
        </div>
        <div>
            <span>{{$bug->type}}</span>
            <span>{{$bug->user->name}}</span>
            <span>{{$bug->assignedUser->name}}</span>
    </div>
        
    </div>
    

    <form action="{{route("assign.Bug",$bug->id)}}" method="POST">
    @method("PUT")
    @csrf
        <div>
            <p></p>
            <p></p>
            <p></p>
        </div>

       @can("assignBugs",$bug)
           
       
        <select name="user_id" id="">
            @foreach ($users as $user)
                 <option value="{{$user->id}}"> {{$user->name}} role:{{$user->load("role")->name}}</option>
            @endforeach
        </select>
       
        <button>assign task</button>
        @endcan
    </form>
</x-layout>