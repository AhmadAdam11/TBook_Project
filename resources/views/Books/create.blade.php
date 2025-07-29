@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fw-bold mb-4">Tambah Buku</h2>

    <div class="card shadow-sm border-0 rounded-4" style="background-color: #eaf4fb;">
        <div class="card-body p-4 rounded-4">

            <form action="{{ url('/books/create') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label text-dark">Nama Buku</label>
                    <input type="text" name="name" class="form-control bg-light text-dark border-0" required>
                </div>

                <div class="mb-3">
                    <label class="form-label text-dark">Kategori</label>
                    <select name="category_id" class="form-select bg-light text-dark border-0" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label text-dark">Stok</label>
                    <input type="number" name="stock" class="form-control bg-light text-dark border-0" required>
                </div>

                <div class="mb-3">
                    <label class="form-label text-dark">Gambar</label>
                    <input type="file" name="image" class="form-control bg-light text-dark border-0" required>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ url('/books') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                    <button class="btn btn-primary">
                        <i class="bi bi-bookmark"></i> Simpan
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection
