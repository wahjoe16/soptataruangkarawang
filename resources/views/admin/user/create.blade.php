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
                <li class="breadcrumb-item"><a href="{{ route('users.index') }}">User</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Create</a></li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">New User</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('users.store') }}" method="POST" class="form-valide">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>Nama</label>
                                    <input type="text" class="form-control input-rounded" name="name" @error('name') is-invalid @enderror value="{{ old('name') }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>NIP</label>
                                    <input type="text" class="form-control input-rounded" name="nip" @error('nip') is-invalid @enderror value="{{ old('nip') }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Email</label>
                                    <input type="text" class="form-control input-rounded" name="email" @error('email') is-invalid @enderror value="{{ old('email') }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <label>Jabatan</label>
                                    <select class="form-control input-rounded" name="level"  @error('level') is-invalid @enderror>
                                        <option value="">Pilih Jabatan</option>
                                        <option value="Admin" {{ old('level') == 'Admin' ? 'selected' : '' }}>Admin</option>
                                        <option value="Front Office" {{ old('level') == 'Front Office' ? 'selected' : '' }}>Front Office</option>
                                        <option value="Evaluator" {{ old('level') == 'Evaluator' ? 'selected' : '' }}>Evaluator</option>
                                        <option value="Ketua Tim" {{ old('level') == 'Ketua Tim' ? 'selected' : '' }}>Ketua Tim</option>
                                        <option value="Kepala Bidang" {{ old('level') == 'Kepala Bidang' ? 'selected' : '' }}>Kepala Bidang</option>
                                    </select>
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
                "name": {
                    required: true,
                },
                "nip": {
                    required: true,
                },
                "email": {
                    required: true,
                    email: true,
                },
                "level": {
                    required: true,
                },
            },
            messages: {
                "name": {
                    required: "Nama tidak boleh kosong",
                },
                "nip": {
                    required: "NIP tidak boleh kosong",
                },
                "email": {
                    required: "Email tidak boleh kosong",
                    email: "Masukkan format email yang benar",
                },
                "level": {
                    required: "Jabatan tidak boleh kosong",
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