<?php

namespace App\Livewire;

use App\Models\notification;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class NotificationCounter extends Component
{
    public $count;
    protected $listeners=["incrementCount"];
    
    public function render()
    {
        $this->count = notification::where("notifiable_id","=",Auth::id())->where("read_at","=",null)->count();
        return view('livewire.notification-counter',['count' => $this->count]);
    }
    public function mount(){
     $this->count = notification::where("notifiable_id","=",Auth::id())->where("read_at","=",null)->count();
    }   
  public function incrementCount(){
    // dd("working");
    $this->count++;
  }   
}
