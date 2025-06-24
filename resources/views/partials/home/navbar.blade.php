<nav class="navbar navbar-default navbar-fixed-top navbar-custom">
  <div class="container">
<!-- Brand and toggle get grouped for better mobile display -->
<div class="navbar-header">
  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </button>

  <a class="navbar-brand" href="#"><!--<img src="{{ asset('static/dashboard/img/favicon.ico') }}" width="20" height="20" style="margin-top:-3px; margin-right:7px;">-->SICCO</a>

</div>

<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
  <ul class="nav navbar-nav navbar-right">
    <li><a href="#home">Inicio</a></li>
    <li><a href="#services">Sobre nosotros</a></li>
    <li><a href="#twitter_tweet">Historia</a></li>
    <li><a href="#contact">Ubicación</a></li>
    <li><a href="{{ route('login') }}" class="btn btn-custom"><span class="text-white">Iniciar Sesión</span></a></li>
  </ul>
</div><!-- /.navbar-collapse -->
</div><!-- /.container -->
</nav>
