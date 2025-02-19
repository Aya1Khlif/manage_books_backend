<?php

namespace App\Notifications;

use App\Models\book;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewBookNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    protected $book;
    public function __construct(book $book)
    {
        $this->book = $book;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
        ->line('A new book has been added to the library:')
        ->line('Title: ' . $this->book->title)
        ->line('Author: ' . $this->book->author->name)
        ->action('View Book', url('/books/' . $this->book->id))
        ->line('Thank you for using our library!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
