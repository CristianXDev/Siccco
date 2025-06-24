@extends('sources-dashboard')

@section('title')

<title>SICCO | Gestión de usuario</title>

@endsection

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <article class="stat-cards-item">
                @livewire('users')
            </article>
        </div>
    </div>
</div>

@endsection