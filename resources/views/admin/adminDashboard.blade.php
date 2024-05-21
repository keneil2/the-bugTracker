<x-adminNav/>
    <!-- add a table displaying task -->
    <form action="{{route("project.create")}}"><button type="submit">add Project</button></form>
    <table>
        <th>title</th>
        <th>type</th>
        <th>Assigned to</th>
        <th>description</th>
        <th>staus</th>
        @foreach ( $bugs as $bug)
             <tr>
             <td>{{$bug->title}}</td>
             <td>{{$bug->type}}</td>
             <td>{{$bug->user->name}}</td>
             <td>{{$bug->description}}</td>
             <td>{{$bug->Status}}</td>
             <td><a href="{{route("admin.showBug",$bug->id)}}"> view more</a></td>
            </tr>

        @endforeach    
    </table>