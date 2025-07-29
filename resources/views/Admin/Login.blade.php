<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TBook - Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            position: relative;
            height: 100vh;
            overflow: hidden;
        }

        body::before {
            content: "";
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: url("{{ asset('assets/bgtb.jpg') }}") no-repeat center center fixed;
            background-size: cover;
            filter: blur(8px);
            z-index: -1;
        }

        .login-container {
            background-color: rgba(16, 54, 91, 0.85); /* semi transparan */
            border-radius: 20px;
            padding: 40px;  
            color: white;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }

        .form-control {
            background-color: rgba(255, 255, 255, 0.2);
            border: none;
            color: white;
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .form-control:focus {
            background-color: rgba(255, 255, 255, 0.25);
            color: white;
        }

        .btn-login {
            background-color: #002244;
            color: white;
            font-weight: bold;
            font-size: 1.2rem;
        }

        .logo {
            width: 150px;
            margin-bottom: 5px;
        }

        .title {
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .sub-title {
            font-size: 1.2rem;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="col-md-4 login-container text-center">
            <!-- Logo dan Judul -->
            <img src="{{ asset('assets/logo_Tbook.png') }}" class="logo" alt="Logo">
            <div class="sub-title">Welcome!</div>

            <!-- Form Login -->
            <form action="{{ route('admin.login') }}" method="POST">
                @csrf
                <div class="mb-3 text-start">
                    <label>Email</label>
                    <input type="text" name="name" class="form-control" placeholder="Email" value="{{ old('name') }}" required>
                </div>
                <div class="mb-3 text-start">
                    <label>Sandi</label>
                    <input type="password" name="password" class="form-control" placeholder="Sandi" required>
                </div>
                @error('login')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
                <button class="btn btn-login w-100 mt-2">Masuk</button>
            </form>
        </div>
    </div>
</body>
</html>
