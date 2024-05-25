<x-layout>
<x-nav/>
  @auth
  <form action="{{route("bug.update",$bug->id)}}" method="POST">
    @csrf
    @method("PATCH")
     <input type="text" name="title" placeholder="enter the name of the bug" value="{{$bug->title}}">
     @error("title")
       {{$message}}  
     @enderror
     <input type="text" name="type" placeholder="enter the type of bug" value="{{$bug->type}}">
     @error("type")
       {{$message}}  
     @enderror
     <textarea name="description" id="">{{$bug->description}}</textarea>
     @error("description")
       {{$message}}  
     @enderror
     <button type="submit">Add  new Bug</button>
    </form>

 
   
  @can("delete",$bug)
<form action="{{route("bug.destroy",$bug)}}" method="post">
    @csrf
      @method("DELETE")
      <button type="submit">Delete</button>
    </form>
@endcan
@endauth
    
   
 
</x-layout>