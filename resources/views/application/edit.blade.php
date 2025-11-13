@extends('admin_layout.app')

@push('top_css')
    <!-- Pick date -->
    <link rel="stylesheet" href="{{ ('/focus/vendor/pickadate/themes/default.css') }}">
    <link rel="stylesheet" href="{{ ('/focus/vendor/pickadate/themes/default.date.css') }}">
@endpush

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
                <li class="breadcrumb-item active"><a href="{{ route('applications.index') }}">Permohonan</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit</a></li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Edit Application</h5>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('applications.update', $app['id']) }}" method="POST" class="form-valide">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="text-muted">Rencana Kegiatan</label>
                                    <input type="text" class="form-control input-rounded" name="name" @error('name') is-invalid @enderror value="{{ $app['name'] }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="text-muted">Lokasi Rencana Kegiatan</label>
                                    <input type="text" class="form-control input-rounded" name="address_application" @error('address_application') is-invalid @enderror value="{{ $app['address_application'] }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="text-muted">Nama Pemohon</label>
                                    <input type="text" class="form-control input-rounded" name="name_applicant" @error('name_applicant') is-invalid @enderror value="{{ $app['name_applicant'] }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="text-muted">Tanggal Permohonan</label>
                                    <input type="text" class="datepicker-default form-control input-rounded" name="date_application" id="datepicker" @error('date_application') is-invalid @enderror value="{{ $app['date_application'] }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <label class="text-muted">SOP</label>
                                    <select class="form-control input-rounded" name="sop_id"  @error('sop_id') is-invalid @enderror>
                                        <option value="">Pilih SOP</option>
                                        @foreach ($sop as $s)
                                            <option value="{{ $s['id'] }}" @if(!empty($s['id'] == $app['sop_id'])) selected @endif>({{ $s['code'] }})&nbsp;{{ $s['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <label class="text-muted">Link Berkas Kelengkapan</label>
                                    <input type="text" class="form-control input-rounded" name="link_file" @error('link_file') is-invalid @enderror value="{{ $app['link_file'] }}">
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
    <!-- pickdate -->
    <script src="{{ ('/focus/vendor/pickadate/picker.js') }}"></script>
    <script src="{{ ('/focus/vendor/pickadate/picker.time.js') }}"></script>
    <script src="{{ ('/focus/vendor/pickadate/picker.date.js') }}"></script>

    <!-- Pickdate -->
    <script src="{{ ('/focus/js/plugins-init/pickadate-init.js') }}"></script>

    <script src="{{ asset('/focus/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script>
        jQuery(".form-valide").validate({
            rules: {
                "name": {
                    required: true,
                },
                "address_application": {
                    required: true,
                },
                "name_applicant": {
                    required: true,
                },
                "date_application": {
                    required: true,
                },
                "sop_id": {
                    required: true,
                },
                "link_file": {
                    required: true,
                    url: true,
                },
            },
            messages: {
                "name": {
                    required: "Rencana Kegiatan wajib diisi",
                },
                "address_application": {
                    required: "Lokasi Rencana Kegiatan wajib diisi",
                },
                "name_applicant": {
                    required: "Nama Pemohon wajib diisi",
                },
                "date_application": {
                    required: "Tanggal Permohonan wajib diisi",
                },
                "sop_id": {
                    required: "SOP wajib dipilih",
                },
                "link_file": {
                    required: "Link Berkas Kelengkapan wajib diisi",
                    url: "Format Link Berkas Kelengkapan tidak valid",
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