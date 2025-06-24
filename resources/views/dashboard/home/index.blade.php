@extends('sources-dashboard')

@section('title')

<title>SICCO | Panel De Control</title>

@endsection

@section('content')

<div class="container">
  <h2 class="main-title mx-2">Panel De Control</h2>
  <div class="row stat-cards">
    <div class="col-md-6 col-xl-3">
      <article class="stat-cards-item">
        <div class="stat-cards-icon success">
          <i data-feather="user" aria-hidden="true"></i>
        </div>
        <div class="stat-cards-info">
          <p class="stat-cards-info__num">{{ $totalUsers }}</p>
          <p class="stat-cards-info__title">Usuarios Activos</p>
        </div>
      </article>
    </div>
    <div class="col-md-6 col-xl-3">
      <article class="stat-cards-item">
        <div class="stat-cards-icon primary">
          <i data-feather="user" aria-hidden="true"></i>
        </div>
        <div class="stat-cards-info">
          <p class="stat-cards-info__num">{{ $totalPersonas }}</p>
          <p class="stat-cards-info__title">Total Personas</p>
        </div>
      </article>
    </div>
    <div class="col-md-6 col-xl-3">
      <article class="stat-cards-item">
        <div class="stat-cards-icon warning">
          <i data-feather="user" aria-hidden="true"></i>
        </div>
        <div class="stat-cards-info">
          <p class="stat-cards-info__num">{{ $totalDatosCensales }}</p>
          <p class="stat-cards-info__title">Personas Censadas</p>
        </div>
      </article>
    </div>
    <div class="col-md-6 col-xl-3">
      <article class="stat-cards-item">
        <div class="stat-cards-icon purple">
          <i data-feather="gift" aria-hidden="true"></i>
        </div>
        <div class="stat-cards-info">
          <p class="stat-cards-info__num">{{ $totalBeneficios }}</p>
          <p class="stat-cards-info__title">Beneficios Totales</p>
        </div>
      </article>
    </div>
  </div>
</div>

@endsection