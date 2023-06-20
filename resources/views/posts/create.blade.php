@extends('app')

@section('title')
    Создать
@endsection

@section('content')
    <!-- Page Header-->
    <header class="masthead" style="background-image: url('assets/img/contact-bg.jpg')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="page-heading">
                        <h1>Создание поста</h1>
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
                        <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-floating">
                                <input class="form-control" type="text" maxlength="255" name="title" id="title" placeholder="_"/>
                                <label for="title">Заголовок</label>
                            </div>
                            <div class="form-floating">
                                <input class="form-control" type="text" maxlength="255" name="subtitle" id="subtitle" placeholder="_"/>
                                <label for="subtitle">Подзаголовок</label>
                            </div>
                            <div class="form-floating">
                                <select class="form-control" name="category" id="category">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <label for="category">Категория</label>
                            </div>
                            <div class="form-floating">
                                <textarea class="form-control" id="content" name="content" placeholder="_" style="height: 12rem"></textarea>
                                <label for="content">Содержание</label>
                            </div>
                            <div class="form-floating">
                                <input class="form-control" type="file" name="image" id="image" accept="image/*" placeholder="_"/>
                                <label for="image">Изображение</label>
                            </div>
                            <br />
                            <!-- Submit Button-->
                            <button class="btn btn-primary text-uppercase" type="submit">Создать</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
