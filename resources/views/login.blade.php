<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/sidebar.css')}}" rel="stylesheet">

    <!-- Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- Bootstrap Icon-->
</head>
<body>
    <div class="container-sm mt-5 p-5">
        <form action="{{route('login')}}" method="post">
            {{ csrf_field() }}
            <div class="row justify-content-center">
                <div class="p-5 bg-danger rounded-3 col-xl-4 shadow-lg">
                    <div class="mb-5 text-center">

                        <h4 class="text-light" >WELCOME TO COSTELA WEBSITE!</h4>
                    </div>

                    <hr>

                    <div class="col mb-3">
                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" autofocus placeholder="Enter Your username">
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                            @enderror
                    </div>

                    <div class="col mb-3">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="current-password" placeholder="Enter Your Password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <small>{{ $message }}</small>
                                    </span>
                                @enderror
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col d-grid">
                            <button type="submit" class="btn btn-dark btn-lg mt-3">
                                <i class="bi-box-arrow-in-right me-2"></i> Login
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

</body>
</html>
