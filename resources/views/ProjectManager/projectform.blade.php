<form action="{{route("update.project",$project->id)}}" method="Post">
@csrf
@method("PUT")
<x-input name="title" message="message" value="{{$project->Project_name}}"/>
<x-input name="manager" message="enter Project Manager Name" value="{{$project->Project_Manager}}" />
<x-input name="description" message="message" value="{{$project->description}}"/>
<x-input name="status" message="message" value="{{$project->status}}"/>
<button>update project</button>
</form>
Assign users as Project Manager?
<form action="{{route("project.Assignment",$project->id)}}" method="POST"> 
@csrf
<x-select name="users" :category='$users'></x-select>
<button>assign Project Manager</button>
</form>