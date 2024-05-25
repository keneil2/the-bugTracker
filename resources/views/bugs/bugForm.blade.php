<x-layout>
<x-nav/>
    <form action="{{route("bug.store")}}" method="POST">
    @csrf
     <input type="text" name="title"value="{{old("title")}}" placeholder="enter the name of the bug">
     @error("title")
       {{$message}}  
     @enderror
     <select name="type" id="">
      <option value="Bug">Bug</option>
      <option value="Error">Error</option>
      <option value="Issue">Issue</option>
     </select>
     @error("type")
       {{$message}}  
     @enderror
     <select name="Priority" id="">
      <option value="Low">Low</option>
      <option value="Medium">Medium</option>
      <option value="High">High</option>
     </select>
     <select name="severity" id="">
      <option value="minor">minor</option>
      <option value="major">major</option>
      <option value="critical">critical</option>
     </select>
    
     <textarea name="description" id="">{{old("type")}}</textarea>
     @error("description")
       {{$message}}  
     @enderror
     <input type="hidden" name="id" value="{{$id}}">
     <button type="submit">Add  new Bug</button>
    </form>
</x-layout>