<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8" />
    <title>{{ env('APP_NAME') }} - Register</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('vendors/images/apple-touch-icon.png') }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('vendors/images/favicon-32x32.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('vendors/images/favicon-16x16.png') }}" />

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/core.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/icon-font.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('src/plugins/jquery-steps/jquery.steps.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/style.css') }}" />
</head>

<body class="login-page">
    <div class="login-header box-shadow">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="brand-logo">

            </div>
            <div class="login-menu">
                <ul>
                    <li><a href="{{ route('login.create') }}">Login</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="register-page-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-7">
                    <img src="{{ asset('vendors/images/register-page-img.png') }}" alt="" />
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="register-box bg-white box-shadow border-radius-10">
                        <div class="wizard-content">
                            <div class="login-title pt-4">
                                <h3 class="text-center text-primary">Register</h3>
                            </div>
                            <form action="{{ route('register.store') }}" method="POST">
                                @csrf
                                <div class="form-wrap max-width-600 mx-auto px-5 pt-5">
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Email Address*</label>
                                        <div class="col-sm-8">
                                            <input type="email"
                                                class="form-control @error('email') form-control-danger @enderror"
                                                name="email" value="{{ old('email') }}" />
                                            @error('email')
                                                <small class="text-danger">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Name*</label>
                                        <div class="col-sm-8">
                                            <input type="text"
                                                class="form-control @error('name') form-control-danger @enderror"
                                                name="name" value="{{ old('name') }}" />
                                            @error('name')
                                                <small class="text-danger">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Password*</label>
                                        <div class="col-sm-8">
                                            <input type="password"
                                                class="form-control @error('password') form-control-danger @enderror"
                                                name="password" />
                                            @error('password')
                                                <small class="text-danger">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Confirm Password*</label>
                                        <div class="col-sm-8">
                                            <input type="password"
                                                class="form-control @error('password_confirmation') form-control-danger @enderror"
                                                name="password_confirmation" />
                                            @error('password_confirmation')
                                                <small class="text-danger">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="m-3 p-3">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">Sign In</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- js -->
    <script src="{{ asset('vendors/scripts/core.js') }}"></script>
    <script src="{{ asset('vendors/scripts/script.min.js') }}"></script>
    <script src="{{ asset('vendors/scripts/process.js') }}"></script>
    <script src="{{ asset('vendors/scripts/layout-settings.js') }}"></script>
    <script src="{{ asset('src/plugins/jquery-steps/jquery.steps.js') }}"></script>
    <script src="{{ asset('vendors/scripts/steps-setting.js') }}"></script>
</body>

</html>
