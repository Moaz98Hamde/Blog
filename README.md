<p style="display:flex;align-items:center;justify-content:center;">
<span align="center">
<a href="https://laravel.com" target="_blank">
<img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
</a>
</span>
<span align="center">
<a href="https://jquery.com" target="_blank">
<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/fd/JQuery-Logo.svg/2560px-JQuery-Logo.svg.png" width="400" alt="Laravel Logo">
</a>
</span>
</p>
<p style="display:flex;align-items:center;justify-content:center;">
<span align="center">
<a href="https://redis.io/" target="_blank">
<img src="https://www.logo.wine/a/logo/Redis/Redis-Logo.wine.svg" width="400" alt="Laravel Logo">
</a>
</span>
<span align="center">
<a href="https://socket.io/" target="_blank">
<img src="https://adityakulkarni.com/wp-content/uploads/2022/09/logo-1.png" width="400" alt="Laravel Logo">
</a>
</span>
</p>

# Blog App 🧾📰

## Overview

Blog App is a blogging web application that is built using [Laravel Framework](https://laravel.com), [JQuery](https://jquery.com) , [Redis](https://redis.io/) and [Socket.io](https://socket.io) 

### Features 

-   User authentication 
-   User can publish new post "uses JQuery Form AJAX plugin"
-   User can comment on a post "uses JQuery Form AJAX plugin"
-   User can like a post "uses JQuery Form AJAX plugin"
-   Posts are loaded on scrolling "infinite scroll" using custom JS script
-   User should receive realtime notification when any other participant publish new post
-   User should receive realtime notification when any other participant comments on their post
-   User should be able to see online users statuses in realtime


## Requirements

-   node, npm, redis, PHP 8.1, laravel 9.x


## Installation & setup

Install laravel-echo-server package
> $ npm install -g laravel-echo-server

Install composer packages , migrate and seed database
> $ composer update && php artisan migrate --seed

Run Redis server
> $ redis-server

Serve your laravel application
> $ php artisan ser

Start laravel-echo server
> $ laravel-echo-server start


