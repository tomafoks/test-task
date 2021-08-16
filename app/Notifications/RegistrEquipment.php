<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

class RegistrEquipment extends Notification implements ShouldQueue
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
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'equipment' => $this->equipment,
        ];
    }
}
