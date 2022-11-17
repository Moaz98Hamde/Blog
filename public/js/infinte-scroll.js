let page = 0, lastPage = 0, currentPage = 0;

$(window).scroll(function () {
    // if ($(window).scrollTop() + $(window).height() == $(document).height()) {
        var ctr = document.querySelector(".main-container");
    if (
        $(window).innerHeight() + $(window).scrollTop() >=
        $(".main-container").height()
    ) {
        // Ajax call
        page++;
        getData(page);
    }
});

function getData() {
    if (currentPage <= lastPage) {
        $.ajax({
            url: "/ajax-posts?page=" + page,
            type: "get",
            beforeSend: function () {
                $(".spinner").show();
            },
            success: function (data) {
                $(".spinner").hide();
            },
        })
            .done(processData)
            .fail(function (jqXHR, ajaxOptions, thrownError) {
                alert("server not responding...");
            });
    }
}

function processData(data) {
    if (data) {
        if (!lastPage || !currentPage) {
            lastPage = data.last_page;
            currentPage = data.current_page;
        } else {
            ++currentPage;
        }
        renderData(data);
    }
}

function renderData(response) {
    response.data.forEach(function (item) {
        $template = `<li id=post-"${item.id}">
                        <div class="row no-gutters">
                            <div class="col-lg-4 col-md-12 col-sm-12">
                                <div class="blog-img" style="background: url(${item.thumbnail}) center center no-repeat;">
                                    <img src="${item.thumbnail}" alt="" class="bg_img" style="display: none;">
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-12 col-sm-12">
                                <div class="blog-caption">
                                    <h4>
                                        <a class="blog-title"
                                        href="/post/${item.id}">${item.title}</a>
                                    </h4>
                                    <div class="blog-by">
                                        <p class="blog-content">
                                        ${item.content}
                                        </p>
                                        <div class="pt-10 d-flex justify-content-between align-items-center">
                                            <a href="/post/${item.id}" class="btn btn-outline-primary">Read More</a>
                                            <div>
                                            <span>${item.comments_count}</span>
                                            <i class="icon-copy fa fa-comments" aria-hidden="true"></i>
                                            <span>${item.likes_count}</span>
                                            <i class="icon-copy fa fa-heart text-danger" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>`;
        $(".scrolling-pagination").append($template);
    });
}
