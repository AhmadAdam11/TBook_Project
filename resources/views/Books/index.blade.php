@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fw-bold mb-4">Buku</h2>
    <div class="card shadow-sm border-primary rounded-4">
        <div class="card-body bg-primary-subtle p-4 rounded-4">
            <div class="d-flex justify-content-between mb-3">
                <form method="GET" class="flex-grow-1 me-3">
                    <div class="input-group">
                        <span class="input-group-text bg-primary text-white"><i class="bi bi-search"></i></span>
                        <input type="text" class="form-control" name="search" placeholder="Cari judul buku" value="{{ request('search') }}">
                    </div>
                </form>
                <div>
                    <a href="{{ url('/books/report') }}" class="btn btn-secondary me-2">
                        <i class="bi bi-file-earmark-text"></i> Lihat laporan
                    </a>
                    <a href="{{ url('/books/create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-lg"></i> Tambah buku
                    </a>
                </div>
            </div>

            <div class="table-responsive rounded">
                <table class="table table-bordered table-hover text-white" style="background-color: #34789e;">
                    <thead class="table-dark">
                        <tr>
                            <th>Gambar</th>
                            <th>Buku</th>
                            <th>Kategori</th>
                            <th>Stock</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $book)
                        <tr>
                            <td><img src="{{ asset($book->image) }}" width="80"></td>
                            <td>{{ $book->name }}</td>
                            <td>{{ $book->category->nama ?? '-' }}</td>
                            <td>{{ $book->stock }}</td>
                            <td>
                                <a href="{{ url('/books/edit/'.$book->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ url('/books/delete/'.$book->id) }}" method="POST" style="display:inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau hapus?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-white-50">Tidak ada data buku.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
