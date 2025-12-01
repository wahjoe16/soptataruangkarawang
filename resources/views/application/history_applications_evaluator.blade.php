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
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Histori Permohonan</a></li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Histori Permohonan</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-sm table-history" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th class="text-muted">No</th>
                                    <th class="text-muted">Rencana Kegiatan</th>
                                    <th class="text-muted">Lokasi Rencana Kegiatan</th>
                                    <th class="text-muted">SOP</th>
                                    <th class="text-muted">Nama Pemohon</th>
                                    <th class="text-muted">Tanggal Pengajuan</th>
                                    <th class="text-muted">Status</th>
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

    @if ($applications->isNotEmpty())
        <script>
            let table;
            $(document).ready(function() {
                table = $('.table-history').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: "{{ route('history.evaluator.applications.data', ['id' => $applications->first()->sop_id]) }}",
                    },
                    columns: [
                        { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                        { data: 'name', name: 'name' },
                        { data: 'address_application', name: 'address_application' },
                        { data: 'sop.code', name: 'sop.code' },
                        { data: 'name_applicant', name: 'name_applicant' },
                        { data: 'date_application', name: 'date_application' },
                        { data: 'status', name: 'status' },
                    ],
                });
            });
        </script>
    @endif
    
    
@endpush