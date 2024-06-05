<?php

namespace App\Livewire;

use App\Models\notification;
use Livewire\Component;
use Livewire\Attributes\On;

class MarkAsReadButton extends Component
{
    public $id;
    #[On("marked")]
    public function render()
    {
        return view('livewire.mark-as-read-button');
    }
    public function markasRead()
    {
    // dd("right component?");
     notification::where("id","=",$this->id)->update([
        "read_at"=>now(),
     ]);
     $this->dispatch("marked");
     
    }
}
