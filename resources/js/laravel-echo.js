import Echo from "laravel-echo";

$('meta[name=author]').prop('content');
window.Echo = new Echo({
    broadcaster: "socket.io",
    host: window.location.hostname + ":" + window.laravel_echo_port,
});
