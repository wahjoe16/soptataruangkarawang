@extends('admin_layout.app')

@push('top_css')
    <!-- Datatable -->
    <link href="{{ asset('/focus/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">

    <!-- Pick date -->
    <link rel="stylesheet" href="{{ ('/focus/vendor/pickadate/themes/default.css') }}">
    <link rel="stylesheet" href="{{ ('/focus/vendor/pickadate/themes/default.date.css') }}">
@endpush

@section('content')

    <h3>Hallo, Selamat Datang <i>{{ Auth::user()->name }}</i></h3>

    @if (Auth::user()->level == 'Ketua Tim' || Auth::user()->level == 'Kepala Bidang')

        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Distribusi Permohonan</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th style="color: black;">Evaluator</th>
                                        <th style="color: black; text-align:center;">Status User</th>
                                        <th style="color: black;" title="SOP Teknis Pengesahan Siteplan">SOP 1</th>
                                        <th style="color: black;" title="SOP Pelayanan Persetujuan Kesesuaian Kegiatan Pemanfaatan Ruang (KKPR) Pada Dinas PUPR Kabupaten Karawang">SOP 2</th>
                                        <th style="color: black;" title="SOP Keterangan Rencana Kabupaten (KRK)">SOP 3</th>
                                        <th style="color: black;" title="SOP Monitoring dan Evaluasi Rencana Siteplan Kabupaten Karawang">SOP 4</th>
                                        <th style="color: black;" title="SOP Penilaian Pelaksanaan Kesesuaian Kegiatan Proses Pemanfaatan Ruang (KKPR) Pasca Proses Pembangunan">SOP 5</th>
                                        <th style="color: black;" title="SOP Penilaian Kesesuaian Kegiatan Pernyataan Mandiri Pelaku Usaha Mikro dan Kecil (PMP UMK)">SOP 6</th>
                                        <th style="color: black;" title="Pelayanan Administrasi Surat Menyurat">SOP 7</th>
                                        <th style="color: black;">Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $totalPerKolom = [];
                                    @endphp

                                    @foreach ($distribusiData as $data)
                                        <tr>
                                            <td class="text-muted"><a href="{{ route('applications.view.evaluator', $data['name']) }}" style="color: black;">{{ $data['name'] }}</a></td>
                                            @if ($data['status'] == 1)
                                                <td style="text-align:center;"><span class="text-muted badge bg-success">Aktif</span></td>
                                            @else
                                                <td style="text-align:center;"><span class="text-muted badge bg-danger">Non Aktif</span></td>
                                            @endif
                                            @foreach ($data['values'] as $i => $value)
                                                <td class="text-muted"  style="text-align:center;">{{ $value }}</td>

                                                @php
                                                    // simpan total per kolom
                                                    if(!isset($totalPerKolom[$i])) {
                                                        $totalPerKolom[$i] = 0;
                                                    }
                                                    $totalPerKolom[$i] += $value;
                                                @endphp

                                            @endforeach
                                            <td class="text-primary"  style="text-align:center;"><strong>{{ array_sum($data['values']) }}</strong></td>
                                        </tr>
                                        
                                    @endforeach
                                    {{-- menghitung total $value --}}
                                    <tr>
                                        <td class="text-muted" colspan="2" style="text-align: center;"><strong>Total</strong></td>
                                        {{-- menghitung jumlah $value pada setiap kolom SOP --}}
                                        @foreach ($totalPerKolom as $total)
                                            <td class="text-primary" style="text-align:center;">
                                                <strong>{{ $total }}</strong>
                                            </td>
                                        @endforeach
                                        <td class="text-primary" style="text-align:center;"><strong>{{ array_sum($totalPerKolom) }}</strong></td>
                                    </tr>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">
                            Data Permohonan On Progress
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display applications-table" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Rencana Kegiatan</th>
                                        <th>Kode SOP</th>
                                        <th>Evaluator</th>
                                        <th>Sisa Waktu</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Rencana Kegiatan</th>
                                        <th>Kode SOP</th>
                                        <th>Evaluator</th>
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
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title"></h5>
                    </div>
                    <div class="card-body">
                        <canvas id="myLineChartApplication"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title"></h5>
                    </div>
                    <div class="card-body">
                        <canvas id="myLineChartApplicationSop"></canvas>
                    </div>
                </div>
            </div>
        </div>

    @endif

    @if (Auth::user()->level == 'Front Office')
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">
                            Input Permohonan Baru
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ route('applications.store') }}" method="POST" class="form-valide">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="text-muted">Rencana Kegiatan</label>
                                        <input type="text" class="form-control input-rounded" name="name" @error('name') is-invalid @enderror value="{{ old('name') }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="text-muted">Lokasi Rencana Kegiatan</label>
                                        <input type="text" class="form-control input-rounded" name="address_application" @error('address_application') is-invalid @enderror value="{{ old('address_application') }}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="text-muted">Nama Pemohon</label>
                                        <input type="text" class="form-control input-rounded" name="name_applicant" @error('name_applicant') is-invalid @enderror value="{{ old('name_applicant') }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="text-muted">Tanggal Permohonan</label>
                                        <input type="text" class="datepicker-default form-control input-rounded" name="date_application" id="datepicker" @error('date_application') is-invalid @enderror value="{{ old('date_application') }}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-12">
                                        <label class="text-muted">SOP</label>
                                        <select class="form-control input-rounded" name="sop_id"  @error('sop_id') is-invalid @enderror>
                                            <option value="">-- Pilih SOP --</option>
                                            @foreach ($sop as $value)
                                                <option value="{{ $value['id'] }}" {{ old('sop_id') == $value['id'] ? 'selected' : '' }}>{{ $value['code'] }} - {{ $value['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-12">
                                        <label class="text-muted">Link Berkas Kelengkapan</label>
                                        <input type="text" class="form-control input-rounded" name="link_file" @error('link_file') is-invalid @enderror value="{{ old('link_file') }}">
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
    @endif
    
    {{-- History permohonan --}}
    @if (Auth::user()->level != 'Evaluator')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">
                            History Permohonan
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display history-applications-table" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Rencana Kegiatan</th>
                                        <th>Kode SOP</th>
                                        <th>Pemohon</th>
                                        <th>Evaluator</th>
                                        <th>Status</th>
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
    @endif

    @if (Auth::user()->level == 'Evaluator')
        
            <div class="row">
                @foreach ($sop as $s)
                    <div class="col-lg-3 col-sm-6 mb-4">
                        <div class="card h-100">
                            <a href="{{ route('history.applications', $s['id']) }}">
                                <div class="stat-widget-one card-body">
                                    <div class="stat-content">
                                        <div class="stat-text">{{ $s['name'] }}</div>
                                        <div class="stat-digit">{{ $s['code'] }}</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        
    @endif

    @if (Auth::user()->level == "Evaluator" || Auth::user()->level == "Ketua Tim" || Auth::user()->level == "Kepala Bidang")
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Data Permohonan SOP 1 yang sudah 3 bulan</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th style="color: black;">Rencana Kegiatan</th>
                                        <th style="color: black;">Pemohon</th>
                                        <th style="color: black;">Evaluator</th>
                                        <th style="color: black;">Tanggal Disahkan</th>
                                        <th style="color: black;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($applications3months10days as $index => $app)
                                        <tr>
                                            <td class="text-muted">{{ $app->name }}</td>
                                            <td class="text-muted">{{ $app->name_applicant }}</td>
                                            <td class="text-muted">{{ $app->user->name }}</td>
                                            <td class="text-muted" style="text-align: center;">{{ date('d M Y', strtotime($app->date_deadline)) }}</td>
                                            <td>
                                                <a href="{{ route('applications.sop1.expired.detail', $app->id) }}" class="btn btn-primary btn-sm"><i class="mdi mdi-magnify"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection

@push('bottom_scripts')
    {{-- Chart JS --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Datatable -->
    <script src="{{ asset('/focus/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>

    <!-- pickdate -->
    <script src="{{ ('/focus/vendor/pickadate/picker.js') }}"></script>
    <script src="{{ ('/focus/vendor/pickadate/picker.time.js') }}"></script>
    <script src="{{ ('/focus/vendor/pickadate/picker.date.js') }}"></script>

    <!-- Pickdate -->
    <script src="{{ ('/focus/js/plugins-init/pickadate-init.js') }}"></script>

    {{-- Validation application create --}}
    <script src="{{ asset('/focus/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script>
        jQuery(".form-valide").validate({
            rules: {
                "name": {
                    required: true,
                    maxlength: 255
                },
                "address_application": {
                    required: true,
                    maxlength: 255
                },
                "name_applicant": {
                    required: true,
                    maxlength: 255
                },
                "date_application": {
                    required: true,
                },
                "sop_id": {
                    required: true,
                },
                "link_file": {
                    required: true,
                    url: true,
                },
                "link_archive": {
                    url: true,
                    maxlength: 255
                },
            },
            messages: {
                "name": {
                    required: "Rencana Kegiatan wajib diisi",
                    maxlength: "Rencana Kegiatan maksimal 255 karakter",
                },
                "address_application": {
                    required: "Lokasi Rencana Kegiatan wajib diisi",
                    maxlength: "Lokasi Rencana Kegiatan maksimal 255 karakter",
                },
                "name_applicant": {
                    required: "Nama Pemohon wajib diisi",
                    maxlength: "Nama Pemohon maksimal 255 karakter",
                },
                "date_application": {
                    required: "Tanggal Permohonan wajib diisi",
                },
                "sop_id": {
                    required: "SOP wajib dipilih",
                },
                "link_file": {
                    required: "Link Berkas Kelengkapan wajib diisi",
                    url: "Format Link Berkas Kelengkapan tidak valid",
                },
                "link_archive": {
                    url: "Format Link Arsip tidak valid",
                    maxlength: "Link Arsip maksimal 255 karakter",
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

    <script>
        let table, tableHistory;

        $(function() {
            table = $('.applications-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('applications.active.data') }}',
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name', name: 'name'},
                    {data: 'code', name: 'code'},
                    {data: 'user_id', name: 'user_id'},
                    {data: 'sisa_waktu', name: 'sisa_waktu'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });

            tableHistory = $('.history-applications-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('history.applications.data') }}',
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name', name: 'name'},
                    {data: 'code', name: 'code'},
                    {data: 'name_applicant', name: 'name_applicant'},
                    {data: 'user_id', name: 'user_id'},
                    {data: 'status', name: 'status'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        });
    </script>

    <script>
        const ctxLineApplicationSop = document.getElementById('myLineChartApplicationSop').getContext('2d');
        const monthsSop = @json($months);
        const dataSop1 = @json($dataSop1);
        const dataSop2 = @json($dataSop2);
        const dataSop3 = @json($dataSop3);
        const dataSop4 = @json($dataSop4);
        const dataSop5 = @json($dataSop5);
        const dataSop6 = @json($dataSop6);
        const dataSop7 = @json($dataSop7);

        new Chart(ctxLineApplicationSop, {
            type: 'line',
            data: {
                labels: monthsSop,
                datasets: [
                    {
                        label: 'SOP 1',
                        data: dataSop1,
                        borderColor: 'rgba(255, 99, 132, 1)',
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        fill: true,
                        tension: 0.1
                    },
                    {
                        label: 'SOP 2',
                        data: dataSop2,
                        borderColor: 'rgba(54, 162, 235, 1)',
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        fill: true,
                        tension: 0.1
                    },
                    {
                        label: 'SOP 3',
                        data: dataSop3,
                        borderColor: 'rgba(255, 206, 86, 1)',
                        backgroundColor: 'rgba(255, 206, 86, 0.2)',
                        fill: true,
                        tension: 0.1
                    },
                    {
                        label: 'SOP 4',
                        data: dataSop4,
                        borderColor: 'rgba(75, 192, 192, 1)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        fill: true,
                        tension: 0.1
                    },
                    {
                        label: 'SOP 5',
                        data: dataSop5,
                        borderColor: 'rgba(153, 102, 255, 1)',
                        backgroundColor: 'rgba(153, 102, 255, 0.2)',
                        fill: true,
                        tension: 0.1
                    },
                    {
                        label: 'SOP 6',
                        data: dataSop6,
                        borderColor: 'rgba(255, 159, 64, 1)',
                        backgroundColor: 'rgba(255, 159, 64, 0.2)',
                        fill: true,
                        tension: 0.1
                    },
                    {
                        label: 'SOP 7',
                        data: dataSop7,
                        borderColor: 'rgba(199, 199, 199, 1)',
                        backgroundColor: 'rgba(199, 199, 199, 0.2)',
                        fill: true,
                        tension: 0.1
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Jumlah Permohonan Berdasarkan SOP Dalam 12 Bulan Terakhir'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        precision: 0
                    }
                }
            }
        });
        
    </script>

    <script>
        const ctxLineApplication = document.getElementById('myLineChartApplication').getContext('2d');
        const months = @json($months);
        const data = @json($dataApp);

        new Chart(ctxLineApplication, {
            type: 'line',
            data: {
                labels: months,
                datasets: [{
                    label: 'Jumlah Permohonan',
                    data: data,
                    borderColor: 'rgba(54, 162, 235, 1)',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    fill: true,
                    tension: 0.1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Jumlah Permohonan Dalam 12 Bulan Terakhir'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        precision: 0
                    }
                }
            }
        });
        
    </script>
@endpush
