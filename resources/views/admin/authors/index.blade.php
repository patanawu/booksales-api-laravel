
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kelola Author - BookSales</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f4f8fc;
        }
        .main-card {
            border: none;
            border-radius: 14px;
        }
        .btn-primary {
            background: #3987d6;
            border: none;
        }
    </style>
</head>
<body>
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold">Kelola Author</h2>
            <p class="text-muted">Daftar dan tambah data penulis buku.</p>
        </div>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-primary">
            Kembali ke Dashboard
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <div class="row g-4">
        <div class="col-lg-4">
            <div class="card main-card shadow-sm p-4">
                <h5 class="fw-bold mb-3">Tambah Author</h5>

                <form action="{{ route('admin.authors.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Nama Author</label>
                        <input type="text" name="name" class="form-control"
                            placeholder="Nama penulis" value="{{ old('name') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control"
                            placeholder="author@email.com" value="{{ old('email') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Biografi</label>
                        <textarea name="bio" class="form-control" rows="4"
                            placeholder="Deskripsi singkat penulis">{{ old('bio') }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">
                        Tambahkan Author
                    </button>
                </form>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card main-card shadow-sm p-4">
                <h5 class="fw-bold mb-3">Daftar Author</h5>

                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Biografi</th>
                                <th>Jumlah Buku</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($authors as $author)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $author->name }}</td>
                                    <td>{{ $author->email }}</td>
                                    <td>{{ $author->bio ?? '-' }}</td>
                                    <td>{{ $author->books_count }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted">
                                        Belum ada data author.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <p class="text-muted mb-0">
                    Total author: {{ $authors->count() }}
                </p>
            </div>
        </div>
    </div>
</div>
</body>
</html>
