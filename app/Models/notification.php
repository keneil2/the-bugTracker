<?php

namespace App\Models;

use Illuminate\Broadcasting\Channel;
use Illuminate\Database\Eloquent\BroadcastsEvents;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\DatabaseNotification;

class notification extends DatabaseNotification
{
    use HasFactory, BroadcastsEvents;





    public function users(){
        return $this->belongsTo(User::class,"notifiable_id");
    }
//     public function broadcastOn($event)
//     {
//         return match($event){
//   'created' => new Channel('notifications.' . $this->notifiable_id),
//         };
        
//     }

}
