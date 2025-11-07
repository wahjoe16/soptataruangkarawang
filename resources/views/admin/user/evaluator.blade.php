@extends('layouts.app')

@section('content')

    <h1 class="h3 mb-3">{{ $title }}</h1>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div>
                        {{-- <a href="{{ route('users.create') }}" class="btn btn-success btn-sm"><i class="align-middle" data-feather="user-plus"></i> Tambah Data</a> --}}
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover my-0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th class="d-none d-xl-table-cell">SOP1</th>
                                <th>SOP2</th>
                                <th class="d-none d-xl-table-cell">SOP3</th>
                                <th>SOP4</th>
                                <th class="d-none d-md-table-cell">SOP5</th>
                                <th>SOP6</th>
                                <th>SOP7</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($evaluator as $key => $e)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $e['name'] }}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection