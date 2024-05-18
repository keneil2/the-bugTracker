<x-layout>
    <form action="">
        <input type="text" name="title">
        <input type="text" name="type">
        <textarea type="text" name="description"></textarea>
        <select name="developer" id="">
            @foreach ($devs as $dev )
                 <option value="{{$dev->id}}"> {{$dev->name}}</option>
            @endforeach
        </select>
        <button>assign task</button>
    </form>
</x-layout>