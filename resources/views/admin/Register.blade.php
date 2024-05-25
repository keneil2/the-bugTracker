<x-layout>
<x-adminNav/>
    @dump($roles)
    <form action="{{route("admin.register")}}" method="Post">
    @csrf
    {{Session::get("success")}}
        <input type="text" name="name" id="">
        @error("name")
            
        @enderror
        <input type="text" name="email" id="">
        @error("email")
            
            @enderror
        <input type="text" name="password" id="">
        <input type="text" name="password_confirmation" id="">
        @error("password")
            
            @enderror
        <select name="roleId" id="">
            <option value="">select a role</option>
            @foreach ( $roles as $role)
                <option value="{{$role->id}}">{{$role->name}}</option>
            @endforeach
        </select>
        @error("roleId")
            @enderror
        <button type="submit">Register new User</button>
    </form>
</x-layout>