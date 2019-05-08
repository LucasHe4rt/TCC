@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
        <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">person</i>
                </div>
                <p class="card-category">Usuários</p>
                <h3 class="card-title">
                    {{$users->count()}}
                </h3>
            </div>
            <div class="card-footer"></div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">store</i>
                </div>
                <p class="card-category">Estabelecimentos</p>
                <h3 class="card-title">
                    {{$establishments->count()}}
                </h3>
            </div>
            <div class="card-footer"></div>
        </div>
    </div>
</div>
@endsection
