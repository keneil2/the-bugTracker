<x-adminNav/>
    <!-- add a table displaying task -->
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
             <td>{{$bug->status}}</td>
            </tr>

        @endforeach    
    </table>
    @dump($bugs)