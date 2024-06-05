<?php

namespace App\Livewire;

use App\Models\notification;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;

class Notifications extends Component
{
    use WithPagination;

    protected $listeners = ['marked' => '$refresh'];
    public function render()
    {
        $notifications=notification::where("notifiable_id","=",Auth::id())->where("read_at","=",null)->paginate(10);
        return view('livewire.notifications')->with(["notifications"=>$notifications]);
    }
   
}
