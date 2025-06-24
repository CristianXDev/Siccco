@extends('sources-auth')

@section('title')

<title>SICCO | Registro </title>

@endsection

@section('content')

<div class="error-pagewrap">
    <div class="error-page-int">
        <div class="content-error">
            <div class="hpanel">
                <div class="panel-body bordered shadow">

                    <div class="text-center m-b-md custom-login" style="padding-top:30px;">

                        <h3><img src="{{ asset('static/dashboard/img/favicon.ico') }}" width="20" height="30" style="margin-top:-3px; margin-right:7px;">SICCO</h3>

                        <p class="text-muted"><small>Sistema Integral de Consejos Comunales</small></p>
                    </div>

                    <form action="#" id="loginForm">
                        <div class="row">
                            <div class="form-group col-lg-12">
                                <label>Username</label>
                                <input class="form-control">
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Password</label>
                                <input type="password" class="form-control">
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Repeat Password</label>
                                <input type="password" class="form-control">
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Email Address</label>
                                <input class="form-control">
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Repeat Email Address</label>
                                <input class="form-control">
                            </div>
                            <div class="checkbox col-lg-12">
                                <input type="checkbox" class="i-checks" checked> Sigh up for our newsletter
                            </div>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-success loginbtn">Register</button>
                            <button class="btn btn-default">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>   
</div>

@endsection

