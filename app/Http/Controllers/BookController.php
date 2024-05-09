<?php

namespace App\Http\Controllers;

use App\Jobs\SendNewBookNotification;
use App\Models\book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\Author;
class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function addNewBook(Request $request)
    {
        $newBook = Book::create($request->all());

        // Dispatch job to send notification about the new book
        SendNewBookNotification::dispatch($newBook)->onQueue('notifications');

        return response()->json(['message' => 'Book added successfully'], 201);
    }
    public function index(Request $request)
    {
        $queryParameters = $request->all();
        $cacheKey = 'books_' . http_build_query($queryParameters);
        $books = Cache::remember($cacheKey, 3600, function () use ($queryParameters) {
            // Retrieve books based on request parameters
            return Book::with('authors')
                ->where('genre', $queryParameters['genre'] ?? null)
                ->paginate(10);
        });

        return response()->json($books);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(book $book)
    {
        //
    }
}
