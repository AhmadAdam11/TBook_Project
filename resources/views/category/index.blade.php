@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fw-bold mb-4">Kategori</h2>

    <div class="card shadow-sm border-primary rounded-4">
        <div class="card-body bg-primary-subtle p-4 rounded-4">
            <div class="d-flex justify-content-between mb-3">
                <form class="flex-grow-1 me-3" method="GET" action="{{ url('/category') }}">
                    <div class="input-group">
                        <span class="input-group-text bg-primary text-white"><i class="bi bi-search"></i></span>
                        <input type="text" class="form-control" placeholder="Cari kategori..." name="search" value="{{ request('search') }}">
                    </div>
                </form>
                <div>
                    <a href="{{ route('category.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-lg"></i> Tambah kategori
                    </a>
                </div>
            </div>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @elseif (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <div class="table-responsive rounded">
                <table class="table table-bordered table-hover text-white" style="background-color: #34789e;">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $index => $category)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $category->nama }}</td>
                                <td>
                                    <a href="{{ route('category.edit', $category->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('category.destroy', $category->id) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Yakin ingin menghapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center text-white-50">Tidak ada data kategori.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
