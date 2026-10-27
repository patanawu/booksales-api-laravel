
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Penulis</title>
</head>
<body>
    <h1>Daftar Penulis</h1>

    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Penulis</th>
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
                    <td>{{ $author->books->count() }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Belum ada data penulis.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <p><a href="{{ route('books.index') }}">Lihat daftar buku</a></p>
</body>
</html>
