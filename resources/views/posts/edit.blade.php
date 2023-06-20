@extends('app')

@section('title')
    {{ $post->title }}
@endsection

@section('content')
    <!-- Page Header-->
    <header class="masthead" style="background-image: url('/storage/{{ $post->image }}')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="post-heading">
                        <h1>{{ $post->title }}</h1>
                        <h2 class="subheading">{{ $post->subtitle }}</h2>
                        <span class="meta">
                            <a href="{{ route('categories.show', $post->category) }}">{{ $post->category->name }}</a>,
                            {{ $post->created_at->isoFormat('DD.MM.YYYY') }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main Content-->
    <main class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="my-5">
                        <form action="{{ route('posts.update', $post) }}" method="post" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-floating">
                                <input class="form-control" type="text" maxlength="255" name="title" id="title" placeholder="_"
                                       value="{{ $post->title }}"/>
                                <label for="title">Заголовок</label>
                            </div>
                            <div class="form-floating">
                                <input class="form-control" type="text" maxlength="255" name="subtitle" id="subtitle" placeholder="_"
                                       value="{{ $post->subtitle }}"/>
                                <label for="subtitle">Подзаголовок</label>
                            </div>
                            <div class="form-floating">
                                <select class="form-control" name="category" id="category">
                                    @foreach($categories as $category)
                                        @if($category->id==$post->category_id)
                                            <option value="{{$category->id}}" selected>{{ $category->name }}</option>
                                        @else
                                            <option value="{{$category->id}}">{{ $category->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <label for="category">Категория</label>
                            </div>
                            <div class="form-floating">
                                <textarea class="form-control" id="content" name="content" placeholder="_" style="height: 12rem">{{ $post->content }}</textarea>
                                <label for="content">Содержание</label>
                            </div>
                            <div class="form-floating">
                                <input class="form-control" type="file" name="image" id="image" accept="image/*" placeholder="_"/>
                                <label for="image">Изображение</label>
                            </div>
                            <br />
                            <!-- Submit Button-->
                            <button class="btn btn-primary text-uppercase" type="submit">Сохранить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
