@extends('admin_layout.app')

@push('top_css')
    <!-- Datatable -->
    <link href="{{ asset('/focus/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
@endpush

@section('content')

    @if (Auth::user()->level == 'Ketua Tim' || Auth::user()->level == 'Kepala Bidang')

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Distribusi Permohonan</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th class="text-muted">Evaluator</th>
                                        <th class="text-muted">SOP 1</th>
                                        <th class="text-muted">SOP 2</th>
                                        <th class="text-muted">SOP 3</th>
                                        <th class="text-muted">SOP 4</th>
                                        <th class="text-muted">SOP 5</th>
                                        <th class="text-muted">SOP 6</th>
                                        <th class="text-muted">SOP 7</th>
                                        <th class="text-muted">Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-muted">Ali Muhfid, S.Kom</td>
                                        <td class="text-muted">{{ $sop1ev1 }}</td>
                                        <td class="text-muted">{{ $sop2ev1 }}</td>
                                        <td class="text-muted">{{ $sop3ev1 }}</td>
                                        <td class="text-muted">{{ $sop4ev1 }}</td>
                                        <td class="text-muted">{{ $sop5ev1 }}</td>
                                        <td class="text-muted">{{ $sop6ev1 }}</td>
                                        <td class="text-muted">{{ $sop7ev1 }}</td>
                                        <?php
                                            $deret = [$sop1ev1,$sop2ev1,$sop3ev1,$sop4ev1,$sop5ev1,$sop6ev1,$sop7ev1];
                                            $hasil = array_sum($deret)
                                        ?>
                                        <td class="text-muted">{{ $hasil }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Cecep Angga Nurhamdani</td>
                                        <td class="text-muted">{{ $sop1ev2 }}</td>
                                        <td class="text-muted">{{ $sop2ev2 }}</td>
                                        <td class="text-muted">{{ $sop3ev2 }}</td>
                                        <td class="text-muted">{{ $sop4ev2 }}</td>
                                        <td class="text-muted">{{ $sop5ev2 }}</td>
                                        <td class="text-muted">{{ $sop6ev2 }}</td>
                                        <td class="text-muted">{{ $sop7ev2 }}</td>
                                        <?php
                                            $deret2 = [$sop1ev2,$sop2ev2,$sop3ev2,$sop4ev2,$sop5ev2,$sop6ev2,$sop7ev2];
                                            $hasil2 = array_sum($deret2)
                                        ?>
                                        <td class="text-muted">{{ $hasil2 }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Vindi Nugraha, ST</td>
                                        <td class="text-muted">{{ $sop1ev3 }}</td>
                                        <td class="text-muted">{{ $sop2ev3 }}</td>
                                        <td class="text-muted">{{ $sop3ev3 }}</td>
                                        <td class="text-muted">{{ $sop4ev3 }}</td>
                                        <td class="text-muted">{{ $sop5ev3 }}</td>
                                        <td class="text-muted">{{ $sop6ev3 }}</td>
                                        <td class="text-muted">{{ $sop7ev3 }}</td>
                                        <?php
                                            $deret3 = [$sop1ev3,$sop2ev3,$sop3ev3,$sop4ev3,$sop5ev3,$sop6ev3,$sop7ev3];
                                            $hasil3 = array_sum($deret3)
                                        ?>
                                        <td class="text-muted">{{ $hasil3 }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Depijay</td>
                                        <td class="text-muted">{{ $sop1ev4 }}</td>
                                        <td class="text-muted">{{ $sop2ev4 }}</td>
                                        <td class="text-muted">{{ $sop3ev4 }}</td>
                                        <td class="text-muted">{{ $sop4ev4 }}</td>
                                        <td class="text-muted">{{ $sop5ev4 }}</td>
                                        <td class="text-muted">{{ $sop6ev4 }}</td>
                                        <td class="text-muted">{{ $sop7ev4 }}</td>
                                        <?php
                                            $deret4 = [$sop1ev4,$sop2ev4,$sop3ev4,$sop4ev4,$sop5ev4,$sop6ev4,$sop7ev4];
                                            $hasil4 = array_sum($deret4)
                                        ?>
                                        <td class="text-muted">{{ $hasil4 }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Ade Ismawan</td>
                                        <td class="text-muted">{{ $sop1ev5 }}</td>
                                        <td class="text-muted">{{ $sop2ev5 }}</td>
                                        <td class="text-muted">{{ $sop3ev5 }}</td>
                                        <td class="text-muted">{{ $sop4ev5 }}</td>
                                        <td class="text-muted">{{ $sop5ev5 }}</td>
                                        <td class="text-muted">{{ $sop6ev5 }}</td>
                                        <td class="text-muted">{{ $sop7ev5 }}</td>
                                        <?php
                                            $deret5 = [$sop1ev5,$sop2ev5,$sop3ev5,$sop4ev5,$sop5ev5,$sop6ev5,$sop7ev5];
                                            $hasil5 = array_sum($deret5)
                                        ?>
                                        <td class="text-muted">{{ $hasil5 }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Rina Khoirina SNB, S.T.</td>
                                        <td class="text-muted">{{ $sop1ev6 }}</td>
                                        <td class="text-muted">{{ $sop2ev6 }}</td>
                                        <td class="text-muted">{{ $sop3ev6 }}</td>
                                        <td class="text-muted">{{ $sop4ev6 }}</td>
                                        <td class="text-muted">{{ $sop5ev6 }}</td>
                                        <td class="text-muted">{{ $sop6ev6 }}</td>
                                        <td class="text-muted">{{ $sop7ev6 }}</td>
                                        <?php
                                            $deret6 = [$sop1ev6,$sop2ev6,$sop3ev6,$sop4ev6,$sop5ev6,$sop6ev6,$sop7ev6];
                                            $hasil6 = array_sum($deret6)
                                        ?>
                                        <td class="text-muted">{{ $hasil6 }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Aruni Naufalia Akbar, S.T.</td>
                                        <td class="text-muted">{{ $sop1ev7 }}</td>
                                        <td class="text-muted">{{ $sop2ev7 }}</td>
                                        <td class="text-muted">{{ $sop3ev7 }}</td>
                                        <td class="text-muted">{{ $sop4ev7 }}</td>
                                        <td class="text-muted">{{ $sop5ev7 }}</td>
                                        <td class="text-muted">{{ $sop6ev7 }}</td>
                                        <td class="text-muted">{{ $sop7ev7 }}</td>
                                        <?php
                                            $deret7 = [$sop1ev7,$sop2ev7,$sop3ev7,$sop4ev7,$sop5ev7,$sop6ev7,$sop7ev7];
                                            $hasil7 = array_sum($deret7)
                                        ?>
                                        <td class="text-muted">{{ $hasil7 }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Heilia Nur Ruhenda, S.T., M.T.</td>
                                        <td class="text-muted">{{ $sop1ev8 }}</td>
                                        <td class="text-muted">{{ $sop2ev8 }}</td>
                                        <td class="text-muted">{{ $sop3ev8 }}</td>
                                        <td class="text-muted">{{ $sop4ev8 }}</td>
                                        <td class="text-muted">{{ $sop5ev8 }}</td>
                                        <td class="text-muted">{{ $sop6ev8 }}</td>
                                        <td class="text-muted">{{ $sop7ev8 }}</td>
                                        <?php
                                            $deret8 = [$sop1ev8,$sop2ev8,$sop3ev8,$sop4ev8,$sop5ev8,$sop6ev8,$sop7ev8];
                                            $hasil8 = array_sum($deret8)
                                        ?>
                                        <td class="text-muted">{{ $hasil8 }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Kingkin Hanif Robani H, S.Pd., M.P.W.K</td>
                                        <td class="text-muted">{{ $sop1ev9 }}</td>
                                        <td class="text-muted">{{ $sop2ev9 }}</td>
                                        <td class="text-muted">{{ $sop3ev9 }}</td>
                                        <td class="text-muted">{{ $sop4ev9 }}</td>
                                        <td class="text-muted">{{ $sop5ev9 }}</td>
                                        <td class="text-muted">{{ $sop6ev9 }}</td>
                                        <td class="text-muted">{{ $sop7ev9 }}</td>
                                        <?php
                                            $deret9 = [$sop1ev9,$sop2ev9,$sop3ev9,$sop4ev9,$sop5ev9,$sop6ev9,$sop7ev9];
                                            $hasil9 = array_sum($deret9)
                                        ?>
                                        <td class="text-muted">{{ $hasil9 }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Elsa Khairunisa, S.T.</td>
                                        <td class="text-muted">{{ $sop1ev10 }}</td>
                                        <td class="text-muted">{{ $sop2ev10 }}</td>
                                        <td class="text-muted">{{ $sop3ev10 }}</td>
                                        <td class="text-muted">{{ $sop4ev10 }}</td>
                                        <td class="text-muted">{{ $sop5ev10 }}</td>
                                        <td class="text-muted">{{ $sop6ev10 }}</td>
                                        <td class="text-muted">{{ $sop7ev10 }}</td>
                                        <?php
                                            $deret10 = [$sop1ev10,$sop2ev10,$sop3ev10,$sop4ev10,$sop5ev10,$sop6ev10,$sop7ev10];
                                            $hasil10 = array_sum($deret10)
                                        ?>
                                        <td class="text-muted">{{ $hasil10 }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Hikmah Windu Jati, S.T.</td>
                                        <td class="text-muted">{{ $sop1ev11 }}</td>
                                        <td class="text-muted">{{ $sop2ev11 }}</td>
                                        <td class="text-muted">{{ $sop3ev11 }}</td>
                                        <td class="text-muted">{{ $sop4ev11 }}</td>
                                        <td class="text-muted">{{ $sop5ev11 }}</td>
                                        <td class="text-muted">{{ $sop6ev11 }}</td>
                                        <td class="text-muted">{{ $sop7ev11 }}</td>
                                        <?php
                                            $deret11 = [$sop1ev11,$sop2ev11,$sop3ev11,$sop4ev11,$sop5ev11,$sop6ev11,$sop7ev11];
                                            $hasil11 = array_sum($deret11)
                                        ?>
                                        <td class="text-muted">{{ $hasil11 }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Nusrat Martha Utami, A.md.</td>
                                        <td class="text-muted">{{ $sop1ev12 }}</td>
                                        <td class="text-muted">{{ $sop2ev12 }}</td>
                                        <td class="text-muted">{{ $sop3ev12 }}</td>
                                        <td class="text-muted">{{ $sop4ev12 }}</td>
                                        <td class="text-muted">{{ $sop5ev12 }}</td>
                                        <td class="text-muted">{{ $sop6ev12 }}</td>
                                        <td class="text-muted">{{ $sop7ev12 }}</td>
                                        <?php
                                            $deret12 = [$sop1ev12,$sop2ev12,$sop3ev12,$sop4ev12,$sop5ev12,$sop6ev12,$sop7ev12];
                                            $hasil12 = array_sum($deret12)
                                        ?>
                                        <td class="text-muted">{{ $hasil12 }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted">Devirda J, S. P. W. K.</td>
                                        <td class="text-muted">{{ $sop1ev13 }}</td>
                                        <td class="text-muted">{{ $sop2ev13 }}</td>
                                        <td class="text-muted">{{ $sop3ev13 }}</td>
                                        <td class="text-muted">{{ $sop4ev13 }}</td>
                                        <td class="text-muted">{{ $sop5ev13 }}</td>
                                        <td class="text-muted">{{ $sop6ev13 }}</td>
                                        <td class="text-muted">{{ $sop7ev13 }}</td>
                                        <?php
                                            $deret13 = [$sop1ev13,$sop2ev13,$sop3ev13,$sop4ev13,$sop5ev13,$sop6ev13,$sop7ev13];
                                            $hasil13 = array_sum($deret13)
                                        ?>
                                        <td class="text-muted">{{ $hasil13 }}</td>
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
                        <h5 class="card-title">Label Keterangan SOP</h5>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-info alert-dismissible fade show">
                            <div class="table-responsive">
                                <table class="table table-responsive-sm">
                                    <tbody>
                                        @foreach ($sop as $s)
                                            <tr>
                                                <th class="text-muted">{{ $s['code'] }}</th>
                                                <td class="text-muted">{{ $s['name'] }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
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
                            Data Permohonan
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
                                        <th>Evaluator</th>
                                        <th>Sisa Waktu</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($applicationKatim as $key => $value)
                                        <tr>
                                            <td class="text-muted">{{ $key+1 }}</td>
                                            <td class="text-muted">{{ $value['name'] }}</td>
                                            <td class="text-muted">{{ $value['sop']['code'] }}</td>

                                            @if ($value['user_id'] == null)
                                                <td class="text-muted"><span class="badge bg-warning text-muted">Not Assign</span></td>
                                            @else
                                                <td class="text-muted">{{ $value['user']['name'] }}</td>
                                            @endif

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

                                            <td>
                                                <a href="{{ route('applications.detail', $value['id']) }}" class="btn btn-outline-primary btn-sm"><i class="mdi mdi-magnify"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
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

    @endif
    


    {{-- <div class="row">
        <div class="col-xl-8 col-lg-8 col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Sales Overview</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-12 col-lg-8">
                            <div id="morris-bar-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <div class="m-t-10">
                        <h4 class="card-title">Customer Feedback</h4>
                        <h2 class="mt-3">385749</h2>
                    </div>
                    <div class="widget-card-circle mt-5 mb-5" id="info-circle-card">
                        <i class="ti-control-shuffle pa"></i>
                    </div>
                    <ul class="widget-line-list m-b-15">
                        <li class="border-right">92% <br><span class="text-success"><i
                                    class="ti-hand-point-up"></i> Positive</span></li>
                        <li>8% <br><span class="text-danger"><i
                                    class="ti-hand-point-down"></i>Negative</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Project</h4>
                </div>
                <div class="card-body">
                    <div class="current-progress">
                        <div class="progress-content py-2">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="progress-text">Website</div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="current-progressbar">
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-primary w-40" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                                                40%
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="progress-content py-2">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="progress-text">Android</div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="current-progressbar">
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-primary w-60" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">
                                                60%
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="progress-content py-2">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="progress-text">Ios</div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="current-progressbar">
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-primary w-70" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">
                                                70%
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="progress-content py-2">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="progress-text">Mobile</div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="current-progressbar">
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-primary w-90" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
                                                90%
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
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="testimonial-widget-one p-17">
                        <div class="testimonial-widget-one owl-carousel owl-theme">
                            <div class="item">
                                <div class="testimonial-content">
                                    <div class="testimonial-text">
                                        <i class="fa fa-quote-left"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.
                                        consectetur adipisicing elit.
                                        <i class="fa fa-quote-right"></i>
                                    </div>
                                    <div class="media">
                                        <div class="media-body">
                                            <div class="testimonial-author">TYRION LANNISTER</div>
                                            <div class="testimonial-author-position">Founder-Ceo. Dell Corp
                                            </div>
                                        </div>
                                        <img class="testimonial-author-img ml-3" src="./images/avatar/1.png" alt="" />
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="testimonial-content">
                                    <div class="testimonial-text">
                                        <i class="fa fa-quote-left"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.
                                        consectetur adipisicing elit.
                                        <i class="fa fa-quote-right"></i>
                                    </div>
                                    <div class="media">
                                        <div class="media-body">
                                            <div class="testimonial-author">TYRION LANNISTER</div>
                                            <div class="testimonial-author-position">Founder-Ceo. Dell Corp
                                            </div>
                                        </div>
                                        <img class="testimonial-author-img ml-3" src="./images/avatar/1.png" alt="" />
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="testimonial-content">
                                    <div class="testimonial-text">
                                        <i class="fa fa-quote-left"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.
                                        consectetur adipisicing elit.
                                        <i class="fa fa-quote-right"></i>
                                    </div>
                                    <div class="media">
                                        <div class="media-body">
                                            <div class="testimonial-author">TYRION LANNISTER</div>
                                            <div class="testimonial-author-position">Founder-Ceo. Dell Corp
                                            </div>
                                        </div>
                                        <img class="testimonial-author-img ml-3" src="./images/avatar/1.png" alt="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Web Server</h4>
                </div>
                <div class="card-body">
                    <div class="cpu-load-chart">
                        <div id="cpu-load" class="cpu-load"></div>
                    </div>
                </div>
            </div>
            <!-- /# card -->
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Country</h4>
                </div>
                <div class="card-body">
                    <div id="vmap13" class="vmap"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">New Orders</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Product</th>
                                    <th>quantity</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="round-img">
                                            <a href=""><img width="35" src="./images/avatar/1.png" alt=""></a>
                                        </div>
                                    </td>
                                    <td>Lew Shawon</td>
                                    <td><span>Dell-985</span></td>
                                    <td><span>456 pcs</span></td>
                                    <td><span class="badge badge-success">Done</span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="round-img">
                                            <a href=""><img width="35" src="./images/avatar/1.png" alt=""></a>
                                        </div>
                                    </td>
                                    <td>Lew Shawon</td>
                                    <td><span>Asus-565</span></td>
                                    <td><span>456 pcs</span></td>
                                    <td><span class="badge badge-warning">Pending</span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="round-img">
                                            <a href=""><img width="35" src="./images/avatar/1.png" alt=""></a>
                                        </div>
                                    </td>
                                    <td>lew Shawon</td>
                                    <td><span>Dell-985</span></td>
                                    <td><span>456 pcs</span></td>
                                    <td><span class="badge badge-success">Done</span></td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="round-img">
                                            <a href=""><img width="35" src="./images/avatar/1.png" alt=""></a>
                                        </div>
                                    </td>
                                    <td>Lew Shawon</td>
                                    <td><span>Asus-565</span></td>
                                    <td><span>456 pcs</span></td>
                                    <td><span class="badge badge-warning">Pending</span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="round-img">
                                            <a href=""><img width="35" src="./images/avatar/1.png" alt=""></a>
                                        </div>
                                    </td>
                                    <td>lew Shawon</td>
                                    <td><span>Dell-985</span></td>
                                    <td><span>456 pcs</span></td>
                                    <td><span class="badge badge-success">Done</span></td>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="round-img">
                                            <a href=""><img width="35" src="./images/avatar/1.png" alt=""></a>
                                        </div>
                                    </td>
                                    <td>Lew Shawon</td>
                                    <td><span>Asus-565</span></td>
                                    <td><span>456 pcs</span></td>
                                    <td><span class="badge badge-warning">Pending</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-xl-4 col-xxl-6 col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Timeline</h4>
                </div>
                <div class="card-body">
                    <div class="widget-timeline">
                        <ul class="timeline">
                            <li>
                                <div class="timeline-badge primary"></div>
                                <a class="timeline-panel text-muted" href="#">
                                    <span>10 minutes ago</span>
                                    <h6 class="m-t-5">Youtube, a video-sharing website, goes live.</h6>
                                </a>
                            </li>

                            <li>
                                <div class="timeline-badge warning">
                                </div>
                                <a class="timeline-panel text-muted" href="#">
                                    <span>20 minutes ago</span>
                                    <h6 class="m-t-5">Mashable, a news website and blog, goes live.</h6>
                                </a>
                            </li>

                            <li>
                                <div class="timeline-badge danger">
                                </div>
                                <a class="timeline-panel text-muted" href="#">
                                    <span>30 minutes ago</span>
                                    <h6 class="m-t-5">Google acquires Youtube.</h6>
                                </a>
                            </li>

                            <li>
                                <div class="timeline-badge success">
                                </div>
                                <a class="timeline-panel text-muted" href="#">
                                    <span>15 minutes ago</span>
                                    <h6 class="m-t-5">StumbleUpon is acquired by eBay. </h6>
                                </a>
                            </li>

                            <li>
                                <div class="timeline-badge warning">
                                </div>
                                <a class="timeline-panel text-muted" href="#">
                                    <span>20 minutes ago</span>
                                    <h6 class="m-t-5">Mashable, a news website and blog, goes live.</h6>
                                </a>
                            </li>

                            <li>
                                <div class="timeline-badge dark">
                                </div>
                                <a class="timeline-panel text-muted" href="#">
                                    <span>20 minutes ago</span>
                                    <h6 class="m-t-5">Mashable, a news website and blog, goes live.</h6>
                                </a>
                            </li>

                            <li>
                                <div class="timeline-badge info">
                                </div>
                                <a class="timeline-panel text-muted" href="#">
                                    <span>30 minutes ago</span>
                                    <h6 class="m-t-5">Google acquires Youtube.</h6>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-xxl-6 col-lg-6 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Todo</h4>
                </div>
                <div class="card-body px-0">
                    <div class="todo-list">
                        <div class="tdl-holder">
                            <div class="tdl-content widget-todo mr-4">
                                <ul id="todo_list">
                                    <li><label><input type="checkbox"><i></i><span>Get up</span><a href='#'
                                                class="ti-trash"></a></label></li>
                                    <li><label><input type="checkbox" checked><i></i><span>Stand up</span><a
                                                href='#' class="ti-trash"></a></label></li>
                                    <li><label><input type="checkbox"><i></i><span>Don't give up the
                                                fight.</span><a href='#' class="ti-trash"></a></label></li>
                                    <li><label><input type="checkbox" checked><i></i><span>Do something
                                                else</span><a href='#' class="ti-trash"></a></label></li>
                                    <li><label><input type="checkbox" checked><i></i><span>Stand up</span><a
                                                href='#' class="ti-trash"></a></label></li>
                                    <li><label><input type="checkbox"><i></i><span>Don't give up the
                                                fight.</span><a href='#' class="ti-trash"></a></label></li>
                                </ul>
                            </div>
                            <div class="px-4">
                                <input type="text" class="tdl-new form-control" placeholder="Write new item and hit 'Enter'...">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-xxl-6 col-xl-4 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Product Sold</h4>
                    <div class="card-action">
                        <div class="dropdown custom-dropdown">
                            <div data-toggle="dropdown">
                                <i class="ti-more-alt"></i>
                            </div>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">Option 1</a>
                                <a class="dropdown-item" href="#">Option 2</a>
                                <a class="dropdown-item" href="#">Option 3</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart py-4">
                        <canvas id="sold-product"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12 col-xxl-6 col-lg-6 col-md-12">
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-sm-6 col-xxl-6 col-md-6">
                    <div class="card">
                        <div class="social-graph-wrapper widget-facebook">
                            <span class="s-icon"><i class="fa fa-facebook"></i></span>
                        </div>
                        <div class="row">
                            <div class="col-6 border-right">
                                <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                    <h4 class="m-1"><span class="counter">89</span> k</h4>
                                    <p class="m-0">Friends</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                    <h4 class="m-1"><span class="counter">119</span> k</h4>
                                    <p class="m-0">Followers</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-sm-6 col-xxl-6 col-md-6">
                    <div class="card">
                        <div class="social-graph-wrapper widget-linkedin">
                            <span class="s-icon"><i class="fa fa-linkedin"></i></span>
                        </div>
                        <div class="row">
                            <div class="col-6 border-right">
                                <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                    <h4 class="m-1"><span class="counter">89</span> k</h4>
                                    <p class="m-0">Friends</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                    <h4 class="m-1"><span class="counter">119</span> k</h4>
                                    <p class="m-0">Followers</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-sm-6 col-xxl-6 col-md-6">
                    <div class="card">
                        <div class="social-graph-wrapper widget-googleplus">
                            <span class="s-icon"><i class="fa fa-google-plus"></i></span>
                        </div>
                        <div class="row">
                            <div class="col-6 border-right">
                                <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                    <h4 class="m-1"><span class="counter">89</span> k</h4>
                                    <p class="m-0">Friends</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                    <h4 class="m-1"><span class="counter">119</span> k</h4>
                                    <p class="m-0">Followers</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-sm-6 col-xxl-6 col-md-6">
                    <div class="card">
                        <div class="social-graph-wrapper widget-twitter">
                            <span class="s-icon"><i class="fa fa-twitter"></i></span>
                        </div>
                        <div class="row">
                            <div class="col-6 border-right">
                                <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                    <h4 class="m-1"><span class="counter">89</span> k</h4>
                                    <p class="m-0">Friends</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                    <h4 class="m-1"><span class="counter">119</span> k</h4>
                                    <p class="m-0">Followers</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

@endsection

@push('bottom_scripts')
    <!-- Datatable -->
    <script src="{{ asset('/focus/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/focus/js/plugins-init/datatables.init.js') }}"></script>
@endpush
