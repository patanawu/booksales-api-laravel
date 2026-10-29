<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthorController extends Controller
{
    // Menampilkan semua author
    public function index()
    {
        return response()->json([
            'success' => true,
            'data' => Author::with('books')->get(),
        ]);
    }

    // Menambahkan author
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:authors,email',
            'bio' => 'nullable|string',
        ]);

        $author = Author::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Author berhasil ditambahkan.',
            'data' => $author,
        ], 201);
    }

    // Menampilkan satu author
    public function show(string $id)
    {
        $author = Author::with('books')->find($id);

        if (!$author) {
            return response()->json([
                'success' => false,
                'message' => 'Author tidak ditemukan.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $author,
        ]);
    }

    // Mengubah author
    public function update(Request $request, string $id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                'success' => false,
                'message' => 'Author tidak ditemukan.',
            ], 404);
        }

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

        return response()->json([
            'success' => true,
            'message' => 'Author berhasil diperbarui.',
            'data' => $author,
        ]);
    }

    // Menghapus author
    public function destroy(string $id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                'success' => false,
                'message' => 'Author tidak ditemukan.',
            ], 404);
        }

        $author->delete();

        return response()->json([
            'success' => true,
            'message' => 'Author berhasil dihapus.',
        ]);
    }
}
