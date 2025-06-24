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
<link rel="stylesheet" href="{{ asset('static/dashboard/css/style.css') }}">

<!-- Boxicons styles -->
<link rel="stylesheet" href="{{ asset('static/dashboard/css/boxicons.min.css') }}">

<!-- Sweetalert JS (Alerts) -->
<script src="{{ asset('static/dashboard/js/sweetalert.min.js') }}"></script>

@livewireStyles

</head>

<body>

<div class="layer"></div>

<!-- ! Body -->
<a class="skip-link sr-only" href="#skip-target">Skip to content</a>
<div class="page-flex">

<!--Alerts-->
@include('partials.others.alert')

<!--Sidebar-->
@include('partials.dashboard.sidebar')

<div class="main-wrapper">

<!--Navbar-->
@include('partials.dashboard.navbar')

<!-- ! Main -->
<main class="main users chart-page" id="skip-target">

  @yield('content')

</main>

</div>
</div>

@livewireScripts

<!-- Chart library -->
<script src="{{ asset('static/dashboard/plugins/chart.min.js') }}"></script>
<!-- Icons library -->
<script src="{{ asset('static/dashboard/plugins/feather.min.js') }}"></script>
<!-- Custom scripts -->
<script src="{{ asset('static/dashboard/js/script.js') }}"></script>
<!-- Bootstrap scripts -->
<script src="{{ asset('static/dashboard/js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>