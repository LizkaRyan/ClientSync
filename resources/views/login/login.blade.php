<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicon icon -->
    <link href="{{ asset('css/login-register-lock.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.toast.css') }}" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon.png') }}">

    <title>CRM Laravel</title>

    <!-- page css -->
    <link href="{{ asset('css/login-register-lock.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('css/style.min.css') }}" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<!-- Preloader -->
<div class="preloader">
    <div class="loader">
        <div class="loader__figure"></div>
        <p class="loader__label">Elite admin</p>
    </div>
</div>

<!-- Main wrapper -->
<section id="wrapper" class="login-register login-sidebar"
         style="background-image: url('{{ asset('images/login-register.jpg') }}');">

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="login-box card">
        <div class="card-body">
            @if(session('message'))
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                    <h3 class="text-danger"><i class="fa fa-exclamation-circle"></i>
                        {{ session('message')  }}
                    </h3>

                    @if(session('error'))
                        <span>{{ session('error') }}</span>
                    @endif
                </div>
            @endif

            <form class="form-horizontal form-material text-center" id="loginform" method="POST"
                  action="{{ route('login.launch') }}">
                @csrf

                <a href="javascript:void(0)" class="db">
                    <img src="{{ asset('images/logo-icon.png') }}" alt="Home"><br>
                    <img src="{{ asset('images/logo-text.png') }}" alt="Home">
                </a>

                <div class="form-group m-t-40">
                    <div class="col-xs-12">
                        <input type="text"
                               class="form-control @error('password') is-invalid @enderror"
                               name="username"
                               value="{{ old('username') }}"
                               required
                               placeholder="Enter username">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <input type="password"
                               class="form-control @error('password') is-invalid @enderror"
                               name="password"
                               required
                               placeholder="Enter password">
                    </div>
                </div>

                <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                        <button class="btn btn-info btn-lg btn-block text-uppercase btn-rounded" type="submit">Log In
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- Scripts -->
<script src="{{ asset('js/library/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/library/popper.min.js') }}"></script>
<script src="{{ asset('js/library/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
<script src="{{ asset('js/library/jquery.toast.js') }}"></script>
<script src="{{ asset('js/library/toastr.js') }}"></script>
</body>
</html>
