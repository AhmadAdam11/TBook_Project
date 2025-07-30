<!-- resources/views/users/index.blade.php -->
@extends('layouts.app')

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Kelola Akun User</title>
    <style>
        .form-control {
            display: block;
            margin: 5px 0;
            padding: 6px;
            width: 100%;
        }
        .btn {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            margin-top: 4px;
        }
        .btn-warning {
            background-color: orange;
            color: white;
        }
        .btn-danger {
            background-color: red;
            color: white;
        }
        .alert {
            background-color: #c8e6c9;
            padding: 10px;
            margin: 10px 0;
            border-left: 5px solid green;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        .table th, .table td {
            padding: 10px;
            border: 1px solid #ddd;
        }
        .action-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }
    </style>
</head>

@section('content')
<body>

    <h2>Akun User</h2>

    @if(session('success'))
        <div class="alert">{{ session('success') }}</div>
    @endif
    
    <a href="{{ url('/export-user') }}" 
       class="btn-primary" 
       style="margin: 10px 0; padding: 8px 12px; background-color: blue; color: white; text-decoration: none; border-radius: 5px; display: inline-block;">
        Download Excel
    </a>

    <form action="{{ route('users.store') }}" method="POST" class="form-tambah-user">
        @csrf
        <input type="text" name="name" class="form-control" placeholder="Nama User" required />
        <input type="text" name="class" class="form-control" placeholder="Kelas (contoh: 5D)" required />
        <input type="password" name="password" class="form-control" placeholder="Password" required />
        <button class="btn btn-primary" style="background-color: green; color: white;">Tambah User</button>
    </form>

    <table class="table">
        <tr>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Aksi</th>
        </tr>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->class }}</td>
            <td>
                <div class="action-group">
                    <!-- Form Update -->
                    <form action="{{ route('users.update', $user->id) }}" method="POST" class="update-form">
                        @csrf
                        @method('PUT')
                        <input type="text" name="name" value="{{ $user->name }}" class="form-control" required />
                        <input type="text" name="class" value="{{ $user->class }}" class="form-control" placeholder="Kelas" required />
                        <input type="password" name="password" class="form-control" placeholder="Password baru (opsional)" />
                        <button class="btn btn-warning">Update</button>
                    </form>

                    <!-- Form Delete -->
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" onclick="return confirm('Yakin hapus user ini?')">Hapus</button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </table>

    <script>
        setTimeout(() => {
            const alert = document.querySelector('.alert');
            if(alert) {
                alert.style.opacity = '0';
                setTimeout(() => alert.style.display = 'none', 500);
            }
        }, 4000);
    </script>

</body>
@endsection
</html>
