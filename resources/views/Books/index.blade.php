@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Buku</h1>
    <a href="{{ url('/books/create') }}" class="btn btn-primary mb-3">Tambah Buku</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Gambar</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $book)
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
            @endforeach
        </tbody>
    </table>

</div>
@endsection
