@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h2>
                    {{ $application['name'] }}
                </h2>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>SOP</th>
                        <td>{{ $application['sop']['name'] }}</td>
                    </tr>
                    <tr>
                        <th>Nama Pemohon</th>
                        <td>{{ $application['name_applicant'] }}</td>
                    </tr>
                    <tr>
                        <th>Alamat Pemohon</th>
                        <td>{{ $application['address_applicant'] }}</td>
                    </tr>
                    <tr>
                        <th>Link Berkas Kelengkapan</th>
                        <td><a href="{{ $application['link_file'] }}" target="_blank">{{ $application['link_file'] }}</a></td>
                    </tr>
                    <tr>
                        <th>Berkas Kelengkapan</th>
                        <td><a href="{{ asset('/file/berkas_permohonan/' . $application['documents']) }}" target="_blank">{{ $application['documents'] }}</a></td>
                    </tr>
                    <tr>
                        <th>Tanggal Input Permohonan</th>
                        <td>{{ date('d M Y', strtotime($application['created_at'])) }}</td>
                    </tr>
                    <tr>
                        <th>Status Saat ini</th>
                        @if ($application['sop_id'] == 1)
                            @if ($application['status_9'] != '')
                                <td>Produk gambar, rekomendasi dan excel siteplan</td>
                            @elseif ($application['status_8'] != '')
                                <td>Produk gambar, rekomendasi dan excel siteplan yang telah di sah kan oleh Kepala Dinas Pekerjaan Umum dan Penataan Ruang</td>
                            @elseif ($application['status_7'] != '')
                                <td>Produk gambar, rekomendasi dan excel siteplan yang telah di sah kan oleh Ketua Tim dan Kepala Bidang Penataan Ruang</td>
                            @elseif ($application['status_6'] != '')
                                <td>Pengesahan dari Kepala Bidang Penataan Ruang</td>
                            @elseif ($application['status_5'] != '')
                                <td>Hasil kajian dan hasil peninjauan lapangan yang sudah direvisi sesuai catatan rekomendasi berita acara pembahasan</td>
                            @elseif ($application['status_4'] != '')
                                <td>Berita Acara Pembahasan</td>
                            @elseif ($application['status_3'] != '')
                                <td>Draft Berita Acara Rapat Pembahasan</td>
                            @elseif ($application['status_2'] != '')
                                <td>Hasil Kajian dan Hasil Peninjauan Lapangan </td>
                            @elseif ($application['status_1'] != '')
                                <td>File AutoCAD Siteplan, RTRW, dan Ketentuan Teknis terkait lainnya</td>
                            @endif
                        @endif
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

@if ($application['sop_id'] == 1)
    <form action="{{ route('applications.evaluator.update', $application['id']) }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">

                        <h5 class="card-title mb-0">Progres Pengerjaan SOP</h5>
                    </div>
                    <div class="card-body h-100">

                        <div class="d-flex align-items-start">
                            <div class="alert alert-primary" role="alert">
                                Kajian dan peninjauan lapangan siteplan
                            </div>
                            <div>
                                <input type="checkbox" value="1" @if ($application['status_1'] != '') checked @endif>
                            </div>
                        </div>

                        <hr />
                        <div class="d-flex align-items-start">
                            <div class="alert alert-primary" role="alert">
                                Rapat pembahasan oleh pemohon bersama tim teknis
                            </div>
                            <input type="checkbox" value="1" @if ($application['status_2'] != '') checked @endif>
                        </div>

                        <hr />
                        <div class="d-flex align-items-start">
                            <div class="alert alert-primary" role="alert">
                                Pembuatan berita acara rapat pembahasan
                            </div>
                            <input type="checkbox" value="1" @if ($application['status_3'] != '') checked @endif>
                        </div>

                        <hr />
                        <div class="d-flex align-items-start">
                            <div class="alert alert-primary" role="alert">
                                Revisi  hasil kajian dan hasil peninjauan lapangan
                            </div>
                            <input type="checkbox" value="1" @if ($application['status_4'] != '') checked @endif>
                        </div>

                        <hr />
                        <div class="d-flex align-items-start">
                            <div class="alert alert-primary" role="alert">
                                Verifikasi hasil kajian dan hasil peninjauan lapangan yang sudah direvisi sesuai catatan rekomendasi berita acara pembahasan
                            </div>
                            <input type="checkbox" value="1" @if ($application['status_5'] != '') checked @endif>
                        </div>

                        <hr />
                        <div class="d-flex align-items-start">
                            <div class="alert alert-primary" role="alert">
                                Verifikasi hasil kajian dan hasil peninjauan lapangan yang sudah direvisi sesuai catatan rekomendasi berita acara pembahasan
                            </div>
                            <input type="checkbox" value="1" @if ($application['status_6'] != '') checked @endif>
                        </div>

                        <hr />
                        <div class="d-flex align-items-start">
                            <div class="alert alert-primary" role="alert">
                                Evaluasi dengan Ketua Tim dan Kepala Bidang Penataan Ruang 
                            </div>
                            <input type="checkbox" value="1" @if ($application['status_7'] != '') checked @endif>
                        </div>

                        <hr />
                        <div class="d-flex align-items-start">
                            <div class="alert alert-primary" role="alert">
                                Pengesahan rekomendasi teknis Siteplan dan oleh Kepala Dinas Pekerjaan Umum dan Penataan Ruang  
                            </div>
                            <input type="checkbox" value="1" @if ($application['status_8'] != '') checked @endif>
                        </div>

                        <hr />
                        <div class="d-flex align-items-start">
                            <div class="alert alert-primary" role="alert">
                                Pemberian Nomor, Tanggal, dan Cap Dinas lalu diarsipkan (Selesai)
                            </div>
                            <input type="checkbox" value="1" @if ($application['status_9'] != '') checked @endif>
                        </div>

                        <hr />
                        
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
    
@endif


@endsection