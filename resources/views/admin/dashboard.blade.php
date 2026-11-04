
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Admin - BookSales</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f4f8fc;
        }
        .sidebar {
            min-height: 100vh;
            background: #174a78;
        }
        .sidebar a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 8px;
        }
        .sidebar a:hover {
            background: #28699e;
        }
        .content-card {
            border: none;
            border-radius: 14px;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <aside class="col-md-3 col-lg-2 sidebar p-4">
            <h4 class="text-white fw-bold mb-4">BookSales</h4>

            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a href="{{ route('admin.genres') }}">Kelola Genre</a>
            <a href="{{ route('admin.authors') }}">Kelola Author</a>

            <form action="{{ route('admin.logout') }}" method="POST" class="mt-4">
                @csrf
                <button class="btn btn-outline-light w-100">Logout</button>
            </form>
        </aside>

        <main class="col-md-9 col-lg-10 p-4 p-md-5">
            <h2 class="fw-bold">Dashboard Admin</h2>
            <p class="text-muted">Selamat datang di panel administrasi BookSales.</p>

            <div class="row g-4 mt-2">
                <div class="col-md-6">
                    <div class="card content-card shadow-sm p-4">
                        <h5>Kelola Genre</h5>
                        <p class="text-muted">Lihat dan tambahkan data genre buku.</p>
                        <a href="{{ route('admin.genres') }}" class="btn btn-primary">
                            Buka Genre
                        </a>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card content-card shadow-sm p-4">
                        <h5>Kelola Author</h5>
                        <p class="text-muted">Lihat dan tambahkan data penulis buku.</p>
                        <a href="{{ route('admin.authors') }}" class="btn btn-primary">
                            Buka Author
                        </a>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
</body>
</html>
