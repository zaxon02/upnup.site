<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
</head>
<body>
<a href="{{ route('posts.index') }}"><button>Назад</button></a>
<form action="/posts/{{$post->id}}" method="post">
    @method('PUT')
    @csrf
    <label for="title">Title</label>
    <input type="text" maxlength="255" name="title" id="title" value="{{ $post->title }}">
    <label for="content">Content</label>
    <input type="text" name="content" id="content" value="{{ $post->content }}">
    <label for="category">Категория:</label>
    <select name="category" id="category">
        @foreach($categories as $category)
            @if($category->id==$post->category_id)
                <option value="{{$category->id}}" selected>{{ $category->name }}</option>
            @else
                <option value="{{$category->id}}">{{ $category->name }}</option>
            @endif
        @endforeach
    </select>
    <button type="submit">Изменить</button>
</form>

</body>
</html>
