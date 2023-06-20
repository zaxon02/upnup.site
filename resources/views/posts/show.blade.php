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
    <!-- Post Content-->
    <article class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    {!! $post->content !!}
                </div>
            </div>
        </div>
    </article>
    <!-- Post Actions-->
    @can(['delete posts', 'update posts'])
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7 d-flex justify-content-end mb-4 gap-3">
                    <a href="{{ route('posts.edit', $post) }}">
                        <button class="btn btn-outline-primary text-uppercase">Изменить</button>
                    </a>
                    <form action="{{ route('posts.destroy', $post) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-outline-primary text-uppercase">Удалить</button>
                    </form>
                </div>
            </div>
        </div>
    @endcan
@endsection
