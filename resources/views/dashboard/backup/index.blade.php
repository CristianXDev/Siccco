@extends('sources-dashboard')

@section('title')

<title>SICCO | Respaldo SQL</title>

@endsection

@section('content')

<div class="container-fluid">
  <div class="row justify-content-center">

    <div class="col-md-4">
      <article class="stat-cards-item">

        <div class="text-center">
          <h3 class="mt-2">Realizar Respaldo</h3>

          <!--IMG-->
          <img src="{{ asset('static/dashboard/img/others/servidor.gif') }}" class="img-fluid p-3">

          <form action="{{ route('backup-create') }}" method="GET" class="mt-3">
            <button type="submit" class="btn btn-primary">Crear Respaldo</button>
          </form>
        </div>
      </article>
    </div>


    <div class="col-md-4">
      <article class="stat-cards-item">

        <div class="text-center">
          <h3 class="mt-2">Restaurar base de datos</h3>

          <!--IMG-->
          <img src="{{ asset('static/dashboard/img/others/subiendo.gif') }}" class="img-fluid p-3">

          <form action="{{ route('backup-update') }}" method="GET" class="mt-3">
            <button type="submit" class="btn btn-primary">Restaurar información</button>
          </form>
        </div>
      </article>
    </div>


  </div>
</div>

@endsection