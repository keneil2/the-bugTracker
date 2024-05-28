
<x-layout>
<x-nav/> 
<style>
    .deleteBtn{
        
       
    }
</style>
@can("update",$project)
<form action="{{route("update.project",$project->id)}}" method="Post">
@csrf
@method("PUT")
<x-input name="title" message="message" value="{{$project->Project_name}}"/>
<x-input name="manager" message="enter Project Manager Name" value="{{$project->Project_Manager}}" />
<x-input name="description" message="message" value="{{$project->description}}"/>
<x-input name="status" message="message" value="{{$project->status}}"/>
<x-button name="update project"/>
</form>
<form action="">
    <button  style="background-color: white; color: red; border:none;"  calss="deleteBtn" type="submit">Delete</button>
</form>
@endcan
</x-layout>