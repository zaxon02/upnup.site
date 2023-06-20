<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
</head>
<body>
<a href="/posts"><button>Назад</button></a>
<form action="/posts/{{$post->id}}" method="post">
    @method('PUT')
    @csrf
    <label for="title">Title</label>
    <input type="text" maxlength="255" name="title" id="title" value="{{ $post->title }}">
    <label for="content">Content</label>
    <input type="text" name="content" id="content" value="{{ $post->content }}">
    <button type="submit">Изменить</button>
</form>

</body>
</html>
