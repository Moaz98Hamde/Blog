(function () {
    $("form").on("submit", function (e) {
        e.preventDefault(); // prevent native submit
        $(this).ajaxSubmit({
            success: function (data) {
                renderPost(data);
                $(":input").not(":button, :submit, :hidden").val("");
                $("textarea").data("wysihtml5").editor.clear();
            },
            error: function (data) {
                var message = data.responseJSON.message;
                swal({
                    type: "error",
                    title: "Oops...",
                    text: message,
                });
            },
        });
    });

    function renderPost(post) {
        $template = `<li id=post-${post.id} class="new-post">
                        <div class="row no-gutters">
                            <div class="col-lg-4 col-md-12 col-sm-12">
                                <div class="blog-img" style="background: url(${post.thumbnail}) center center no-repeat;">
                                    <img src="${post.thumbnail}" alt="" class="bg_img" style="display: none;">
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-12 col-sm-12">
                                <div class="blog-caption">
                                    <h4 style="line-height: 1.2em;height: 3.6em;overflow: hidden;">
                                        <a class="blog-title" href="/post/${post.id}">${post.title}</a>
                                    </h4>
                                    <div class="blog-by">
                                        <p class="blog-content">
                                        ${post.content}
                                        </p>
                                        <div class="pt-10 d-flex justify-content-between align-posts-center">
                                            <a href="/post/${post.id}" class="btn btn-outline-primary">Read More</a>
                                            <div>
                                            <span>${post.comments_count}</span>
                                            <i class="icon-copy fa fa-comments" aria-hidden="true"></i>
                                            <span>${post.likes_count}</span>
                                            <i class="icon-copy fa fa-heart text-danger" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>`;
        $(".scrolling-pagination").prepend($template).fadeIn(6000);
    }
})();
