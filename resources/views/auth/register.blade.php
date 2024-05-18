


<x-layout>
<h1>Register a new User</h1>
    <form action="{{route("registration")}}" method="POST">
    @csrf
        <input type="text" name="username" value="{{old("username ")}}" id="">
        @error("username")
        {{$message}}
        @enderror
        <input type="email" name="email" value="{{old("email")}}">
        @error("email")
        {{$message}}
        @enderror
        <input type="password" name="password">
        @error("password")
        {{$message}}
        @enderror
        <input type="password" name="password_confirmation" id="">
        <button type="submit">Sign Up</button>
    </form>
</x-layout>