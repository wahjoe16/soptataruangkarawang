@extends('admin_layout.app')

@section('content')

    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>{{ $title }}</h4>
                <span class="ml-1">Data</span>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('sop.index') }}">SOP</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Create</a></li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">New SOP</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('sop.store') }}" method="POST" class="form-valide">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label>Kode</label>
                                    <input type="text" class="form-control input-rounded" name="code">
                                </div>
                                <div class="form-group col-md-10">
                                    <label>Nama SOP</label>
                                    <input type="text" class="form-control input-rounded" name="name">
                                </div>
                            </div>
                            <div class="form-row mt-4">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('bottom_scripts')
    <script src="{{ asset('/focus/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script>
        jQuery(".form-valide").validate({
            rules: {
                "code": {
                    required: true,
                },
                "name": {
                    required: true,
                },
            },
            messages: {
                "code": {
                    required: "Kode SOP tidak boleh kosong",
                },
                "name": {
                    required: "Nama SOP tidak boleh kosong",
                },
            },
            errorElement: 'span',
            errorClass: 'invalid-feedback',
            highlight: function(element, errorClass, validClass) {
                jQuery(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                jQuery(element).removeClass('is-invalid');
            }
        });
    </script>
@endpush