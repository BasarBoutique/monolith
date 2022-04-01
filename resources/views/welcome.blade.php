<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Argon Dashboard') }}</title>
        <!-- Favicon -->
        <link href="{{ asset('argon') }}/img/brand/favicon.png" rel="icon" type="image/png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <!-- Extra details for Live View on GitHub Pages -->
        <!-- Icons -->
        <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
        <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
        <!-- Argon CSS -->
        <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=1.0.0" rel="stylesheet">
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
        <link href="{{ asset('css/checkbox.css') }}" rel="stylesheet">
        <link rel="canonical" href="https://www.creative-tim.com/product/argon-dashboard-laravel" />

        {{-- <!--  Social tags      -->
        <meta name="keywords" content="dashboard, bootstrap 4 dashboard, bootstrap 4 design, bootstrap 4 system, bootstrap 4, bootstrap 4 uit kit, bootstrap 4 kit, argon, argon ui kit, creative tim, html kit, html css template, web template, bootstrap, bootstrap 4, css3 template, frontend, responsive bootstrap template, bootstrap ui kit, responsive ui kit, argon dashboard">
        <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
        <!-- Schema.org markup for Google+ -->
        <meta itemprop="name" content="Argon - Free Dashboard for Bootstrap 4 by Creative Tim">
        <meta itemprop="description" content="Start your development with a Dashboard for Bootstrap 4.">
        <meta itemprop="image" content="https://s3.amazonaws.com/creativetim_bucket/products/96/original/opt_ad_thumbnail.jpg">
        <!-- Twitter Card data -->
        <meta name="twitter:card" content="product">
        <meta name="twitter:site" content="@creativetim">
        <meta name="twitter:title" content="Argon - Free Dashboard for Bootstrap 4 by Creative Tim">
        <meta name="twitter:description" content="Start your development with a Dashboard for Bootstrap 4.">
        <meta name="twitter:creator" content="@creativetim">
        <meta name="twitter:image" content="https://s3.amazonaws.com/creativetim_bucket/products/96/original/opt_ad_thumbnail.jpg">
        <!-- Open Graph data -->
        <meta property="fb:app_id" content="655968634437471">
        <meta property="og:title" content="Argon - Free Dashboard for Bootstrap 4 by Creative Tim" />
        <meta property="og:type" content="article" />
        <meta property="og:url" content="https://demos.creative-tim.com/argon-dashboard/index.html" />
        <meta property="og:image" content="https://s3.amazonaws.com/creativetim_bucket/products/96/original/opt_ad_thumbnail.jpg" />
        <meta property="og:description" content="Start your development with a Dashboard for Bootstrap 4." />
        <meta property="og:site_name" content="Creative Tim" />     --}}
    </head>
    <body class="bg-default">

        
        <div class="main-content">
            <div id="app">
                <app></app>
            </div>
        </div>        
        
        
        
        <!-- Argon JS -->
        <script src="{{ mix('/js/app.js') }}"></script>
        
        <script src="{{asset('js/uploads.js')}}"></script>
        <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

        <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
        
        <script src="{{ asset('argon') }}/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
           
        <script src="{{ asset('argon') }}/js/argon.js?v=1.0.0"></script>
        <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.11"></script>
        <script src="{{asset('js/typed.js')}}"></script>      
       @stack('js')
        
    </body>
</html>
