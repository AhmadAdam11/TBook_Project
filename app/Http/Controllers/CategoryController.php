<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $categories = Category::when($search, function ($query, $search) {
            return $query->where('nama', 'like', '%' . $search . '%');
        })->get();

        return view('category.index', compact('categories'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        Category::create($request->only('nama'));

        return redirect()->route('category.index')->with('success', 'Kategori berhasil ditambahkan!');
    }

    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $category->update($request->only('nama'));

        return redirect()->route('category.index')->with('success', 'Kategori berhasil diupdate!');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('category.index')->with('success', 'Kategori berhasil dihapus!');
    }
}
