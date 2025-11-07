@extends('layouts.app')

@section('content')

<h1>{{ $title }}</h1>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover my-0 table-applications-evaluator">
                        <thead>
                            <tr>
                                <th>Nama Permohonan</th>
                                <th>SOP</th>
                                <th>Pemohon</th>
                                <th class="d-none d-md-table-cell">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($applications as $a)
                                <tr>
                                    <td>{{ $a['name'] }}</td>
                                    <td>{{ $a['sop']['name'] }}</td>
                                    <td>{{ $a['name_applicant'] }}</td>
                                    <td class="d-none d-md-table-cell">
                                        <div class="btn-group">
                                            <a href="{{ route('applications.evaluator.detail', $a['id']) }}" class="btn btn-outline-info btn-sm"><i class="align-middle" data-feather="search"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('bottom_scripts')
    <script>
        $(document).ready(function () {
            $('#table-applications-evaluator').DataTable();
        });
    </script>
@endpush