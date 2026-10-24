
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Author</title>
</head>
<body>
    <h1>Daftar Author</h1>

    <ul>
        @foreach ($authors as $author)
            <li>{{ $author['name'] }}</li>
        @endforeach
    </ul>
</body>
</html>
