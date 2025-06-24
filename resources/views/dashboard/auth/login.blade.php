@extends('sources-auth')

@section('title')

<title>SICCO | Inicio De Sesión </title>

@endsection

@section('content')

<main class="page-center">
  <article class="sign-up">
    <form class="sign-up-form form" action="{{ route('auth-login') }}" method="POST">
    <h1 class="sign-up__title">¡Bienvenido de nuevo!</h1>
    <p class="sign-up__subtitle">Ingrese los datos de su cuenta para acceder</p>
      
      <label class="form-label-wrapper">
        <p class="form-label">Correo Electronico</p>
        <input class="form-input" type="email" placeholder="fulanito@gmail.com" required name="correo">
      </label>
      <label class="form-label-wrapper">
        <p class="form-label">Contraseña</p>
        <input class="form-input" type="password" placeholder="********" name="contrasena" required>
      </label>
        <a class="link-info forget-link" href="##">¿Perdiste tu contraseña?</a>
          <button class="form-btn primary-default-btn transparent-btn">Iniciar Sesión</button>

          <a href="{{ route('home') }}" class="form-btn secondary-default-btn transparent-btn mt-3">Regresar</a>

      @csrf

    </form>
  </article>
</main>

@endsection