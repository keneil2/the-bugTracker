<?php

namespace App\Notifications;

use Illuminate\Broadcasting\Channel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class BugAssigned extends Notification implements ShouldBroadcast
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    protected $bug;
    public function __construct($bug)
    {
        $this->bug = $bug;
        Log::info('BugAssigned notification created for bug ID: ' . $bug->assigned_to);
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ["database",'broadcast'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'bug_id' => $this->bug->id,
            'bug_title' => $this->bug->title,
        ];
    }



    /**
 * Get the notification's database type.
 *
 * @return string
 */
public function databaseType(object $notifiable): string
{
    return 'User assigned bug';
}

    /**
 * Get the broadcastable representation of the notification.
 */
// public function toBroadcast(object $notifiable): BroadcastMessage
// {
    
//     return new BroadcastMessage([
//         'bug_id' => $this->bug->id,
//         'bug_title' => $this->bug->title,
//     ]);
// }


}
