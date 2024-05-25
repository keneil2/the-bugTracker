<x-layout>
<x-nav/>
    <table>
    <th>title</th>
    <th>type</th>
    <th>description</th>
    @foreach ($bugs  as $bug )
        <tr>
            <td>{{$bug->title}}</td>
            <td>{{$bug->type}}</td>
            <td>{{$bug->description}}</td>
            <td><form action="{{route("bug.editTask",$bug->id)}}"><button type="submit">Edit</button></form></td>
        </tr>
    @endforeach
    </table>
</x-layout>