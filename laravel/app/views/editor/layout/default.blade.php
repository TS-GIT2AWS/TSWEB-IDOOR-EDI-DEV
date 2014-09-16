<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <title>
            @section('title')
            Laravel 4 Sample Site
            @show
        </title>

        <meta name="keywords" content="your, awesome, keywords, here" />
        <meta name="author" content="Jon Doe" />
        <meta name="description" content="Lorem ipsum dolor sit amet, nihil fabulas et sea, nam posse menandri scripserit no, mei." />

        <!-- Mobile Specific Metas
        ================================================== -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Favicons
        ================================================== -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('assets/ico/apple-touch-icon-144-precomposed.png') }}">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{{ asset('assets/ico/apple-touch-icon-114-precomposed.png') }}}">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{{ asset('assets/ico/apple-touch-icon-72-precomposed.png') }}}">
        <link rel="apple-touch-icon-precomposed" href="{{{ asset('assets/ico/apple-touch-icon-57-precomposed.png') }}}">
        <link rel="shortcut icon" href="{{{ asset('assets/ico/favicon.png') }}}">

        <!-- CSS
        ================================================== -->
        <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap-theme.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/editor.css')}}">

        @section('styles')
        @show

        <!-- Modernizer JS
        ================================================== -->
        <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>

    </head>

    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- Navigation Menu -->
        @include('editor.layout.menu')
        <!-- ./ menu -->

        <div class="container">
            <!-- Example row of columns -->

            <!-- Notifications -->
            @include('notifications')
            <!-- ./ notifications -->

            <!-- Content -->
            @yield('content') 
            <!-- ./ content -->

            <hr>
            <!-- the following div is needed to make a sticky footer -->
            <div id="push"></div>
        </div> <!-- /container -->

        <footer>
            <div class="container" >
                <p>&copy; Company 2014</p>
            </div>
        </footer>


        <!-- Javascripts
        ================================================== -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="{{ asset('assets/js/vendor/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugins.js') }}"></script>

        @yield('scripts')

        @show
        <script src="{{ asset('assets/js/main.js') }}"></script>

    </body>
</html>