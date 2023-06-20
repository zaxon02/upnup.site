<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>{{ config('app.name') }} - Зарегистрироваться</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <!-- Register theme CSS -->
    <link href="/css/login.css" rel="stylesheet" />
</head>
<body>
<div class="container-fluid ps-md-0">
    <div class="row g-0">
        <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
        <div class="col-md-8 col-lg-6">
            <div class="login d-flex align-items-center py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 col-lg-8 mx-auto">
                            <h3 class="login-heading mb-4">Добро пожаловать!</h3>

                            <!-- Sign Up Form -->
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger">
                                        {{ $error }}
                                    </div>
                                @endforeach
                            @endif
                            <form action="{{ route('register') }}" method="post">
                                @csrf
                                <div class="form-floating mb-3">
                                    <input name="name" id="name" required maxlength="255" placeholder="_"
                                           class="form-control">
                                    <label for="name">Имя</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input name="email" id="email" type="email" required maxlength="255"
                                           placeholder="_" class="form-control">
                                    <label for="email">Email</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input name="password" id="password" type="password" required minlength="8"
                                           placeholder="_" class="form-control">
                                    <label for="password">Пароль</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input name="password_confirmation" id="password_confirmation" type="password"
                                           required minlength="8" class="form-control" placeholder="_">
                                    <label for="password_confirmation">Подтверждение пароля</label>
                                </div>

                                <div class="d-grid">
                                    <button class="btn btn-lg btn-primary btn-login text-uppercase fw-bold mb-2" type="submit">Зарегистрироваться</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
