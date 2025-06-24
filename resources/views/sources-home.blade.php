<!DOCTYPE html>

<html lang="en">
<head>
<!-- Meta Tags -->
<meta charset="utf-8"/>

<!-- Site Title-->
@yield('title')

<!--Favicon-->
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('static/dashboard/img/favicon.ico') }}">

<!-- Mobile Specific Metas-->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>

<!-- Google-fonts -->
<link href='http://fonts.googleapis.com/css?family=Signika+Negative:300,400,600,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Kameron:400,700' rel='stylesheet' type='text/css'>

<!-- Bootstrap -->
<link rel="stylesheet" href="{{ asset('static/home/css/bootstrap.min.css') }}"/>

<!-- Fonts-style -->
<link rel="stylesheet" href="{{ asset('static/home/css/styles.css') }}"/>

<!-- Fonts-style -->
<link rel="stylesheet" href="{{ asset('static/home/css/font-awesome.min.css') }}"/>

<!-- Modal-Effect -->
<link href="{{ asset('static/home/css/component.css') }}" rel="stylesheet">

<!-- owl-carousel -->
<link href="{{ asset('static/home/css/owl.carousel.css') }}" rel="stylesheet" type="text/css" media="screen">
<link href="{{ asset('static/home/css/owl.theme.css') }}" rel="stylesheet" type="text/css" media="screen">

<!-- Template Styles-->
<link rel="stylesheet" href="{{ asset('static/home/css/style.css') }}"/>

<!-- Template Color-->
<link rel="stylesheet" type="text/css" href="{{ asset('static/home/css/green.css') }}" media="screen" id="color-opt" />

<!--Color-->
<link rel="stylesheet" type="text/css" href="{{ asset('static/home/css/blue.css') }}">

</head>

<body data-spy="scroll" data-offset="80">

<!--Preloader-->
@include('partials.home.preloader')

<!--Navbar-->
@include('partials.home.navbar')

<!--Contenido-->
@yield('content')

<!--Scroll Top-->
@include('partials.home.scroll-top')

<!--Switch Color-->
@include('partials.home.switch-color')


<!-- JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- initialize jQuery Library -->
<script src="{{ asset('static/home/js/jquery.min.js') }}"></script>
<!-- jquery easing -->
<script src="{{ asset('static/home/js/jquery.easing.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('static/home/js/bootstrap.min.js') }}"></script>
<!-- modal-effect -->
<script src="{{ asset('static/home/js/classie.js') }}"></script>
<script src="{{ asset('static/home/js/modalEffects.js') }}"></script>
<!-- Counter-up -->
<script src="{{ asset('static/home/js/waypoints.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('static/home/js/jquery.counterup.min.js') }}" type="text/javascript"></script>
<!-- SmoothScroll -->
<script src="{{ asset('static/home/js/SmoothScroll.js') }}"></script>
<!-- Parallax -->
<script src="{{ asset('static/home/js/jquery.stellar.min.js') }}"></script>
<!-- Jquery-Nav -->
<script src="{{ asset('static/home/js/jquery.nav.js') }}"></script>
<!-- Owl carousel -->                                                      
<script type="text/javascript" src="{{ asset('static/home/js/owl.carousel.min.js') }}"></script>
<!-- App JS -->
<script src="{{ asset('static/home/js/app.js') }}"></script>

<!-- Switcher script for demo only -->
<script type="text/javascript" src="{{ asset('static/home/js/switcher.js') }}"></script>

</body>
</html>
