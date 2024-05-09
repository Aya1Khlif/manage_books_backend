<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\book;
use App\Models\User;


class Activity extends Controller
{
    public function trackBookBorrowing(book $book, User $user)
    {
        // Record book borrowing activity
        book::create([
            'subject_id' => $book->id,
            'subject_type' => book::class,
            'type' => 'borrow',
            'user_id' => $user->id,
        ]);
    }

    public function trackAuthorEvent(Author $author, User $user, $eventType)
    {

        book::create([
            'subject_id' => $author->id,
            'subject_type' => Author::class,
            'type' => $eventType,
            'user_id' => $user->id,
        ]);
    }

    public function listActivities()
    {
        // Retrieve all activities with their related subjects
        $activities = book::with('subject')->get();

        return response()->json($activities);
    }
}
