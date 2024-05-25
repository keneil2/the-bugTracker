<x-layout>
<x-nav/>
    @auth
    <h1>welcome {{Auth::user()->name}}</h1>
    @endauth

    @guest
        <h1>Guess</h1>
    @endguest

     {{Session::get("sucess")}}
     <x-tables :bugs=$bugs :projects=$Projects />
</x-layout>