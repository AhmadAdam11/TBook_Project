@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Buku</h1>
    <form action="{{ url('/books/update/'.$book->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Nama Buku</label>
            <input type="text" name="name" class="form-control" value="{{ $book->name }}" required>
        </div>

        <div class="mb-3">
            <label>Kategori</label>
            <select name="category_id" class="form-control" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}" {{ $book->category_id == $cat->id ? 'selected' : '' }}>
                        {{ $cat->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Stok</label>
            <input type="number" name="stock" class="form-control" value="{{ $book->stock }}" required>
        </div>

        <div class="mb-3">
            <label>Gambar (Kosongkan jika tidak ingin mengubah)</label><br>
            <img src="{{ asset($book->image) }}" width="100" class="mb-2">
            <input type="file" name="image" class="form-control">
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ url('/books') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
