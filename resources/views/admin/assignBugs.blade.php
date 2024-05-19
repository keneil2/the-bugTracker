
<x-layout>
    <form action="">
        <div>
            <p>{{$bug->title}}</p>
            <p>{{$bug->type}}</p>
            <p>{{$bug->description}}</p>
        </div>

        <select name="developer" id="">
            @foreach ($users as $user )
                 <option value="{{$user->id}}"> {{$user->name}}</option>
            @endforeach
        </select>
        <button>assign task</button>
    </form>
</x-layout>