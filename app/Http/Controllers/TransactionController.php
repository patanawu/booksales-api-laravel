<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    // Menampilkan semua transaksi beserta data customer dan buku
    public function index()
    {
        $transactions = Transaction::with(['customer', 'book'])->get();

        return response()->json([
            'success' => true,
            'data' => $transactions,
        ]);
    }

    // Membuat transaksi baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'order_number' => 'required|string|unique:transactions,order_number',
            'book_id' => 'required|exists:books,id',
            'total_amount' => 'required|integer|min:1',
        ]);

        $validated['customer_id'] = $request->user()->id;

        $transaction = Transaction::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Transaksi berhasil dibuat.',
            'data' => $transaction->load(['customer', 'book']),
        ], 201);
    }

    // Menampilkan detail transaksi
    public function show(string $id)
    {
        $transaction = Transaction::with(['customer', 'book'])->find($id);

        if (!$transaction) {
            return response()->json([
                'success' => false,
                'message' => 'Transaksi tidak ditemukan.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $transaction,
        ]);
    }

    // Mengubah transaksi
    public function update(Request $request, string $id)
    {
        $transaction = Transaction::find($id);

        if (!$transaction) {
            return response()->json([
                'success' => false,
                'message' => 'Transaksi tidak ditemukan.',
            ], 404);
        }

        $validated = $request->validate([
            'order_number' => 'sometimes|required|string|unique:transactions,order_number,' . $id,
            'book_id' => 'sometimes|required|exists:books,id',
            'total_amount' => 'sometimes|required|integer|min:1',
        ]);

        $transaction->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Transaksi berhasil diperbarui.',
            'data' => $transaction->load(['customer', 'book']),
        ]);
    }

    // Menghapus transaksi
    public function destroy(string $id)
    {
        $transaction = Transaction::find($id);

        if (!$transaction) {
            return response()->json([
                'success' => false,
                'message' => 'Transaksi tidak ditemukan.',
            ], 404);
        }

        $transaction->delete();

        return response()->json([
            'success' => true,
            'message' => 'Transaksi berhasil dihapus.',
        ]);
    }
}
