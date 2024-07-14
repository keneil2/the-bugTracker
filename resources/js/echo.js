import Echo from 'laravel-echo';
 
import Pusher from 'pusher-js';
window.Pusher = Pusher;
 
window.Echo = new Echo({
    broadcaster: 'pusher',
    key: "b5fda135d253e83c4842",
    cluster: 'us2',
    forceTLS: true
});
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
// window.Echo.private(`notification`)
//     .listen('notify', (e) => {
//         Livewire.dispatch('incrementCount');
//       toastr.info("you have been assign a new ticket "+JSON.stringify(data.bug_title) ,{timeOut: 2000});
//     });
window.Echo.private('admin.notification')
    // .listen('notify.me', () => {
    //     console.log("working");
    //     Livewire.dispatch('incrementCount');
    //     // Livewire.dispatch('incrementCount');
    //     toastr.info(JSON.stringify(data.message), { timeOut: 20000 });
    // });
window.Echo.private('private-newbugtotest')
    .listen('NewBugToTest', () => {
        console.log("working")
        Livewire.dispatch('incrementCount');
        // Livewire.dispatch('incrementCount');
        toastr.info(JSON.stringify(data.message), { timeOut: 20000 });
    });
// window.Echo.channel('notification')
//     .listen('notify.me', () => {
//               Livewire.dispatch('incrementCount');
//               toastr.info("you have been assign a new ticket "+JSON.stringify(data.bug_title) ,{timeOut: 2000});
//     });