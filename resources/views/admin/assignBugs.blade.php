
<x-layout>
<x-adminNav/>
    <form action="{{route("assign.Bug",$bug->id)}}" method="POST">
    @method("PUT")
    @csrf
        <div>
            <p>{{$bug->title}}</p>
            <p>{{$bug->type}}</p>
            <p>{{$bug->description}}</p>
        </div>
       @can("assignBugs",$bug)
           
       
        <select name="user_id" id="">
            @foreach ($users as $user)
                 <option value="{{$user->id}}"> {{$user->name}} role:{{$user->role->name}}</option>
            @endforeach
        </select>
       
        <button>assign task</button>
        @endcan
    </form>
</x-layout>