    @props(['comment'])

    <div class="alert alert-light shadow-sm d-flex justify-content-start align-items-baseline" role="alert">
        <div>
            <img src="{{ asset('vendors/images/img.jpg') }}" alt="">
        </div>
        <div class="ml-2 w-100">
            <strong>{{$comment->user->name}}</strong>
            <p>
               {{$comment->content}}
            </p>
            <p class="text-right">
                <small>{{$comment->created_at->diffForHumans()}}</small>
            </p>
        </div>
    </div>
