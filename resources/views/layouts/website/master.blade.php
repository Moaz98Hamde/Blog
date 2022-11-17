<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8" />
    <title>{{ env('APP_NAME') }} {{ isset($page) ? ' - ' . $page : '' }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

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
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/styles/style.css?v=1.0') }}" />
    <style>
        .fa {
            font-size: 20px;
        }
    </style>

    @stack('styles')

</head>

<body>
    @include('partials.preloader')
    @include('partials.website_header')

    <div class="mobile-menu-overlay"></div>

    <div class="main-container" style="padding: 80px 20px 2px 15px;">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="title">
                                <h4>
                                    @if (isset($prev))
                                        <a href="{{ $prev['route'] }}">
                                            {{ $prev['name'] }}
                                        </a>
                                        <span>></span>
                                    @endif
                                    <span style="text-decoration: underline">
                                        {{ $page ?? 'blank' }}
                                    </span>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pd-20 border-radius-4 mb-30">
                    @yield('content')
                </div>
            </div>

            <div class="footer-wrap pd-20 mb-20 card-box">
                DeskApp - Bootstrap 4 Admin Template By
                <a href="https://github.com/dropways" target="_blank">Ankit Hingarajiya</a>
            </div>
        </div>
    </div>

    <!-- js -->
    <script src="{{ asset('vendors/scripts/core.js') }}"></script>
    <script src="{{ asset('vendors/scripts/script.min.js') }}"></script>
    <script src="{{ asset('vendors/scripts/process.js') }}"></script>
    <script src="{{ asset('vendors/scripts/layout-settings.js') }}"></script>

    <script>
        window.laravel_echo_port = '{{ env('LARAVEL_ECHO_PORT') }}';
    </script>
    <script src="//{{ Request::getHost() }}:{{ env('LARAVEL_ECHO_PORT') }}/socket.io/socket.io.js"></script>
    <script src="{{ url('/js/app.js') }}" type="text/javascript"></script>

    @stack('scripts')
</body>

</html>
