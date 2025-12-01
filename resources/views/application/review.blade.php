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
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Permohonan</a></li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Informasi Permohonan</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-sm">
                            <tbody>
                                <tr>
                                    <th class="text-muted">Rencana Kegiatan</th>
                                    <td class="text-muted">{{ $application['name'] }}</td>
                                </tr>
                                <tr>
                                    <th class="text-muted">SOP</th>
                                    <td class="text-muted">{{ $application['sop']['name'] }}</td>
                                </tr>
                                <tr>
                                    <th class="text-muted">Nama Pemohon</th>
                                    <td class="text-muted">{{ $application['name_applicant'] }}</td>
                                </tr>
                                <tr>
                                    <th class="text-muted">Lokasi Rencana Kegiatan</th>
                                    <td class="text-muted">{{ $application['address_application'] }}</td>
                                </tr>
                                <tr>
                                    <th class="text-muted">Link Berkas Kelengkapan</th>
                                    <td class="text-muted"><a href="{{ $application['link_file'] }}" target="_blank">{{ $application['link_file'] }}</a></td>
                                </tr>
                                <tr>
                                    <th class="text-muted">Tanggal Masuk Permohonan</th>
                                    <td class="text-muted">{{ date('d M Y', strtotime($application['date_application'])) }}</td>
                                </tr>
                                <tr>
                                    <th class="text-muted">Target Selesai Permohonan</th>
                                    <td class="text-muted">{{ date('d M Y', strtotime($application['date_deadline'])) }}</td>
                                </tr>
                                <tr>
                                    <th class="text-muted">Status Saat ini</th>
                                    @if ($application['status'] == 0)
                                        <td class="text-muted"><span class="badge badge-success">On Progress</span></td>
                                    @elseif ($application['status'] == 1)
                                        <td class="text-muted"><span class="badge badge-info">Selesai</span></td>
                                    @elseif ($application['status'] == 2)
                                        <td class="text-muted"><span class="badge badge-danger">Ditolak</span></td> 
                                    @endif
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">
                        Plot Evaluator
                    </h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('applications.assign', $application['id']) }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <select class="form-control input-rounded" id="user_id" name="user_id"  @error('user_id') is-invalid @enderror>
                                <option value="">Pilih Evaluator</option>
                                @foreach ($evaluators as $e)
                                    <option value="{{ $e->id }}" {{ $application['user_id'] == $e->id ? 'selected' : '' }}>{{ $e->name }} <b>({{ $e['applications_count'] }})</b></option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection