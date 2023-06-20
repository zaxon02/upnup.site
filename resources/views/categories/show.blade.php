@extends('app')

@section('title')
    {{ $category->name }}
@endsection

@section('content')
    <!-- Page Header-->
    <header class="masthead" style="background-image: url('/storage/{{ $category->image }}')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1>{{ $category->name }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main Content-->
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                @foreach ($posts as $post)
                    <!-- Post preview-->
                    <div class="post-preview">
                        <a href="{{ route('posts.show', $post) }}">
                            <h2 class="post-title">{{ $post->title }}</h2>
                            <h3 class="post-subtitle">{{ $post->subtitle }}</h3>
                        </a>
                        <p class="post-meta">
                            <a href="{{ route('categories.show', $post->category) }}">{{ $post->category->name }}</a>,
                            {{ $post->created_at->isoFormat('DD.MM.YYYY') }}
                        </p>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />
                @endforeach
                <!-- Pager-->
                @can(['update categories', 'delete categories'])
                    <div class="d-flex justify-content-between mb-4 gap-3 align-items-center">
                        {{ $posts->onEachSide(1)->links() }}
                        <div class="d-flex gap-3">
                            <a href="{{ route('categories.edit', $category) }}">
                                <button class="btn btn-outline-primary text-uppercase">Изменить</button>
                            </a>
                            <form action="{{ route('categories.destroy', $category) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-outline-primary text-uppercase">Удалить</button>
                            </form>
                        </div>
                    </div>
                @else
                    <div class="d-flex justify-content-center mb-4 gap-3 align-items-center">
                        {{ $posts->onEachSide(1)->links() }}
                    </div>
                @endcan
            </div>
        </div>
    </div>
@endsection
