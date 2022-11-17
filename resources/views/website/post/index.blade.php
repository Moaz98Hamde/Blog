@extends('layouts.website.master', ['page' => 'Feed'])

@push('styles')
    <link rel="stylesheet" href="{{ asset('vendors/styles/pulse-spinner.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/styles/sweetalert2.css') }}">
    <style>
        .new-post {
            box-shadow: 0 0 12px 3px #92b3fb !important;
        }

        .blog-by {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 220px;
        }

        .blog-title,
        .blog-content {
            text-overflow: ellipsis;
            width: 100%;
            white-space: nowrap;
            overflow: hidden;
        }
    </style>
@endpush

@section('content')
    <div class="blog-wrap">
        <div class="container pd-0">
            <div class="row">
                <div class="col-md-12 col-sm-12 mb-20">
                    <div class="pd-20 card-box height-100-p">
                        <h5 class="h4">Be creative 🔥 ..</h5>
                        <x-blog-form />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 col-sm-12">
                    <div class="blog-list">
                        <ul>
                            <div class="scrolling-pagination">
                            </div>
                            <div class="spinner">
                                <div class="main-container">
                                    <div class="load-container">
                                        <div class="linespinner"></div>
                                    </div>
                                </div>
                            </div>
                        </ul>
                    </div>
                    <div id="myResultsDiv"></div>
                </div>
                <x-online-users-list />
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript" src="{{ asset('vendors/scripts/jquery.form.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/scripts/sweetalert2.all.js') }}""></script>
    <script type="text/javascript" src="{{ asset('vendors/scripts/sweet-alert.init.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/infinte-scroll.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/add-post.js') }}"></script>

    <script src="http://127.0.0.1:6001/socket.io/socket.io.js"></script>
    <script>
        var socket = io.connect('http://127.0.0.1:6001');

        // socket.on("connect", (socket) => {
        //     console.log('connected'); // x8WIv7-mJelg7on_ALbx
        // });
        socket.on("new.post", () => { console.log('post added'); });
        // Echo.channel('posts')
        //     .listen('.new.post', (e) => {
        //         console.log(e);
        //     })
    </script>
@endpush
