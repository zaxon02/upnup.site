@extends('app')

@section('title')
    Создать запись
@endsection

@section('content')
    <!-- Page Header-->
    <header class="masthead" style="background-image: url('/assets/img/contact-bg.jpg')">
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
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">
                                    {{ $error }}
                                </div>
                            @endforeach
                        @endif
                        <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-floating">
                                <input name="title" id="title" required maxlength="255" value="{{ old('title') }}"
                                       placeholder="_" class="form-control"/>
                                <label for="title">Заголовок</label>
                            </div>
                            <div class="form-floating">
                                <input name="subtitle" id="subtitle" required maxlength="255"
                                       value="{{ old('subtitle') }}" placeholder="_" class="form-control"/>
                                <label for="subtitle">Подзаголовок</label>
                            </div>
                            <div class="form-floating">
                                <select class="form-control" name="category_id" id="category_id">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <label for="category_id">Категория</label>
                            </div>
                            <div class="form-floating">
                                <input name="image" id="image" type="file" required accept="image/*" placeholder="_"
                                       class="form-control"/>
                                <label for="image">Изображение</label>
                            </div>
                            <div class="mt-3">
                                <textarea name="content" id="content">{{ old('content') }}</textarea>
                                <label for="content"></label>
                                <script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
                                <script>
                                    tinymce.init({
                                        selector: 'textarea#content',
                                        promotion: false,
                                        branding: false,
                                        language: 'ru',
                                        plugins: 'code table lists emoticons',
                                        toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
                                    });
                                </script>
                            </div>
                            <div class="form-check">
                                <input name="premium" type="hidden" value="0">
                                <input name="premium" id="premium" type="checkbox" value="1" @checked(old('premium'))
                                       class="form-check-input"/>
                                <label for="premium">Premium</label>
                            </div>
                            <br />
                            <!-- Submit Button-->
                            <button class="btn btn-primary text-uppercase" type="submit">Создать</button>
                            @can('create categories')
                                <a class="btn btn-primary text-uppercase" href="{{ route('categories.create') }}">Добавить категорию</a>
                            @endcan
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
