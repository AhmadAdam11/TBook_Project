<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Menampilkan semua kategori
    public function index()
    {
        $categories = Category::all(); 
        return view('category.index', compact('categories'));
    }

    // Menampilkan form untuk membuat kategori baru
    public function create()
    {
        return view('category.create');
    }

    // Menyimpan kategori baru ke database
    public function store(Request $request)
    {
        // Validasi input kategori
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        Category::create($request->only('nama'));

        return redirect()->route('category.index')->with('success', 'Kategori berhasil ditambahkan!');
    }

    // Menampilkan form untuk mengedit kategori
    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    // Mengupdate kategori
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $category->update($request->only('nama'));

        return redirect()->route('category.index')->with('success', 'Kategori berhasil diupdate!');
    }

    // Menghapus kategori
    public function destroy(Category $category)
    {
        // Cek apakah kategori masih digunakan oleh buku
        if ($category->books()->count() > 0) {
            return redirect()->route('category.index')->with('error', 'Kategori ini tidak bisa dihapus karena masih ada buku yang menggunakannya.');
        }

        $category->delete();

        return redirect()->route('category.index')->with('success', 'Kategori berhasil dihapus!');
    }
}
