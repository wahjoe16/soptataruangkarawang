@extends('admin_layout.app')

@push('top_css')
    <!-- Datatable -->
    <link href="{{ asset('/focus/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
@endpush

@section('content')

    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Beranda</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Evaluator</a></li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="profile">
                <div class="profile-head">
                    <div class="photo-content">
                        <div class="cover-photo"></div>
                        <div class="profile-photo">
                            @if (empty($evaluatorApplication->photo))
                                <img class="img-fluid rounded-circle" src="{{ asset('/focus/images/avatar/1.png') }}" alt="">
                            @else
                                <img src="{{ asset('/user/photo/'. $evaluatorApplication->photo) }}" class="img-fluid rounded-circle" alt="">
                            @endif
                        </div>
                    </div>
                    <div class="profile-info">
                        <div class="row justify-content-center">
                            <div class="col-xl-8">
                                <div class="row">
                                    <div class="col-xl-4 col-sm-4 border-right-1 prf-col">
                                        <div class="profile-name">
                                            <h4 class="text-primary">{{ $evaluatorApplication->name }}</h4>
                                            <p>{{ $evaluatorApplication->level }}</p>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-sm-4 border-right-1 prf-col">
                                        <div class="profile-email">
                                            <h4 class="text-muted">{{ $evaluatorApplication->email }}</h4>
                                            <p>Email</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">List Permohonan {{ $evaluatorApplication->name }}</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table verticle-middle table-responsive-sm">
                            <thead>
                                <tr>
                                    <th class="text-muted">Rencana Kegiatan</th>
                                    <th class="text-muted">SOP</th>
                                    <th class="text-muted">Pemohon</th>
                                    <th class="text-muted">Lokasi Rencana Kegiatan</th>
                                    <th class="text-muted">Tanggal Permohonan</th>
                                    <th class="text-muted">Target Selesai</th>
                                    <th class="text-muted">Sisa Waktu</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('bottom_scripts')
    <!-- Datatable -->
    <script src="{{ asset('/focus/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script>
        let table;
        $(document).ready(function() {
            table = $('.table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('view.evaluator.data', ['id' => $evaluatorApplication->name]) }}",
                },
                columns: [
                    { data: 'name', name: 'name' },
                    { data: 'code', name: 'code' },
                    { data: 'name_applicant', name: 'name_applicant' },
                    { data: 'address_application', name: 'address_application' },
                    { data: 'date_application', name: 'date_application' },
                    { data: 'date_deadline', name: 'date_deadline' },
                    { data: 'sisa_waktu', name: 'sisa_waktu' },
                ],
            });
        });
    </script>
@endpush
