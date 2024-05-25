<x-layout>
    <x-nav/>
    <form action="{{route("login")}}" method="POST">
    @csrf
    @error("failed")
        {{$message}}
    @enderror
        <input type="text" name="email" value="{{old("email")}}">
        @error("email")
            {{$message}}
        @enderror
        <input type="text" name="password" value="{{old("password")}}">
        @error("password")
            {{$message}}
        @enderror
        <label for="rememeberMe">Rememeber Me</label>
        <input type="checkbox" name="remember" id="">
        <button type="submit">Login</button>
    </form>
    </x-layout>
