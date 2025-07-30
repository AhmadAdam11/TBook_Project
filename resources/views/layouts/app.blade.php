<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TBook - Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            margin: 0;
        }

        .sidebar {
            min-height: 100vh;
            background-color: #3A7CA5;
            color: white;
            padding: 30px 20px;
        }

        .sidebar .nav-link {
            color: white;
            font-weight: 500;
            padding: 10px 5px;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 5px;
        }

        .sidebar .logo {
            width: 150px;
            margin-bottom: 10px;
        }

        .sidebar h4 {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 sidebar d-flex flex-column align-items-center">
                <img src="{{ asset('assets/logo_Tbook.png') }}" alt="Logo" class="logo">
                <ul class="nav flex-column w-100">
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link">
                            <i class="bi bi-bar-chart-line me-2"></i> dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('books.index') }}" class="nav-link">
                            <i class="bi bi-journal-bookmark me-2"></i> Buku
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('category.index') }}" class="nav-link">
                            <i class="bi bi-layout-text-window-reverse me-2"></i> Kategori
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('users.index') }}" class="nav-link">
                            <i class="bi bi-person-add me-2"></i> User Account
                        </a>
                    </li>
                    <li class="nav-item">
                        <!-- Tombol Logout dengan konfirmasi -->
                        <form id="logoutForm" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="button" id="logoutButton" class="btn nav-link text-start w-100">
                                <i class="bi bi-box-arrow-right me-2"></i> Keluar
                            </button>
                        </form>
                    </li>
                </ul>
            </div>

            <!-- Content -->
            <div class="col-md-9 col-lg-10 p-4">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Script Konfirmasi Logout -->
    <script>
        document.getElementById('logoutButton').addEventListener('click', function () {
            if (confirm("Apakah kamu yakin ingin keluar?")) {
                document.getElementById('logoutForm').submit();
            }
        });
    </script>
</body>
</html>
