@extends('app')

@section('title')
    Создать категорию
@endsection

@section('content')
    <!-- Page Header-->
    <header class="masthead" style="background-image: url('assets/img/contact-bg.jpg')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="page-heading">
                        <h1>Создание категории</h1>
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
                        <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-floating">
                                <input class="form-control" type="text" maxlength="255" name="name" id="name" placeholder="_"/>
                                <label for="name">Название</label>
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
