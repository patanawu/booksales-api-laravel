<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Author;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Menampilkan data author
public function authors()
{
    $authors = Author::withCount('books')->latest()->get();

    return view('admin.authors.index', compact('authors'));
}

// Menambahkan data author
public function storeAuthor(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:authors,email',
        'bio' => 'nullable|string',
    ]);

    Author::create($validated);

    return redirect()
        ->route('admin.authors')
        ->with('success', 'Author berhasil ditambahkan!');
}
    // Menampilkan data genre
    public function genres()
    {
        $genres = Genre::latest()->get();

        return view('admin.genres.index', compact('genres'));
    }

    // Menambahkan data genre
    public function storeGenre(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:genres,name',
        ]);

        Genre::create($validated);

        return redirect()
            ->route('admin.genres')
            ->with('success', 'Genre berhasil ditambahkan!');
    }
}
