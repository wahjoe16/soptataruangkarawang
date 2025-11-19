@extends('admin_layout.app')

@push('top_css')
    <!-- Datatable -->
    <link href="{{ asset('/focus/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
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
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Permohonan</a></li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display table-new-applications" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Rencana Kegiatan</th>
                                    <th>Kode SOP</th>
                                    <th>Pemohon</th>
                                    <th>Evaluator</th>
                                    <th>Tanggal Permohonan</th>
                                    <th>Tanggal Deadline</th>
                                    <th>Sisa Waktu</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Rencana Kegiatan</th>
                                    <th>Kode SOP</th>
                                    <th>Pemohon</th>
                                    <th>Evaluator</th>
                                    <th>Tanggal Permohonan</th>
                                    <th>Tanggal Deadline</th>
                                    <th>Sisa Waktu</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
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
    <script src="{{ asset('/focus/js/plugins-init/datatables.init.js') }}"></script>

    <script>
        let table;

        $(function() {
            table = $('.table-new-applications').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('applications.view.data') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name', name: 'name'},
                    {data: 'code', name: 'code'},
                    {data: 'name_applicant', name: 'name_applicant'},
                    {data: 'user_id', name: 'user_id'},
                    {data: 'date_application', name: 'date_application'},
                    {data: 'date_deadline', name: 'date_deadline'},
                    {data: 'sisa_waktu', name: 'sisa_waktu'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        });
    </script>
@endpush