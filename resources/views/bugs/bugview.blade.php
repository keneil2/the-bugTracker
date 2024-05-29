<x-layout>
<x-adminNav/>
<style>
    *{
        box-sizing: border-box;
    }
    .bug{
        width:500px;
        display:flex;
        flex-direction: column;
        justify-content:space-between;
        background-color: whitesmoke;
        padding:20px;
        margin-top: 100px;
    }

    .details{
         width:200px;
    }

    .details p{
   font-size: 1.3rem;
    }

    span{
        display: flex;
        flex-direction: column;
    }

    small,span{
        color:grey;
    }

    span{
        margin-bottom: 30px;
        margin-top: 30px;
        
    }

    section{
        display:flex;
        justify-content: center;
        align-items: center;
        width:100%;
        height:100vh;
        text-transform: capitalize;
    }

    textarea{
        width:400px;
        height:200px;
    }

</style>
<section>
    <div class="bug">
        
        <div>
        <h2 class="bug_Name">bug Name: {{$bug->title}}</h2>
       <p class="description">description: {{$bug->description}}</p>
        </div>
        <div class="details">
            <span><small>bug type</small>{{$bug->type}}</span>
            <span><small>uploaded by</small>{{$bug->user->name}}</span>
           <span><small>assigned to</small>{{$bug->assignedUser->name}}</span>
    </div>
    <form action="">
       <span> Leave a comment?</span>
        <textarea name="comment"></textarea>
        <x-button name="add Comment"/>
    </form>
    @can("assignBugs",$bug)
 
 <form action="{{route("assign.Bug",$bug->id)}}" method="POST">
 @method("PUT")
 @csrf
   
        
    
     <x-select name="user_id"  :category="$users">

     </x-select>
    
     <x-button name="assign Task"></x-button>
 </form> 

 @endcan
    </div>
    
    
    </section>
</x-layout>