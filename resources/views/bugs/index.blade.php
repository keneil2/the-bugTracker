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
    <table>
        
    @foreach ( $Projects as $Project )

         <tr>
            <td><h1>{{ $Project->Project_name}}</h1></td>
            <td><p>{{ $Project->Project_Manager}}</p></td>
           <td><p>{{$Project->description}}</p></td>
            </tr>
            
                
        <form action="{{route("bug.create")}}" >
        <input type="hidden" value="{{$Project->id}}" name="id">
         @csrf
           <button>view more</button>
        </form> 
        </table>
    @endforeach
    @endauth
    
    
</x-layout>