<x-layout>
  @auth
  <form action="{{route("bug.update",$user->id)}}" method="POST">
    @csrf
    @method("PATCH")
     <input type="text" name="title" placeholder="enter the name of the bug" value="{{$user->name}}">
     @error("title")
       {{$message}}  
     @enderror
     <input type="text" name="type" placeholder="enter the type of bug" value="{{$user->email}}">
     @error("type")
       {{$message}}  
     @enderror
<input type="text" placeholder="update password? ">
     <button type="submit">Add  new Bug</button>
    </form>    
    @endauth
</x-layout>