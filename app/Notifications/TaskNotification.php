<?php

namespace App\Notifications;

use App\Models\Task;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TaskNotification extends Notification
{
    use Queueable;

    public $task;
    /**
     * Create a new notification instance.
     */
    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */

    /**
     * Get the array representation of the notification.
     *
   * @param  mixed  $notifiable
     * @return array
     */
    public function toArray(object $notifiable): array
    {
        
        return [
            'createdby'     => $this->task->createdby->username,
            'avatar'         => $this->task->createdby->avatar,
            'taskName'      => $this->task->title,
            'dueDate'       => $this->task->due_date,
             'users'        => $this->task->users()->Pluck('username')
        ];
    }
}
