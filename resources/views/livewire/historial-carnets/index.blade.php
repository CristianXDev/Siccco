@extends('sources-dashboard')

@section('title')

<title>SICCO | Historial Carnets</title>

@endsection

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <article class="stat-cards-item">
                 @livewire('historial-carnets')
            </article>
        </div>
    </div>
</div>

@endsection