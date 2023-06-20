@extends('app')

@section('title')
    Изменить категорию
@endsection

@section('content')
    <!-- Page Header-->
    <header class="masthead" style="background-image: url('/storage/{{ $category->image }}')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="page-heading">
                        <h1>Изменение категории</h1>
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
                        <form action="{{ route('categories.update', $category) }}" method="post" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-floating">
                                <input class="form-control" type="text" maxlength="255" name="name" id="name" placeholder="_"
                                       value="{{ $category->name }}"/>
                                <label for="name">Название</label>
                            </div>
                            <div class="form-floating">
                                <input class="form-control" type="file" name="image" id="image" accept="image/*" placeholder="_"/>
                                <label for="image">Изображение</label>
                            </div>
                            <br />
                            <!-- Submit Button-->
                            <button class="btn btn-primary text-uppercase" type="submit">Изменить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection



{{--<!DOCTYPE html>--}}
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
{{--<head>--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1">--}}

{{--    <title>Laravel</title>--}}
{{--</head>--}}
{{--<body>--}}
{{--<a href="{{ route('posts.index') }}"><button>Назад</button></a>--}}
{{--<form action="{{ route('categories.update', $category) }}" method="post">--}}
{{--    @method('PUT')--}}
{{--    @csrf--}}
{{--    <label for="name">Name</label>--}}
{{--    <input type="text" maxlength="255" name="name" id="name">--}}
{{--    <button type="submit">Изменить</button>--}}
{{--</form>--}}

{{--</body>--}}
{{--</html>--}}
