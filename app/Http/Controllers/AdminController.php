<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    // =========================
    // GENRE
    // =========================

    // Menampilkan data genre
    public function genres()
    {
        $genres = Genre::latest()->get();

        return view('admin.genres.index', compact('genres'));
    }

    // Menambahkan genre
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

    // Mengubah genre
    public function updateGenre(Request $request, Genre $genre)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('genres', 'name')->ignore($genre->id),
            ],
        ]);

        $genre->update($validated);

        return redirect()
            ->route('admin.genres')
            ->with('success', 'Genre berhasil diperbarui!');
    }

    // Menghapus genre
    public function destroyGenre(Genre $genre)
    {
        $genre->delete();

        return redirect()
            ->route('admin.genres')
            ->with('success', 'Genre berhasil dihapus!');
    }


    // =========================
    // AUTHOR
    // =========================

    // Menampilkan data author
    public function authors()
    {
        $authors = Author::withCount('books')->latest()->get();

        return view('admin.authors.index', compact('authors'));
    }

    // Menambahkan author
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

    // Mengubah author
    public function updateAuthor(Request $request, Author $author)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('authors', 'email')->ignore($author->id),
            ],
            'bio' => 'nullable|string',
        ]);

        $author->update($validated);

        return redirect()
            ->route('admin.authors')
            ->with('success', 'Author berhasil diperbarui!');
    }

    // Menghapus author
    public function destroyAuthor(Author $author)
    {
        $author->delete();

        return redirect()
            ->route('admin.authors')
            ->with('success', 'Author berhasil dihapus!');
    }
}
