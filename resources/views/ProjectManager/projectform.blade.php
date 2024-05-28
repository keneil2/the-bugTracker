<x-layout>
<x-nav/> 
@can("update",App\Policies\ProjectPolicy::class)
<form action="{{route("update.project",$project->id)}}" method="Post">
@csrf
@method("PUT")
<x-input name="title" message="message" value="{{$project->Project_name}}"/>
<x-input name="manager" message="enter Project Manager Name" value="{{$project->Project_Manager}}" />
<x-input name="description" message="message" value="{{$project->description}}"/>
<x-input name="status" message="message" value="{{$project->status}}"/>
<button>update project</button>
</form>
@endcan

@can("canviewDevs")
Assign users as Project Manager?
<form action="{{route("project.Assignment",$project->id)}}" method="POST"> 
@csrf
<x-select name="users" :category='$users'></x-select>
<x-button name="assign Project Manager"></x-button>
</form>

report a bug?
<form action="{{route("bug.create")}}">
<input type="hidden" name="id" value="{{$project->id}}" >
<button style="background-color:red;">Report Bug</button>
</form>
@endcan
</x-layout>