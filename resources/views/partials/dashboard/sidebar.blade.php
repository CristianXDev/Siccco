<!-- ! Sidebar -->
<aside class="sidebar">
  <div class="sidebar-start">
    <div class="sidebar-head">
      <a href="{{ route('dashboard') }}" class="logo-wrapper" title="Home">
        <span class="sr-only">Home</span>
        <!--<span class="icon logo" aria-hidden="true"></span>-->
        <div class="logo-text">
          <span class="logo-title ms-5">SICCO</span>
        </div>
      </a>
      <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
        <span class="sr-only">Toggle menu</span>
        <span class="icon menu-toggle" aria-hidden="true"></span>
      </button>
    </div>
    <div class="sidebar-body">
      <ul class="sidebar-body-menu">

        <span class="system-menu__title">Inicio</span>

        <li>
          <a class="active" href="{{ route('dashboard') }}"><span class="icon home" aria-hidden="true"></span>Panel de control</a>
        </li>

        <span class="system-menu__title mt-4">Mi Cuenta</span>

        <li>
          <a class="show-cat-btn" href="##">
            <span class="icon document" aria-hidden="true"></span>Perfil
            <span class="category__btn transparent-btn" title="Open list">
              <span class="sr-only">Open list</span>
              <span class="icon arrow-down" aria-hidden="true"></span>
            </span>
          </a>
          <ul class="cat-sub-menu visible">
            <li>
              <a href="{{ route('profile') }}">Configuración</a>
            </li>
          </ul>
        </li>

        <span class="system-menu__title mt-4">Gestion del sistema</span>

        <li>
          <a class="show-cat-btn" href="##">
           <span class="icon document" aria-hidden="true"></span>Administración
            <span class="category__btn transparent-btn" title="Open list">
              <span class="sr-only">Open list</span>
              <span class="icon arrow-down" aria-hidden="true"></span>
            </span>
          </a>
          <ul class="cat-sub-menu visible">
            <li>
              <a href="{{ route('auditorias') }}">Auditorias</a>
            </li>
            <li>
              <a href="{{ route('usuarios') }}">Usuarios</a>
            </li>
            <li>
              <a href="{{ route('backup') }}">Respaldos</a>
            </li>
          </ul>
        </li>

        <span class="system-menu__title mt-4">ESTADISTICAS</span>
        <li>
          <a class="show-cat-btn" href="##">
            <span class="icon paper" aria-hidden="true"></span>General
            <span class="category__btn transparent-btn" title="Open list">
              <span class="sr-only">Open list</span>
              <span class="icon arrow-down" aria-hidden="true"></span>
            </span>
          </a>
          <ul class="cat-sub-menu visible">
            <li>
              <a href="{{ route('datos-censales') }}">Datos Censales</a>
            </li>
          </ul>
        </li>

        <span class="system-menu__title mt-4">BONOS Y AYUDA</span>

        <li>
          <a class="show-cat-btn" href="##">
            <span class="icon document" aria-hidden="true"></span>Beneficios
            <span class="category__btn transparent-btn" title="Open list">
              <span class="sr-only">Open list</span>
              <span class="icon arrow-down" aria-hidden="true"></span>
            </span>
          </a>
          <ul class="cat-sub-menu visible">
            <li>
              <a href="{{ route('tipos-beneficios') }}">Tipos De Beneficios</a>
            </li>
          </ul>
        </li>
        <li>
          <a class="show-cat-btn" href="##">
            <span class="icon paper" aria-hidden="true"></span>Asignar Beneficios
            <span class="category__btn transparent-btn" title="Open list">
              <span class="sr-only">Open list</span>
              <span class="icon arrow-down" aria-hidden="true"></span>
            </span>
          </a>
          <ul class="cat-sub-menu visible">
            <li>
              <a href="{{ route('personas') }}">Personas</a>
            </li>
            <li>
              <a href="{{ route('beneficios') }}">Beneficios</a>
            </li>
            <li>
              <a href="{{ route('beneficios-reporte') }}">Reporte beneficio</a>
            </li>
          </ul>
        </li>

        <span class="system-menu__title mt-4">Comunidad</span>

        <li>
          <a class="show-cat-btn" href="##">
            <span class="icon paper" aria-hidden="true"></span>Censo
            <span class="category__btn transparent-btn" title="Open list">
              <span class="sr-only">Open list</span>
              <span class="icon arrow-down" aria-hidden="true"></span>
            </span>
          </a>
          <ul class="cat-sub-menu visible">
            <li>
              <a href="{{ route('datos-censales') }}">Datos Censales</a>
            </li>
          </ul>
        </li>

        <span class="system-menu__title mt-4">Carnetización</span>

        <li>
          <a class="show-cat-btn" href="##">
            <span class="icon paper" aria-hidden="true"></span>Carnets
            <span class="category__btn transparent-btn" title="Open list">
              <span class="sr-only">Open list</span>
              <span class="icon arrow-down" aria-hidden="true"></span>
            </span>
          </a>
          <ul class="cat-sub-menu visible">
            <li>
              <a href="{{ route('carnets') }}">Nuevo carnet</a>
            </li>
            <li>
              <a href="{{ route('historial-carnets') }}">Historial</a>
            </li>
            <li>
              <a href="{{ route('carnets-reporte') }}">Reporte Carnets</a>
            </li>
          </ul>
        </li>

        <span class="system-menu__title mt-4">Servicios y mejoras</span>

        <li>
          <a class="show-cat-btn" href="##">
            <span class="icon paper" aria-hidden="true"></span>Mejoras
            <span class="category__btn transparent-btn" title="Open list">
              <span class="sr-only">Open list</span>
              <span class="icon arrow-down" aria-hidden="true"></span>
            </span>
          </a>
          <ul class="cat-sub-menu visible">
            <li>
              <a href="{{ route('tipo-solicitud') }}">Tipos De Solicitud</a>
            </li>
            <li>
              <a href="{{ route('solicitud-mejoras') }}">Nueva Solicitud</a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</aside>
