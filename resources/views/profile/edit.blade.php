@extends('admin_layout.app')

@push('top_css')
    <!-- Datatable -->
    <link href="{{ asset('/focus/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
@endpush

@section('content')

    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Hi, {{ Auth::user()->name }}! &nbsp; </h4>
                <p class="mb-0">Ini Adalah Halaman Profil Anda</p>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Beranda</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Profile</a></li>
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
                            @if (empty($user->photo))
                                <img class="img-fluid rounded-circle" src="{{ asset('/focus/images/avatar/1.png') }}" alt="">
                            @else
                                <img src="{{ asset('/user/photo/'. Auth::user()->photo) }}" class="img-fluid rounded-circle" alt="">
                            @endif
                        </div>
                    </div>
                    <div class="profile-info ml-5">
                        <div class="row justify-content-center">
                            <div class="col-xl-8">
                                <div class="row">
                                    <div class="col-xl-4 col-sm-4 border-right-1 prf-col">
                                        <div class="profile-name">
                                            <h4 class="text-primary">{{ Auth::user()->name }}</h4>
                                            <p>{{ $user->level }}</p>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-sm-4 border-right-1 prf-col">
                                        <div class="profile-email">
                                            <h4 class="text-muted">{{ $user->email }}</h4>
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
                <div class="card-body">
                    <div class="profile-tab">
                        <div class="custom-tab-1">
                            <ul class="nav nav-tabs">
                                <li class="nav-item"><a href="#profil" data-toggle="tab" class="nav-link active show">Profil</a>
                                </li>
                                <li class="nav-item"><a href="#password" data-toggle="tab" class="nav-link">Password</a>
                                </li>
                                @if (Auth::user()->level == "Evaluator")
                                    <li class="nav-item"><a href="#history" data-toggle="tab" class="nav-link">Histori Permohonan</a>
                                    </li>
                                @endif
                            </ul>
                            <div class="tab-content">
                                <div id="profil" class="tab-pane fade active show">
                                    <div class="my-post-content pt-3">
                                        <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-row">
                                                <div class="form-group col-12">
                                                    <label>Nama</label>
                                                    <input type="text" class="form-control input-rounded" name="name" @error('name') is-invalid @enderror value="{{ $user->name }}">
                                                </div>
                                                <div class="form-group col-12">
                                                    <label>Email</label>
                                                    <input type="text" class="form-control input-rounded" name="email" @error('email') is-invalid @enderror value="{{ $user->email }}">
                                                </div>
                                                <div class="form-group col-12">
                                                    <label>Jabatan</label>
                                                    <input type="text" class="form-control input-rounded" name="level" @error('level') is-invalid @enderror value="{{ $user->level }}" disabled>
                                                </div>
                                                <div class="form-group col-12">
                                                    <label>Foto</label>
                                                    <input type="file" class="form-control input-rounded" name="photo" @error('photo') is-invalid @enderror value="{{ $user->photo }}">
                                                    <input type="hidden" name="current_photo" value="{{ $user->photo }}">
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-sm mt-4">Simpan</button>

                                            
                                        </form>
                                    </div>
                                </div>
                                <div id="password" class="tab-pane fade">
                                    <div class="my-post-content pt-3">
                                        <form action="{{ route('password.update') }}" method="POST">
                                            @csrf
                                            @method('put')
                                            <div class="form-group col-12">
                                                <label>Password Sekarang</label>
                                                <input type="password" class="form-control input-rounded" name="current_password" @error('current_password') is-invalid @enderror>
                                            </div>
                                            <div class="form-group col-12">
                                                <label>Password Baru</label>
                                                <input type="password" class="form-control input-rounded" name="password" @error('password') is-invalid @enderror>
                                            </div>
                                            <div class="form-group col-12">
                                                <label>Konfirmasi Password Baru</label>
                                                <input type="password" class="form-control input-rounded" name="password_confirmation" @error('password_confirmation') is-invalid @enderror>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-sm mt-4">Simpan</button>
                                        </form>
                                    </div>
                                </div>
                                @if (Auth::user()->level == "Evaluator")
                                <div id="history" class="tab-pane fade">
                                    <div class="my-post-content pt-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-profile-history">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-muted">No</th>
                                                                <th class="text-muted">Rencana kegiatan</th>
                                                                <th class="text-muted">SOP</th>
                                                                <th class="text-muted">Nama Pemohon</th>
                                                                <th class="text-muted">Lokasi Rencana Kegiatan</th>
                                                                <th class="text-muted">Tanggal Permohonan</th>
                                                                <th class="text-muted">Status</th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('bottom_scripts')
    <!-- Datatable -->
    <script src="{{ asset('/focus/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/focus/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script>
        jQuery(".form-valide").validate({
            rules: {
                "current_password": {
                    required: true,
                },
                "password": {
                    required: true,
                },
                "password_confirmation": {
                    required: true,
                }
            },
            messages: {
                "current_password": {
                    required: "Password sekarang tidak boleh kosong",
                },
                "password": {
                    required: "Password baru tidak boleh kosong",
                },
                "password_confirmation": {
                    required: "Konfirmasi password baru tidak boleh kosong",
                }
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
        let table;
        $(document).ready(function() {
            table = $('.table-profile-history').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('history.evaluator.profile.applications.data') }}",
                },
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    { data: 'name', name: 'name' },
                    { data: 'sop.code', name: 'sop.code' },
                    { data: 'name_applicant', name: 'name_applicant' },
                    { data: 'address_application', name: 'address_application' },
                    { data: 'date_application', name: 'date_application' },
                    { data: 'status', name: 'status' },
                ],
            });
        });
    </script>
@endpush
