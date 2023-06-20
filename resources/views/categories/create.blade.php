<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
</head>
<body>
<a href="/posts"><button>Назад</button></a>
<form action="{{ route('categories.store') }}" method="post">
    @csrf
    <label for="name">Name</label>
    <input type="text" maxlength="255" name="name" id="name">
    <button type="submit">Создать</button>
</form>

</body>
</html>
