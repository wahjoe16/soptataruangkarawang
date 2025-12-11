@extends('admin_layout.app')

@section('content')

    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>{{ $title }}</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Beranda</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ $title }}</a></li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Personal Contact Programmer</h5>
                </div>
                <div class="card-body">
                    <div class="text-center py-3">
                        <h4>0822 4031 2828</h4>
                        <h2 class="text-muted">Wahyu Hidayat, S.Kom.</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection