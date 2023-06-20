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
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">
                                    {{ $error }}
                                </div>
                            @endforeach
                        @endif
                        <form action="{{ route('categories.update', $category) }}" method="post" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-floating">
                                <input name="name" id="name" required maxlength="255"
                                       value="{{ old('name', $category->name) }}" placeholder="_" class="form-control"/>
                                <label for="name">Название</label>
                            </div>
                            <div class="form-floating">
                                <input name="image" id="image" type="file" required accept="image/*" placeholder="_"
                                       class="form-control"/>
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
