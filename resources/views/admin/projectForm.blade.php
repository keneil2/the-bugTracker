<x-layout>
    <form action="{{route("store.project",Auth::id())}}" method="Post">
        @csrf
        <input type="text" name="name" id="">

        <input type="text" name="Manager" id="">
        <textarea name="description" id=""></textarea>
        <input type="date" name="start_Date" id="">
        <input type="date" name="End_date" id="">
        <button type="submit">add Project</button>
    </form>
</x-layout>