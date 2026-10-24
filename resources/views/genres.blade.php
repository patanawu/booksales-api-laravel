
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Genre</title>
</head>
<body>
    <h1>Daftar Genre</h1>

    <ul>
        @foreach ($genres as $genre)
            <li>{{ $genre['name'] }}</li>
        @endforeach
    </ul>
</body>
</html>
