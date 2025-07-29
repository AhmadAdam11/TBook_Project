@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center mt-5">
    <div class="p-4 rounded" style="background-color: #eef8ff; width: 700px;">
        <h5 class="mb-4">Edit Kategori</h5>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Ups!</strong> Ada kesalahan:<br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('category.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <input type="text" name="nama" class="form-control text-center text-muted"
                       value="{{ $category->nama }}" placeholder="Nama Kategori" required>
            </div>
            <div class="d-flex justify-content-between">
                <a href="{{ route('category.index') }}" class="btn btn-outline-secondary">← Kembali</a>
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
