@extends('sources-dashboard')

@section('title')

<title>SICCO | Tipos De Beneficios</title>

@endsection

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <article class="stat-cards-item">
               @livewire('tipos-solicituds')
            </article>
        </div>
    </div>
</div>

@endsection