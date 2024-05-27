<x-layout>
    <style>
        div input[type="checkbox"]{
            width:20px;
            height:20px;
        }
        .checkbox{
            margin-top:20px;
            font-size: 1rem;
        }
        .form{
            display: flex;
            justify-content: center;

        }
    </style>
    <x-nav/>
    <div class="form">
    <form action="{{route("login")}}" method="POST">
    @csrf
    @error("failed")
        {{$message}}
    @enderror
        <x-input  name="email" message="please enter your email here"/>
        <x-input  name="password" type="password" message="please enter your Password here"/>
       
     <div class="checkbox">
     <label for="rememeberMe">Rememeber Me</label>
        <input type="checkbox" name="remember" id="">
        </div>
        <x-button name="Login"></x-button>
    </form>
    </div>
    </x-layout>
