<x-layout>
    <form action="{{route("bug.store")}}" method="POST">
    @csrf
     <input type="text" name="title"value="{{old("title")}}" placeholder="enter the name of the bug">
     @error("title")
       {{$message}}  
     @enderror
     <input type="text" name="type" value="{{old("type")}}" placeholder="enter the type of bug">
     @error("type")
       {{$message}}  
     @enderror
     <textarea name="description" id="">{{old("type")}}</textarea>
     @error("description")
       {{$message}}  
     @enderror
     <select name="category" id="">
      <option value="In-progress">In-progress</option>
      <option value="Resolved">Resolved</option>
      <option value="Closed">Closed</option>
     </select>
     <button type="submit">Add  new Bug</button>
    </form>
</x-layout>