<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
</head>
<body>


<h1>{{ $category->name }}</h1>


<a href="/posts/create"><button>Создать</button></a>

@foreach ($posts as $post)
    <p>This is post {{ $post->title}} <br> {{ $post->content }}</p>
    <p>Категория: {{ $post->category->name }}</p>

    <div style="display: flex">
        <form action="/posts/{{ $post->id }}" method="post">
            @method('DELETE')
            @csrf
            <button type="submit">Удалить</button>
        </form>

        <a href="/posts/{{$post->id}}/edit">
            <button type="submit">Изменить</button>
        </a>
    </div>
@endforeach

</body>
</html>
