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
                <li class="breadcrumb-item active"><a href="javascript:void(0)">User</a></li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div>
                        <a href="{{ route('users.create') }}" class="btn btn-success btn-sm"><i class="icon-plus"></i> Tambah Data</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>NIP</th>
                                    <th>Jabatan</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $key => $value)
                                    <tr>
                                        <td class="text-muted">{{ $key+1 }}</td>
                                        <td class="text-muted">{{ $value['name'] }}</td>
                                        <td class="text-muted">{{ $value['nip'] }}</td>
                                        <td class="text-muted">{{ $value['level'] }}</td>
                                        <td class="text-muted">{{ $value['email'] }}</td>
                                        @if ($value['status'] == 1)
                                            <td class="text-muted"><span class="badge bg-success">Aktif</span></td>
                                        @else
                                            <td class="text-muted"><span class="badge bg-danger">Non Aktif</span></td>
                                        @endif
                                        <td>
                                            <a href="#" class="btn btn-outline-primary btn-sm"><i class="mdi mdi-magnify"></i></a>&nbsp;
                                            <a href="#" class="btn btn-outline-warning btn-sm"><i class="icon-pencil"></i></a>&nbsp;
                                            <a href="#" class="btn btn-outline-danger btn-sm"><i class="icon-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>NIP</th>
                                    <th>Jabatan</th>
                                    <th>Email</th>
                                    <th>Status</th>
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
@endpush