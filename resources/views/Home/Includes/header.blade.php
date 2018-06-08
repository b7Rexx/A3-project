<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','A3 - All ABout Aqua')</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{URL::to('images/A3logo.png')}}"/>
    <link rel="stylesheet" href="{{URL::to('css/app.css')}}">
    <link rel="stylesheet" href="{{URL::to('home/custom.css')}}">
    @yield('css')
</head>

<body class="back-cover">
<div class="container">
    <header class="p-2">
        <div class="row">
            <div class="col-sm-8">
                <a href="#"><i class="fa fa-phone pl-3"></i> +977-987654321</a>
                <a href="#"><i class="fa fa-envelope pl-3"></i> bij.maharjan@gmail.com</a>
            </div>
            <div class="col-sm-4 text-right">
                <a href=""><i class="fa fa-facebook fa-2x pr-3"></i></a>
                <a href=""><i class="fa fa-twitter fa-2x pr-3"></i></a>
                <a href=""><i class="fa fa-youtube fa-2x pr-3"></i></a>
            </div>
        </div>
    </header>
