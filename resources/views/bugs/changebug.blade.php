<x-layout>
<x-nav/>
  @auth
  
  <div>
  <h2>{{$bug->title}}</h2>
    
  <small>{{$bug->type}}</small>  
   
   <p>{{$bug->description}}</p> 
   
  </div>  
     <form action="{{route("task.resolved",$bug->id)}}" method="POST">
    @csrf
    @method("PUT")
     <button type="submit"> Mark as Resolved</button>
    </form>   
    <form action="">
      <p>leave a comment?</p>
      <textarea name="comment" id="" cols="30" rows="5"></textarea>
    </form>
    @endauth
</x-layout>