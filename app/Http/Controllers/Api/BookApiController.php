<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;

class BookApiController extends Controller
{
    public function index()
    {
        $book = Book::with('category')->get();

        return response()->json([
            'status' => true,
            'message' => 'Data buku berhasil diambil',
            'data' => $book->map(function ($item) {
                return [
                    'id' => $item->id,
                    'name' => $item->name,
                    'image' => $item->image,
                    'category_id' => $item->category_id,
                    'category_nama' => $item->category->nama ?? '',
                    'stock' => $item->stock,
                ];
            }),
        ]);
    }
}