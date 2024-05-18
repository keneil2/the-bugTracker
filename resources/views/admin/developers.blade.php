<x-adminNav/>
<x-layout>
    <h1>Users</h1>
    <form action="">
        add new user
        <input type="text">
        <input type="text">
        <input type="text">
        <input type="text">
        <button>add new user</button>
    </form>
    <table>
        <th>name</th>
        <th>email</th>
        <th>role</th>
        <th>Action</th>
        @if ($users->isEmpty())
            <p>No users found</p>
        @endif
        @foreach ($users as $user )
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->role->name}}</td>
                <td>
                    <form action="{{route("admin.edit",["id"=>$user])}}"><button>update</button></form>
                    <form action=""><button>delete</button></form>
            </td>
            </tr>
        @endforeach
    </table>
</x-layout>