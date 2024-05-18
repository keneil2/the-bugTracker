<x-layout>
    @dump($roles)
    <form action="">
        <input type="text" name="name" id="">
        <input type="text" name="email" id="">
        <input type="text" name="password" id="">
        <select name="" id="">
            <option value="">select a role</option>
            @foreach ( $roles as $role)
                <option value="{{$role->id}}">{{$role->name}}</option>
            @endforeach
        </select>
        <button type="submit">Register new User</button>
    </form>
</x-layout>