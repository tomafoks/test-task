<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MoveEquipmentToStorage extends Notification implements ShouldQueue
{
    use Queueable;
    public $equipment;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($equipment)
    {
        $this->equipment = $equipment;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'equipment' => $this->equipment->id,
            'new_storage' => $this->equipment->storage_id,
            'manager_name' => $notifiable->name,
            'manager_email' => $notifiable->email,
            'message' => 'moving equipment to storage'
        ];
    }
}
