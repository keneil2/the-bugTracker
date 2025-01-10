<x-layout>
    <x-adminNav></x-adminNav>
    <div class="flex items-center flex-col">

  
    <h1 class="mt-3 mb-3 font-bold text-2xl">Resolved Bugs</h1>
    <table class="w-[90%]">
    <th class="text-center font-medium h-8 bg-green-600 text-white">Bug ID</th>
        <th class="text-center font-medium h-8 bg-green-600 text-white" >Bug Name</th>
        <th class="text-center font-medium h-8 bg-green-600 text-white">Priority</th>
        <th class="text-center font-medium h-8 bg-green-600 text-white">Severity</th>
        <th class="text-center font-medium h-8 bg-green-600 text-white">Status</th>
        <th class="text-center font-medium h-8 bg-green-600 text-white">Reported By</th>
        <th class="text-center font-medium h-8 bg-green-600 text-white">Date Reported</th>
        <th class="text-center font-medium h-8 bg-green-600 text-white">Assigned To</th>
        <th class="text-center font-medium h-8 bg-green-600 text-white">Date Resolved</th>
        <th class="text-center font-medium h-8 bg-green-600 text-white">Assign to</th>
        @foreach ($Fixedbugs as $bug)
            <tr class="border-y-gray-400 border text-center ">
                <td class=" p-3 ">{{$bug->id}}</td>
                <td  class=" p-3 text-capitalize">{{$bug->title}}</td>
                <td  class=" p-3">{{$bug->priority}}</td>
                <td  class=" p-3">{{$bug->severity}}</td>
                <td  class=" p-3">{{$bug->Status}}</td>
                <td  class=" p-3">{{$bug->user->name}}</td>
                <td  class=" p-3">{{$bug->created_at->format("d/m/y")}}</td>
                <td  class=" p-3">{{$bug->assignedUser->name}}</td>
                <td  class=" p-3">{{$bug->updated_at->format("d/m/y")}}</td>
                <td  class=" p-3"> 
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
</div>
</x-layout>