<x-layout>
@can("canviewDevs")
Assign users as Project Manager?
<form action="{{route("project.Assignment",$project_id)}}" method="POST">
@csrf
<x-select name="users" :category='$users'></x-select>
<x-button name="assign Project Manager"></x-button>
</form>

report a bug?
<form action="{{route("bug.create")}}">
<input type="hidden" name="id" value="{{$project_id}}" >
<button style="background-color:red;">Report Bug</button>
</form>
@endcan
</x-layout>