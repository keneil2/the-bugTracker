<x-layout>
    <link rel="stylesheet" href="{{asset("css/bug.css")}}">
    @auth
    <h1>User Logged in</h1>
    @endauth

    @guest
        <h1>Guess</h1>
    @endguest

     {{Session::get("sucess")}}
    @auth
    <h1>Latest Bugs</h1>
    <div class="new-bugs">
    @foreach ( $bugs as $bug )

         <div class="bug">
            <h1>{{$bug->title}}</h1>
            <p>{{$bug->description}}</p>

            @can("edit",$bug)
                
        <form action="{{route("bug.edit",$bug->id)}}" >

           <button>edit</button>
           
        </form> 
           @endcan
        </div>
    @endforeach
    </div>
    @endauth
    
    
</x-layout>