<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!--Title-->
@yield('title')

<!-- Favicon -->
<link rel="shortcut icon" href="{{ asset('static/dashboard/img/svg/logo.svg') }}" type="image/x-icon">

<!-- Bootstrap styles -->
<link rel="stylesheet" href="{{ asset('static/dashboard/css/bootstrap.min.css') }}">

<!-- Custom styles -->
<link rel="stylesheet" href="{{ asset('static/dashboard/css/style.min.css') }}">

<!-- Sweetalert JS (Alerts) -->
<script src="{{ asset('static/dashboard/js/sweetalert.min.js') }}"></script>

</head>

<body style="background-image:url('{{ asset("static/dashboard/img/others/login.jpg ")  }}'); background-repeat:repeat; background-position:center center;">

<!--Alerts-->
@include('partials.others.alert')

<!--Content-->
@yield('content')

<!-- Icons library -->
<script src="{{ asset('static/dashboard/plugins/feather.min.js') }}"></script>
<!-- Custom scripts -->
<script src="{{ asset('static/dashboard/js/script.js') }}"></script>

</body>
</html>