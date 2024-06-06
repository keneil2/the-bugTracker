<x-layout>
    <x-adminNav></x-adminNav>
    <table class="">
    <th>Bug ID</th>
        <th>Bug Name</th>
        <th>Priority</th>
        <th>Severity</th>
        <th>Status</th>
        <th>Reported By</th>
        <th>Date Reported</th>
        <th>Assigned To</th>
        <th>Date Resolved</th>
        @foreach ($Fixedbugs as $bug)
            <tr>
                <td>{{$bug->id}}</td>
                <td>{{$bug->title}}</td>
                <td>{{$bug->priority}}</td>
                <td>{{$bug->severity}}</td>
                <td>{{$bug->Status}}</td>
                <td>{{$bug->user->name}}</td>
                <td>{{$bug->created_at->format("d/m/y")}}</td>
                <td>{{$bug->assignedUser->name}}</td>
                <td>{{$bug->updated_at->format("d/m/y")}}</td>
                <td> 
            <form action="{{route("sendQA.bugs",$bug->id)}}" method="post">
                @csrf
            <select name="tester_id" id="">
            @foreach ($users as $user)
        <option value="{{$user->id}}">{{$user->name}}</option>
                   @endforeach
                   </select>
                   <button>assign</button> 
                </form>
                </td>
            </tr>
        @endforeach
        
    </table>
</x-layout>