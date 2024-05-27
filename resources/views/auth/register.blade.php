


<x-layout>
<x-nav/>
<style>
    .form{
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
</style>
<div class="form">

    <form action="{{route("registration")}}" method="POST">
    <h1>Register a new User</h1>
    @csrf
        <x-input type="text" message="enter your name here" name="username" />
        
        <x-input type="email" message="enter your email" name="email" />
        
        <x-input type="password"  message="enter your password" name="password"/>

        <x-input type="password" message="re-type Password" name="password_confirmation"/>
        <x-button name="Sign Up"></x-button>
    </form>
    </div>
</x-layout>