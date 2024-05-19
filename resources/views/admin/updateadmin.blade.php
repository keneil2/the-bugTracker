<x-layout>
  @auth
  <form action="{{route("dev.update",$user->id)}}" method="POST">
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
<select name="" id="">
 @foreach ($roles as $role)
   <option value="{{$role->id}}">{{$role->name}}</option>
 @endforeach
</select>
     <button type="submit">Add  new Bug</button>
    </form>    
    @endauth
</x-layout>