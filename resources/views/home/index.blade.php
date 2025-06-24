@extends('sources-home')

@section('title')

<!--Title-->
<title>SICCO | Inicio</title>

@endsection

@section('content')

<!-- /HOME -->
<section class="main-home" id="home">
  <div class="home-page-photo" style="background-image: url({{ asset('static/home/images/bg.jpg') }});"></div> <!-- Background image -->
  <div class="home__header-content">
    <div id="main-home-carousel" class="owl-carousel">
      <!-- Slide 1: Presentación del sistema -->
      <div>
        <h1 class="intro-title">SICCO: Sistema Integral de Consejos Comunales</h1>
        <p class="intro-text">Sistema diseñado para optimizar la administración de beneficios sociales, censos poblacionales y proyectos comunitarios. <br/> Una solución digital para empoderar a consejos comunales y organizaciones sociales.</p>
        <a class="btn btn-custom" href="{{ route('login') }}">Iniciar Sesión</a>
      </div>

      <!-- Slide 2: Funcionalidades clave -->
      <div>
        <h1 class="intro-title">Funcionalidades Clave</h1>
        <p class="intro-text">
          ✔ Gestión centralizada de beneficios sociales <br/>
          ✔ Censos digitales y carnetización comunitaria <br/>
          ✔ Monitoreo de proyectos con reportes automatizados
        </p>
        <a class="btn btn-custom" href="{{ route('login') }}">Iniciar Sesión</a>
      </div>

      <!-- Slide 3: Beneficios -->
      <div>
        <h1 class="intro-title">Transforma tu comunidad</h1>
        <p class="intro-text">
          Reducción de trámites burocráticos + Transparencia en asignación de recursos <br/>
          + Datos actualizados en tiempo real. ¡Todo en una sola plataforma!
        </p>
        <a class="btn btn-custom" href="{{ route('login') }}">Iniciar Sesión</a>
      </div>
    </div>
  </div>
</section>
<!-- /End HOME -->

<!-- / SERVICES -->
<section id="services">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3 class="title text-center">Información Del Proyecto</h3>
        <h5 class="text-muted text-center">Este sistema está hecho con</h5>
        <div class="titleHR"><span></span></div>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-4"> <!-- HTML5 -->
        <div class="text-center services-item">
          <div class="col-wrapper">
            <div class="icon-border"> 
              <img src="{{ asset('static/home/images/html.png') }}" width="100" height="100">
            </div>
            <h5>HTML5</h5>
            <p>La estructura básica de todas las páginas. Define la organización del contenido mediante etiquetas semánticas que mejoran la accesibilidad y el SEO.</p>
          </div>
        </div>
      </div>

      <div class="col-sm-4"> <!-- CSS3 -->
        <div class="text-center services-item">
          <div class="col-wrapper">
            <div class="icon-border"> 
              <img src="{{ asset('static/home/images/css.png') }}" width="100" height="100">
            </div>
            <h5>CSS3</h5>
            <p>Controla el diseño visual y la presentación. Permite crear interfaces adaptables a diferentes dispositivos y aplicar efectos estéticos coherentes.</p>
          </div>
        </div>
      </div>

      <div class="col-sm-4"> <!-- JavaScript -->
        <div class="text-center services-item">
          <div class="col-wrapper">
            <div class="icon-border"> 
             <img src="{{ asset('static/home/images/js.png') }}" width="100" height="100">
           </div>
           <h5>JavaScript</h5>
           <p>Añade interactividad dinámica a la página. Maneja eventos del usuario, actualiza contenido sin recargar y valida datos en tiempo real.</p>
         </div>
       </div>
     </div>
   </div>

   <div class="row">
    <div class="col-sm-4"> <!-- PHP -->
      <div class="text-center services-item">
        <div class="col-wrapper">
          <div class="icon-border"> 
           <img src="{{ asset('static/home/images/php.jpg') }}" width="200" height="100">
         </div>
         <h5>PHP</h5>
         <p>Lenguaje del lado del servidor que procesa formularios, gestiona sesiones de usuario y genera contenido dinámico antes de enviarlo al navegador.</p>
       </div>
     </div>
   </div>

   <div class="col-sm-4"> <!-- Laravel -->
    <div class="text-center services-item">
      <div class="col-wrapper">
        <div class="icon-border"> 
         <img src="{{ asset('static/home/images/laravel.jpg') }}" width="100" height="100">
       </div>
       <h5>Laravel</h5>
       <p>Framework que organiza el código PHP en una estructura limpia. Simplifica tareas comunes como autenticación y acceso a bases de datos.</p>
     </div>
   </div>
 </div>

 <div class="col-sm-4"> <!-- MySQL -->
  <div class="text-center services-item">
    <div class="col-wrapper">
      <div class="icon-border"> 
        <img src="{{ asset('static/home/images/mysql.jpg') }}" width="100" height="100">
      </div>
      <h5>MySQL</h5>
      <p>Sistema de almacenamiento que organiza los datos en tablas relacionadas. Garantiza integridad y permite recuperar información eficientemente.</p>
    </div>
  </div>
