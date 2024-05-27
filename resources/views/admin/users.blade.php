
<x-layout>
    <style>
        .buttons{
            display: flex;
            justify-content:space-around;
            width:100%;
        }
        table{
            border-collapse:collapse;
            
        }

        tr button:nth-child(even){
    padding:5px 7px;
    background-color:rgba(255,0,0,0.6);
    color:white;
    border-radius:5px;
    padding:5px 7px;
    border:1px solid black;
}

tr button{
    background-color: #04AA6D;
    color: white;
    padding:10px 50px;
    padding:5px 7px;
    border-radius:5px;
    border:1px solid black;
}
        .container{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }
        .container  h1{
            margin-top:100px;
            text-align: center;
            margin-bottom: 50px;
        }
        .container button:hover{
            background-color: white;
            color:black;
        }
    </style>
<x-adminNav/>
    @php
        $titles=["name","email","role", "Action"];
        $properties=["name","emial","role->name"];
    @endphp
  <div class="container">
    <form action="{{route("users.search")}}">
        <input type="text" placeholder="Search" name="search">
        <button>Submit</button>
    </form>

    <x-tabledesign tableName="Users Table" :titles="$titles" :properrties="$properties">
    @if ($users->count())
            <p>No users found</p>
        @endif
        @foreach ($users as $user )
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->role->name}}</td>
                <td>
                    <div class="buttons">
                    <form action="{{route("user.edit",["id"=>$user->id])}}"><button>update</button></form>
                    <form action="{{route("user.delete",['id'=>$user->id])}}">
                        @method("DELETE") <button>delete</button></form>
                        </div>
            </td>

            </tr>

        @endforeach

    </x-tabledesign>
    </div>

</x-layout>