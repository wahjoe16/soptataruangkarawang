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
                                    <th class="text-muted">Evaluator</th>
                                    <td class="text-muted"><strong>{{ $application['user']['name'] }}</strong></td>
                                </tr>
                                <tr>
                                    <th class="text-muted">Tanggal Input Permohonan</th>
                                    <td class="text-muted">{{ date('d M Y', strtotime($application['date_application'])) }}</td>
                                </tr>
                                <tr>
                                    <th class="text-muted">Target Selesai Permohonan</th>
                                    <td class="text-muted">{{ date('d M Y', strtotime($application['date_deadline'])) }}</td>
                                </tr>
                                <tr>
                                    <th class="text-muted">Status</th>
                                    @if ($application['status'] == 0)
                                        <td class="text-muted"><span class="badge badge-success">On Progress</span></td>
                                    @elseif ($application['status'] == 1)
                                        <td class="text-muted"><span class="badge badge-info">Selesai</span></td>
                                    @elseif ($application['status'] == 2)
                                        <td class="text-muted"><span class="badge badge-danger">Ditolak</span></td> 
                                    @endif
                                </tr>
                                @if ($application['status'] == 1)
                                    <th class="text-muted">Arsip Pengesahan</th>
                                    <td class="text-muted"><strong><a href="{{ asset('archives/' . $application->link_archive) }}" target="_blank">{{ $application->link_archive }}</a></strong></td>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <form id="cek-form-{{ $application['id'] }}" class="mt-5" action="{{ route('cek.applications.sop1.expired.detail', $application['id']) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="button" onclick="confirmCek({{ $application['id'] }})" class="btn btn-primary btn-sm mr-3">Tandai Sudah Dicek</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    
                </div>
            </div>
        </div>
    </div>

@endsection

@push('bottom_scripts')
    <script>
        function confirmCek(id) {
            Swal.fire({
                title: 'Anda Yakin?',
                text: "Status Permohonan SOP 1 Akan Selesai!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Selesaikan!'
                }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('cek-form-' + id).submit();
                }
            })
        }
    </script>
@endpush