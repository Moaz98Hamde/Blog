@extends('layouts.website.master', ['prev' => ['name' => 'Feed', 'route' => '/'],'page' => $post->title])
@push('styles')
    <link rel="stylesheet" href="{{ asset('vendors/styles/sweetalert2.css') }}">
    <style>
        .btn-like:hover {
            color: #dc3545 !important;
        }

        .new-comment {
            box-shadow: 0 0 12px 3px #92b3fb8e !important;
        }
    </style>
@endpush
@section('content')
    <div class="blog-wrap">
        <div class="container pd-0">
            <div class="row">
                <div class="col-md-8 col-sm-12">
                    <div class="blog-detail card-box overflow-hidden mb-30">
                        <div class="blog-img text-center m-3 rounded">
                            <img src="{{ url($post->thumbnail) }}" alt="">
                        </div>
                        <div class="blog-caption">
                            {!! $post->content !!}
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="m-4">
                                <form id="likeForm" action="{{ route('like.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="post" value="{{ $post->id }}">
                                    <label for="likeCheck" class="btn" type="submit">
                                        <i class="btn-like icon-copy fa {{ $post->likes->contains('user_id', auth()->id()) ? 'fa-heart' : 'fa-heart-o' }}"
                                            style="font-size: 30px" aria-hidden="true"></i>
                                    </label>
                                    <input type="checkbox" name="liked" id="likeCheck" hidden
                                        @if ($post->likes->contains('user_id', auth()->id())) checked @endif>
                                </form>
                            </div>
                            <div class="m-4 text-right">
                                <span id="commentsCount">{{ $post->comments_count }}</span>
                                <i class="icon-copy fa fa-comments" aria-hidden="true"></i>
                                <span id="likesCount">{{ $post->likes_count }}</span>
                                <i class="icon-copy fa fa-heart text-danger" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <x-online-users-list />
            </div>
            <div class="row">
                <div class="col-md-8 col-sm-12 mb-30">
                    <div class="card card-box">
                        <div class="card-body">
                            <h5 class="card-title">Comments</h5>
                            <div class="comments">
                                @foreach ($post->comments as $comment)
                                    <x-comment :comment="$comment" />
                                @endforeach
                            </div>
                            <form id="commentForm" action="{{ route('comment.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="hidden" name="post" value="{{ $post->id }}">
                                    <input name="content" class="form-control" type="text" placeholder="Write something">
                                </div>
                                <button type="submit" class="btn btn-primary">Add comment</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript" src="{{ asset('vendors/scripts/jquery.form.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendors/scripts/sweetalert2.all.js') }}""></script>
    <script type="text/javascript" src="{{ asset('vendors/scripts/sweet-alert.init.js') }}"></script>
    <script>
        $('#likeCheck').on("change", function(e) {
            $(this).val($(this).is(':checked'));
            $("#likeForm").ajaxSubmit({
                success: function(data) {
                    data.like ? $('.btn-like').toggleClass("fa-heart fa-heart-o") : $('.btn-like')
                        .toggleClass("fa-heart-o fa-heart");
                    $('#likesCount').text(data.postLikesCount);
                },
                error: function(data) {
                    var message = data.responseJSON.message;
                    swal({
                        type: "error",
                        title: "Oops...",
                        text: message,
                    });
                },
            });
        });;
        $("#commentForm").on("submit", function(e) {
            e.preventDefault(); // prevent native submit
            $(this).ajaxSubmit({
                success: function(data) {
                    renderComment(data.comment);
                    $('#commentsCount').text(data.postCommentsCount);
                    $(":input").not(":button, :submit, :hidden").val("");
                },
                error: function(data) {
                    var message = data.responseJSON.message;
                    swal({
                        type: "error",
                        title: "Oops...",
                        text: message,
                    });
                },
            });
        });

        function renderComment(comment) {
            $template = `<div class="new-comment alert alert-light shadow-sm d-flex justify-content-start align-items-baseline" role="alert">
        <div>
            <img src="/vendors/images/img.jpg" alt="">
        </div>
        <div class="ml-2 w-100">
            <strong>${comment.username}</strong>
            <p>
               ${comment.content}
            </p>
            <p class="text-right">
                <small>${comment.time}</small>
            </p>
        </div>
    </div>
`;
            $(".comments").prepend($template).fadeIn(6000);
        }
    </script>
@endpush
