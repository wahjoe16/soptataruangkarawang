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
                <li class="breadcrumb-item active"><a href="{{ route('activity.index') }}">Activity SOP</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Update Activity SOP</a></li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-12 card">
            <div class="card-header">
                <h5 class="card-title">Edit Data Activity SOP</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('activity.update', $activity['id']) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label>Nama</label>
                            <input type="text" class="form-control input-rounded" name="name" @error('name') is-invalid @enderror value="{{ $activity['name'] }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label>Jenis SOP</label>
                            <select class="form-control input-rounded" name="sop_id"  @error('sop_id') is-invalid @enderror>
                                <option value="">Pilih SOP</option>
                                @foreach ($sop as $s)
                                    <option value="{{ $s['id'] }}" @if(!empty($s['id'] == $activity['sop_id'])) selected @endif>({{ $s['code'] }})&nbsp;{{ $s['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label>Status</label>
                            <select class="form-control input-rounded" name="status"  @error('status') is-invalid @enderror>
                                <option value="">Pilih Status</option>
                                @foreach ([
                                    "1" => "Aktif",
                                    "0" => "Non Aktif",
                                ] as $status => $statusLabel)
                                    <option value="{{ $status }}" {{ old('status', $activity->status) == $status ? "selected" : "" }}>{{ $statusLabel }}</option>
                                @endforeach
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

@endsection