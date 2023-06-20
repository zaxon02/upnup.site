@extends('app')

@section('title')
    Оплата
@endsection

@section('content')
    <!-- Page Header-->
    <header class="masthead" style="background-image: url('https://cdn.shazoo.ru/c576x256/516934_wKz2tdsiaB_6.jpg')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="page-heading">
                        <h1>Оплата</h1>
                        <span class="subheading">Если каждый месяц откладывать понемногу, то уже через год вы будете
                            удивлены, как мало у вас набралось.</span>
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
                    <p>Деньги не сделают вас счастливее. У меня сейчас 50 миллионов, и я так же счастлив, как и тогда,
                        когда у меня было 48 миллионов. © Арнольд Шварценеггер</p>
                    <div class="my-5">
                        <form action="https://demo.paykeeper.ru/create/" method="post">
                            @csrf
                            <input name="clientid" type="hidden" value="{{ Auth::id() }}"/>
                            <input name="user_result_callback" type="hidden" value="http://127.0.0.1:8000/paykeeper"/>
                            <div class="form-floating">
                                <input class="form-control" id="sum" name="sum" type="number" value="15000" readonly/>
                                <label for="sum">Сумма</label>
                            </div>
                            <div class="form-floating">
                                <input class="form-control" id="service_name" name="service_name" type="text" value="Подписка" readonly/>
                                <label for="service_name">Наименование услуги</label>
                            </div>
                            <div class="form-floating">
                                <input class="form-control" id="client_email" name="client_email" maxlength="255" value="{{ Auth::user()->email }}" type="email" placeholder="_"/>
                                <label for="client_email">Email</label>
                            </div>
                            <br />
                            <!-- Submit Button-->
                            <button class="btn btn-primary text-uppercase" type="submit">Оплатить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
