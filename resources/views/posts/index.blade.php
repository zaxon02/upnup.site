@extends('app')

@section('title')
    Все записи
@endsection

@section('content')
    <!-- Page Header-->
    <header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1>Clean Blog</h1>
                        <span class="subheading">A Blog Theme by Start Bootstrap</span>
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
                @guest
                    <div class="d-flex justify-content-center mb-4 gap-3 align-items-center">
                        {{ $posts->onEachSide(1)->links() }}
                    </div>
                @endguest
                @auth
                    <div class="d-flex justify-content-between mb-4 gap-3 align-items-center">
                        {{ $posts->onEachSide(1)->links() }}
                        <a href="{{ route('posts.create') }}">
                            <button class="btn btn-outline-primary text-uppercase">Создать</button>
                        </a>
                    </div>
                @endauth
            </div>
        </div>
    </div>
@endsection
