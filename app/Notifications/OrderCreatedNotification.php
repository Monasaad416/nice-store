<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Order;


class OrderCreatedNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $order;
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database','broadcast'];
        // $channels = ['database'];
        // if ($notifiable->notification_pereferences['order_created']['sms']) ?? false)
        // {
        //     $channels[] = 'vonage';
        // }
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $orderNumber = $this->order->order_number;
        $client =  $this->order->client->name ?? 'unknown';
        $city = $this->order->addresses()->where('type','billing')->first()->city->name;
        $address = $this->order->addresses->where('type','billing')->first()->street;
        return (new MailMessage)
                    ->subject('New Order # '. $orderNumber)
                    ->from('nicestore@nicestore.com','NICE STORE')
                    ->greeting($notifiable->name)
                    ->line("A new order (#  $orderNumber) has been added by $client from $city  , $address")
                    ->action('View Order', url('/front/order/{$order}/details'))
                    ->line('Thank you for using our application!');
    }


    public function toDatabase($notifiable)
    {
        $orderNumber = $this->order->order_number;
        $client =  $this->order->client->name ?? 'unknown';
        $city = $this->order->addresses()->where('type','billing')->first()->city->name;
        $address = $this->order->addresses->where('type','billing')->first()->street;
        return [
            'body' => "A new order (#  $orderNumber) has been added by $client from $city  , $address",
            'icon' =>'fas fa-file',
            'url' => '',
        ];
    }

    public function toBroadcast($notifiable)
    {
        $orderNumber = $this->order->order_number;
        $client =  $this->order->client->name ?? 'unknown';
        $city = $this->order->addresses()->where('type','billing')->first()->city->name;
        $address = $this->order->addresses->where('type','billing')->first()->street;
        return [
            'body' => "A new order (#  $orderNumber) has been added by $client from $city  , $address",
            'icon' =>'fas fa-file',
            'url' => '',
        ] ;
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
            //
        ];
    }
}
