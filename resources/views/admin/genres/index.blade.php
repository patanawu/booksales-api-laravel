
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kelola Genre - BookSales</title>
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

        .btn-primary:hover {
            background: #286daf;
        }

        .page-title {
            color: #174a78;
        }
    </style>
</head>

<body>
<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold page-title">Kelola Genre</h2>
            <p class="text-muted">Daftar dan tambah genre buku.</p>
        </div>

        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-primary">
            Kembali ke Dashboard
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <div class="row g-4">

        <!-- Form Tambah Genre -->
        <div class="col-lg-4">
            <div class="card main-card shadow-sm p-4">
                <h5 class="fw-bold mb-3">Tambah Genre</h5>

                <form action="{{ route('admin.genres.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Nama Genre</label>

                        <input
                            type="text"
                            name="name"
                            class="form-control"
                            placeholder="Contoh: Fantasy"
                            value="{{ old('name') }}"
                            required
                        >
                    </div>

                    <button type="submit" class="btn btn-primary w-100">
                        Tambahkan Genre
                    </button>
                </form>
            </div>
        </div>

        <!-- Tabel Daftar Genre -->
        <div class="col-lg-8">
            <div class="card main-card shadow-sm p-4">
                <h5 class="fw-bold mb-3">Daftar Genre</h5>

                <div class="table-responsive">
                    <table class="table table-hover align-middle">

                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Nama Genre</th>
                                <th>ID</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($genres as $genre)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $genre->name }}</td>
                                    <td>{{ $genre->id }}</td>

                                    <td>
                                        <div class="d-flex gap-2">

                                            <!-- Tombol Edit -->
                                            <button
                                                type="button"
                                                class="btn btn-warning btn-sm"
                                                data-bs-toggle="modal"
                                                data-bs-target="#editGenre{{ $genre->id }}">
                                                Edit
                                            </button>

                                            <!-- Tombol Hapus -->
                                            <form
                                                action="{{ route('admin.genres.destroy', $genre->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus genre ini?')">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    Hapus
                                                </button>
                                            </form>

                                        </div>
                                    </td>
                                </tr>

                                <!-- Modal Edit Genre -->
                                <div class="modal fade" id="editGenre{{ $genre->id }}" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <form
                                                action="{{ route('admin.genres.update', $genre->id) }}"
                                                method="POST">

                                                @csrf
                                                @method('PUT')

                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Genre</h5>

                                                    <button
                                                        type="button"
                                                        class="btn-close"
                                                        data-bs-dismiss="modal">
                                                    </button>
                                                </div>

                                                <div class="modal-body">
                                                    <label class="form-label">Nama Genre</label>

                                                    <input
                                                        type="text"
                                                        name="name"
                                                        class="form-control"
                                                        value="{{ $genre->name }}"
                                                        required>
                                                </div>

                                                <div class="modal-footer">
                                                    <button
                                                        type="button"
                                                        class="btn btn-secondary"
                                                        data-bs-dismiss="modal">
                                                        Batal
                                                    </button>

                                                    <button type="submit" class="btn btn-primary">
                                                        Simpan Perubahan
                                                    </button>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>

                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted">
                                        Belum ada data genre.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>

                <p class="text-muted mb-0">
                    Total genre: {{ $genres->count() }}
                </p>
            </div>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
