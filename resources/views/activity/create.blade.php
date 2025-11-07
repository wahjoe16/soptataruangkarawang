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
                <li class="breadcrumb-item"><a href="{{ route('activity.index') }}">Kegiatan SOP</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Create</a></li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">New SOP Activity</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('activity.store') }}" method="POST" class="form-valide">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <label>SOP</label>
                                    <select class="form-control input-rounded" name="sop_id"  @error('sop_id') is-invalid @enderror>
                                        <option value="">-- Pilih SOP --</option>
                                        @foreach ($sop as $item)
                                            <option value="{{ $item['id'] }}" {{ old('sop_id') == $item['id'] ? 'selected' : '' }}>{{ $item['code'] }} - {{ $item['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-12">
                                    <label>Nama Kegiatan</label>
                                    <input type="text" class="form-control input-rounded" name="name" @error('name') is-invalid @enderror value="{{ old('name') }}">
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
                "sop_id": {
                    required: true,
                },
                "name": {
                    required: true,
                }
            },
            messages: {
                "sop_id": {
                    required: "SOP tidak boleh kosong",
                },
                "name": {
                    required: "Nama kegiatan tidak boleh kosong",
                }
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