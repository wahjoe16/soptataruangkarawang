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
                    <h5 class="card-title">
                        Applications Data
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Rencana Kegiatan</th>
                                    <th>Kode SOP</th>
                                    <th>Pemohon</th>
                                    <th>Tanggal Permohonan</th>
                                    <th>Tanggal Deadline</th>
                                    <th>Sisa Waktu</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                               

                                @foreach ($application as $key => $value)
                                    <tr>
                                        <td class="text-muted">{{ $key+1 }}</td>
                                        <td class="text-muted">{{ $value['name'] }}</td>
                                        <td class="text-muted">{{ $value['sop']['code'] }}</td>
                                        <td class="text-muted">{{ $value['name_applicant'] }}</td>
                                        <td class="text-muted">{{ date('d M Y', strtotime($value['date_application'])) }}</td>
                                        <td class="text-muted">{{ date('d M Y', strtotime($value['date_deadline'])) }}</td>

                                        <?php
                                            $start = new DateTime();
                                            $end = new DateTime($value['date_deadline']);
                                            // $sisaWaktu = date_diff($start, $end);
                                            $sisaWaktu = $start->diff($end);

                                            $weekDay = 0;
                                            $day = clone $start;

                                            while($day <= $end) {
                                                $thisDay = $day->format('N');
                                                if ($thisDay >= 1 && $thisDay <=5) {
                                                    $weekDay++;
                                                }
                                                $day->modify('+1 day');
                                            }
                                        ?> 

                                        @if ($weekDay >= 8)
                                            <td><span class="badge bg-success text-white">{{ $weekDay }}&nbsp;Hari</span></td>
                                        @elseif ($weekDay > 4)
                                            <td><span class="badge bg-warning text-white">{{ $weekDay }}&nbsp;Hari</span></td>
                                        @elseif ($weekDay < 4)
                                            <td><span class="badge bg-danger text-white">{{ $weekDay }}&nbsp;Hari</span></td>
                                        @endif

                                        <td class="text-muted">
                                            <a href="{{ route('applications.evaluator.detail', $value['id']) }}" class="btn btn-outline-primary btn-sm"><i class="mdi mdi-magnify"></i></a>
                                            <a href="#" class="btn btn-outline-danger btn-sm"><i class="icon-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Rencana Kegiatan</th>
                                    <th>Kode SOP</th>
                                    <th>Pemohon</th>
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
@endpush