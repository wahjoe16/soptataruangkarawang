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
                <li class="breadcrumb-item active"><a href="{{ route('users.index') }}">User</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Detail User</a></li>
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
                                <img src="{{ asset('/user/photo/'. $user->photo) }}" class="img-fluid rounded-circle" alt="">
                            @endif
                        </div>
                    </div>
                    <div class="profile-info">
                        <div class="row justify-content-center">
                            <div class="col-xl-8">
                                <div class="row">
                                    <div class="col-xl-4 col-sm-4 border-right-1 prf-col">
                                        <div class="profile-name">
                                            <h4 class="text-primary">{{ $user->name }}</h4>
                                            <p>{{ $user->level }}</p>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-sm-4 border-right-1 prf-col">
                                        <div class="profile-email">
                                            <h4 class="text-muted">{{ $user->email }}</h4>
                                            <p>Email</p>
                                        </div>
                                    </div>
                                    <!-- <div class="col-xl-4 col-sm-4 prf-col">
                                        <div class="profile-call">
                                            <h4 class="text-muted">(+1) 321-837-1030</h4>
                                            <p>Phone No.</p>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-titile">
                        Detail Profil {{ $user->name }}
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-sm">
                            <tbody>
                                <tr>
                                    <th class="text-muted">Nama</th>
                                    <td class="text-muted">{{ $user['name'] }}</td>
                                </tr>
                                <tr>
                                    <th class="text-muted">NIP</th>
                                    <td class="text-muted">{{ $user['nip'] }}</td>
                                </tr>
                                <tr>
                                    <th class="text-muted">Email</th>
                                    <td class="text-muted">{{ $user['email'] }}</td>
                                </tr>
                                <tr>
                                    <th class="text-muted">Jabatan</th>
                                    <td class="text-muted">{{ $user['level'] }}</td>
                                </tr>
                                <tr>
                                    <th class="text-muted">Status</th>
                                    @if ($user['status'] == 1)
                                        <td class="text-muted"><span class="badge badge-pill badge-success">Aktif</span></td>
                                    @else
                                        <td class="text-muted"><span class="badge badge-pill badge-danger">Non Aktif</span></td>
                                    @endif
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            
        </div>
    </div>
    <div class="row mb-5">
        <div class="col-md-8">
            <form action="{{ route('users.resetPassword', $user['id']) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary btn-sm">Reset Password</button>
            </form>
        </div>
    </div>

@endsection