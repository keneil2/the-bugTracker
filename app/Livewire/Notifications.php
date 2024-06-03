<?php

namespace App\Livewire;

use App\Models\notification;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Notifications extends Component
{
    use WithPagination;
    public function render()
    {
        $notifications=notification::where("notifiable_id","=",Auth::id())->paginate(10);
        return view('livewire.notifications')->with(["notifications"=>$notifications]);
    }
   
}
