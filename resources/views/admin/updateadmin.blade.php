<x-layout>
<style>
    .form{
      width:100%;
      height:100%;
      display:flex;
      justify-content: center;
      align-items: center;
    }
  </style>
<x-adminNav/>
  @auth
  <div class="form">
  <form action="{{route("dev.update",$user->id)}}" method="POST">
    @csrf
    @method("PUT")
     <x-input type="text" name="name" message="enter the name of the bug" value="{{$user->name}}"/>

     <x-input type="email" name="email" message="enter the type of bug" value="{{$user->email}}"/>
<x-input name="password" type="password" message="update password?"/>
<x-select name="role" :category="$roles"></x-select>
     <x-button name="update"/>
    </form>    
    </div>
    @endauth
</x-layout>