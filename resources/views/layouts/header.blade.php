<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Тестовое задание 636004</title>
    <link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet" media="all" />
    <!--theme-style-->
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet" media="all" />
    <!--//theme-style-->
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!--fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
    <!--//fonts-->
    <script src="{{ asset('/js/jquery.min.js') }}"></script>
    @if(ends_with(Route::currentRouteAction(), 'ProductsController@index'))
        <link rel="stylesheet" href="{{ asset('/css/etalage.css') }}" type="text/css" media="all" />
        <script src="{{ asset('/js/jquery.etalage.min.js') }}"></script>
        <script>
            jQuery(document).ready(function($){

                $('#etalage').etalage({
                    thumb_image_width: 300,
                    thumb_image_height: 400,
                    source_image_width: 900,
                    source_image_height: 1200,
                    show_hint: true,
                    click_callback: function(image_anchor, instance_id){
                        alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
                    }
                });

            });
        </script>
        @endif
    <!--script-->
</head>
<body>
<!--header-->
<div class="bottom-header">
    <div class="container">
        <div class="header-bottom-left">
            <div class="logo">
                <a href="{{ url('/') }}"><img src="/images/logo.png" alt="Тестовое задание 636004" /></a>
            </div>
            <div class="search">
                <form action="search" method="get">
                <input type="text" name="query" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" >
                <input type="submit" value="ПОИСК">
                </form>
            </div>
            <div class="clearfix"> </div>
        </div>
        <!-- Authentication Links -->
        <div class="header-bottom-right">

        @if (Auth::guest())
        <ul class="login">
            <li><a href="{{ route('login') }}"><span> </span>ВХОД</a></li> |
            <li ><a href="{{ route('register') }}">РЕГИСТРАЦИЯ</a></li>
        </ul>
        @else
            <div class="account"><a href="{{ route('admin') }}" target="_blank"><span> </span>АДМИНПАНЕЛЬ</a></div>
               <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">ВЫХОД({{ Auth::user()->name }})
               </a>
               <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
        @endif
            <div class="clearfix"> </div>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
</div>