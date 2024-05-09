<?php

namespace App\Jobs;

use App\Http\Controllers\BookController;
use App\Models\book;
use App\Models\NewBookNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendNewBookNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    protected $book;
    public function __construct(book $book)
    {
        $this->$book = $book;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->book->author->notify(new NewBookNotification($this->book));

    }
}
