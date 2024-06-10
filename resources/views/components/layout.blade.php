<!DOCTYPE html>
<html lang="en">

<head>
  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{env("APP_NAME")}}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    @livewireStyles
    @livewireScripts
</head>

<body>
    <!-- vite is used to load asset in quick without refreshing the page like css or js -->
    <!-- @vite("resources/css/app.css") -->
    <header>
    </header>
    <main>
    {{$slot}}
    </main>
    <script src="https://kit.fontawesome.com/f05da63fd8.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- <script src="./js/app.js"></script> -->
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
  <script>
toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "2000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
console.log('CSRF Token:', csrfToken);
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;
    var pusher = new Pusher('b5fda135d253e83c4842', {
      cluster: 'us2',
      forceTLS: true
    });
    var channel = pusher.subscribe('notification.{{Auth::id()}}');
    channel.bind('notify.me', function(data) {
      Livewire.dispatch('incrementCount');
      toastr.info("you have been assign a new ticket "+JSON.stringify(data.bug_title) ,{timeOut: 2000});
    });
    Pusher=new Pusher("b5fda135d253e83c4842",{
    cluster: 'us2',
    forceTLS: true,
    authEndpoint: '/api/pusher/auth', // Ensure this matches your route
    auth: {
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
      }
  });
    
    var adminchannel = Pusher.subscribe('private-admin.notification.{{Auth::id()}}');

    adminchannel.bind('notify.admin', function(data) {

      Livewire.dispatch('incrementCount');

      // toastr.info(JSON.stringify(message) ,{timeOut: 2000});

      alert("what the hail");

    });
  </script>
  
</body>

</html>