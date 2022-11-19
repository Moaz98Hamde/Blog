$("#notification-button").on("click", function () {
    $("#notification-active").css("display", "none");
});

window.Echo.private("new-post-channel").listen(".NewPostAdded", (data) => {
    notify(data);
});

window.Echo.private("new-comment-channel." + window.current_user_id).listen(
    ".NewCommentAdded",
    (data) => {
        notify(data);
    }
);

window.Echo.join("online-users-channel")
    .here((users) => {
        users.forEach(function (user) {
            user.id != window.current_user_id ? addOnlineUser(user) : null;
        });
    })
    .joining((user) => {
        addOnlineUser(user);
    })
    .leaving((user) => {
        $(`#user-${user.id}`).remove();
    })
    .error((error) => {
        console.error(error);
    });

function notify(data) {
    $("#notification-active").css("display", "inline");
    $("#notifications").prepend(`
                <ul id="notifications">
									<li>
										<a href="/post/${data.postId}">
											<img src="/vendors/images/img.jpg" alt="" />
											<h5> New post added by ${data.user}</h3>
											<p>
										    	${data.post}
											</p>
										</a>
									</li>`);
}

function addOnlineUser(user) {
    $("#online-users").append(`
                        <p id="user-${user.id}" class="list-group-item d-flex align-items-center justify-content-center">
                            <span class="user-icon shadow mx-2">
                                <img src="/vendors/images/photo1.jpg" width="40" height="40">
                            </span>
                            ${user.name}
                        </p>`);
}
