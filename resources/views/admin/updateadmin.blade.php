<x-layout>
  @auth
  <form action="{{route("admin.update",$user->id)}}" method="POST">
    @csrf
    @method("PUT")
     <input type="text" name="name" placeholder="enter the name of the bug" value="{{$user->name}}">
     @error("title")
       {{$message}}  
     @enderror
     <input type="text" name="email" placeholder="enter the type of bug" value="{{$user->email}}">
     @error("type")
       {{$message}}  
     @enderror
<input type="text" name="password" placeholder="update password? ">
     <button type="submit">Add  new Bug</button>
    </form>    
    @endauth
</x-layout>