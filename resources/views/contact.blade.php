@extends('app')

@section('title')
    Контакты
@endsection

@section('content')
    <!-- Page Header-->
    <header class="masthead" style="background-image: url('assets/img/contact-bg.jpg')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="page-heading">
                        <h1>Связаться</h1>
                        <span class="subheading">Остались вопросы? Напишите нам.</span>
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
                    <p>Want to get in touch? Fill out the form below to send me a message and I will get back to you as soon as possible!</p>
                    <div class="my-5">
                        // TODO: Translate errors
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">
                                    {{ $error }}
                                </div>
                            @endforeach
                        @endif
                        <form action="{{ route('offers.store') }}" method="post">
                            @csrf
                            <div class="form-floating">
                                <input class="form-control" id="name" name="name" maxlength="255" type="text" placeholder="_"/>
                                <label for="name">Имя</label>
                            </div>
                            <div class="form-floating">
                                <input class="form-control" id="email" name="email" maxlength="255" type="email" placeholder="_"/>
                                <label for="email">Email адрес</label>
                            </div>
                            <div class="form-floating">
                                <input class="form-control" id="phone" name="phone" maxlength="255" type="tel" placeholder="_"/>
                                <label for="phone">Номер телефона</label>
                            </div>
                            <div class="form-floating">
                                <textarea class="form-control" id="message" name="message" maxlength="2047" placeholder="_" style="height: 12rem" ></textarea>
                                <label for="message">Сообщение</label>
                            </div>
                            <br />
                            <!-- Submit Button-->
                            <button class="btn btn-primary text-uppercase" type="submit">Отправить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
