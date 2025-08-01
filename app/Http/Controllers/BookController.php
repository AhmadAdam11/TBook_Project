<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        $data = Book::with('category')
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', '%' . $search . '%');
            })
            ->get();

        $categories = Category::all();

        return view('books.index', compact('data', 'categories', 'search'));
    }

    public function createForm()
    {
        $categories = Category::all();
        return view('books.create', compact('categories'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'category_id' => 'required',
            'stock' => 'required|integer',
        ]);

        $path = $request->file('image')->store('books', 'public');

        $book = Book::create([
            'name' => $request->name,
            'image' => '/storage/' . $path,
            'category_id' => $request->category_id,
            'stock' => $request->stock,
        ]);

        if (!$request->wantsJson()) {
            return redirect('/books')->with('success', 'Buku berhasil ditambahkan');
        }

        return response()->json(['data' => $book->load('category')]);
    }

    public function editForm($id)
    {
        $book = Book::findOrFail($id);
        $categories = Category::all();
        return view('books.edit', compact('book', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'stock' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('books', 'public');
            $book->image = '/storage/' . $path;
        }

        $book->name = $request->name;
        $book->category_id = $request->category_id;
        $book->stock = $request->stock;
        $book->save();

        if (!$request->wantsJson()) {
            return redirect('/books')->with('success', 'Buku berhasil diupdate');
        }

        return response()->json(['data' => $book->load('category')]);
    }

    public function delete($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect('/books')->with('success', 'Buku berhasil dihapus');
    }
}