</div>

<div class="col-sm-4"></div>

<div class="col-sm-4"> <!-- Gemini IA -->
  <div class="text-center services-item">
    <div class="col-wrapper">
      <div class="icon-border"> 
       <img src="{{ asset('static/home/images/gemini.jpg') }}" width="100" height="100">
     </div>
     <h5>Gemini IA</h5>
     <p>Modelo de inteligencia artificial que entiende consultas complejas, genera respuestas contextuales y aprende de las interacciones.</p>
   </div>
 </div>
</div>
</div>
</div>
</section>

<!-- Details -->
<div id="twitter_tweet" class="basic-1">
  <div class="container py-5">
    <div class="row">


      <div class="col-md-5">
        <div class="image-container mt-n5 ms-5">
          <img class="img-fluid" src="{{ asset('static/home/images/historia.gif') }}" alt="alternative" height="300">
        </div> <!-- end of image-container -->
      </div> <!-- end of col -->

      <div class="col-md-7">
        <div class="text-container">
          <h2>Historia de la comunidad</h2>
          <p>Fue fundado para los años de 1970, sus primeras sedes del orza fueron la familia Romero y y Peñas. En el 1980 inicia el crecimiento de la población llegando para ese entonces otras familias, asi fue progresivamente el espacio fue creciendo y formándose un sector en cual con el pasar del tiempo fueron incrementándose el número de familia, con la llegada de una mayor representación de habitantes, el espacio fue cambiando en el tiempo, inicialmente era zona boscosa en el que abundan los árboles de cujies, cajuaros, capa de ratón, entre otros.</p>
        </div> <!-- end of text-container -->
      </div> <!-- end of col -->


    </div> <!-- end of row -->
  </div> <!-- end of container -->
</div> <!-- end of basic-1 -->
<!-- end of details -->

<!-- Details -->
<div id="contact" class="basic-1">
  <div class="container py-5">
    <div class="row">
      <div class="col-md-7">
        <div class="text-container">
          <h2>Ubicación</h2>
          <p>Nuestra comunidad esta ubicada al norte con el cerro Topo, por el sur con la calera al este con barrio Belén y al oeste con el sector Galvanizado la calera.</p>
        </div> <!-- end of text-container -->
      </div> <!-- end of col -->

      <div class="col-md-5">
        <div class="image-container mt-n5 ms-5">
          <img class="img-fluid" src="{{ asset('static/home/images/ubicacion.gif') }}" alt="alternative" height="300">
        </div> <!-- end of image-container -->
      </div> <!-- end of col -->

    </div> <!-- end of row -->
  </div> <!-- end of container -->
</div> <!-- end of basic-1 -->
<!-- end of details -->

<!-- FOOTER begings -->
<footer id="footer">    
  <div class="footer-widgets-wrap">
    <div class="container text-center">    
      <div class="row">
        <div class="col-sm-4 col-md-4">
          <div class="footer-content">
            <h4>KEEP IN TOUCH</h4>
            <div class="footer-socials">
              <a href="#"><i class="fa fa-facebook"></i></a>
              <a href="#"><i class="fa fa-google-plus"></i></a>
              <a href="#"><i class="fa fa-twitter"></i></a>
              <a href="#"><i class="fa fa-pinterest"></i></a>
            </div>
          </div> <!-- end footer-content -->
        </div> <!-- end col-sm-4 -->
        <div class="col-sm-4 col-md-4">
          <div class="footer-content">
            <h4>ADDRESS</h4>
            <p>464 Newesta St<br>
            Othervilla AB 6007, Other</p>
            <p>+0 123-456-7890<br>
              <a href="#">www.domain.com</a><br>
            info@domain.com</p>
          </div> <!-- end footer-content -->
        </div> <!-- end col-sm-4 -->
        <div class="col-sm-4 col-md-4">
          <div class="footer-content">
            <h4>SUPPORT</h4>
            <p>You need support? Visit our support forum and open tickets for you questions.</p>
            <p><button type="button" class="btn btn-custom-sm">forum</button></p>
          </div>  <!-- end footer-content -->   
        </div> <!-- end col-sm-4 -->
      </div> <!-- end row -->
    </div> <!-- container -->
  </div>
</footer>
<!-- End footer begings -->

@endsection