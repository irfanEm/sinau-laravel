<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $judul }}</title>
</head>
<body>
    <div class="container">
        <form action="/form" method="post">
            <label for="nama">Nama : </label>
            <input type="text" name="nama" id="nama" class="nama">
            <button type="submit">Hai</button>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
    </div>
</body>
</html>