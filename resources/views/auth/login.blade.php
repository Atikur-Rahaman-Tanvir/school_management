<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Smarthr - Bootstrap Admin Template">
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Login - HRMS admin template</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets')}}/img/favicon.png">

    <link rel="stylesheet" href="{{asset('assets')}}/css/bootstrap.min.css">

    <link rel="stylesheet" href="{{asset('assets')}}/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{asset('assets')}}/css/style.css">

    <!--[if lt IE 9]>
   <script src="{{asset('assets')}}/js/html5shiv.min.js"></script>
   <script src="{{asset('assets')}}/js/respond.min.js"></script>
  <![endif]-->
</head>

<body class="account-page">

    <div class="main-wrapper">
        <div class="account-content">
            <div class="container">

                <div class="account-logo">
                    <a ><img src="{{asset('assets')}}/img/logo.png" alt="Dreamguy's Technologies"></a>
                </div>

                <div class="account-box">
                    <div class="account-wrapper">
                        <h3 class="account-title">Login</h3>
                        <p class="account-subtitle">Access to our dashboard</p>

                         <form method="POST" action="{{ route('login') }}">
                        @csrf
                            <div class="form-group">
                                <label>Email Address</label>
                                <input class="form-control" type="email" name="email" value="{{old('email')}}">
                                      @error('email')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label>Password</label>
                                    </div>
                                    <div class="col-auto">
                                        <a class="text-muted" href="{{ route('password.request') }}">
                                            Forgot password?
                                        </a>
                                    </div>
                                </div>
                                <div class="position-relative">
                                    <input class="form-control" name="password" type="password"  id="password">
                                    @error('password')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-primary account-btn" type="submit">Login</button>
                            </div>
                            <div class="account-footer">

                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    {{-- <script src="{{asset('assets')}}/js/bootstrap.bundle.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>

    <script src="{{asset('assets')}}/js/app.js"></script>
</body>

</html>
