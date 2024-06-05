
<div class=" bg-whitesmoke ">
@livewireStyles
    @livewireScripts
   @vite('resources/css/app.css')
   @foreach ($notifications as $notification)
      <div class="text-gray-500 m p-5  bg-white rounded-10px m-20px shadow-md   w-200px space-x-4" wire:key="{{$notification->id}}"> 
         you have been assigned a new ticket the name is:{{$notification->data["bug_title"]}}
        <div class="flex  my-2"> 
         <!-- <a class=" bg-green-300 rounded-sm p-1.5 mx-2.5 shadow-md text-black"href="">mark as read </a>  -->
          @livewire("mark-as-read-button",["id"=>$notification->id], key('mark-as-read-button-'. $notification->id))
         <a class="bg-blue-100 rounded-sm p-1.5 mx-2.5 shadow-md text-black" href="">view more</a>
        </div>
      </div>
   @endforeach
   <div>{{$notifications->links("vendor.pagination.semantic-ui")}}</div>
</div>


