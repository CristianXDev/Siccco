@extends('sources-dashboard')

@section('title')

<title>SICCO | Reporter Carnets</title>

@endsection

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <article class="stat-cards-item">
                     @livewire('carnets-reporte')
            </article>
        </div>
    </div>
</div>

@endsection