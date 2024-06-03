<div class=" bg-whitesmoke ">
@vite('resources/css/app.css')
   @foreach ( $notifications as $notification )
      <div class="text-gray-500 m p-5  bg-white rounded-10px m-20px shadow-md   w-200px space-x-4"> you have been assigne a ne ticket{{$notification->data["bug_title"]}}</div> 
   @endforeach
  <div>{{$notifications->links("vendor.pagination.semantic-ui")}}</div>
   
</div>

