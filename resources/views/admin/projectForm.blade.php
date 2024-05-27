<x-layout>
<x-adminNav/>
<style>
    .form{
      width:100%;
      height:100%;
      display:flex;
      justify-content: center;
      align-items: center;
    }
  </style>
<div class="form">
    <form action="{{route("store.project",Auth::id())}}" method="Post">
        @csrf
        <x-input type="text" name="name"/>

        <x-input type="text" name="Manager"/>
        <x-input type="date" name="start_Date"/>
        <x-input type="date" name="End_date" id=""/>
        <x-textarea name="description"/>
<x-button name="Add Project"/>
    </form>
    </div>
</x-layout>