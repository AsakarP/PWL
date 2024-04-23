@extends('layouts.master')

@section('web-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Hasil Polling</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Polling</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="card p-4">
                    @if(\Illuminate\Support\Facades\Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif

                    <div class="card-body">
                        <table id="table-kk" class="table table-striped">
                            <thead>
                            <tr>
                                <th>Periode</th>
                                <th>Mulai Polling</th>
                                <th>Akhir Polling</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                        @foreach ($polls as $poll )
                        <tr>
                            <td>{{ $poll->periode }}</td>
                            <td>{{ $poll->mulai_polling }}</td>
                            <td>{{ $poll->akhir_polling }}</td>
                            <td>
                                {{-- <a href="/" class="btn btn-warning" role="button"><i class="fas fa-edit"></i></a> --}}
                                <a href="{{ route('mahasiswa-indexmk', $poll->id) }}" class="btn btn-warning" role="button"><i class="fas fa-edit"></i></a>
                                {{-- <a href="{{ route('mk-delete', $user->id) }}" class="btn btn-danger del-button" role="button"><i class="fas fa-trash"></i></a> --}}
                            </td>
                        </tr>
                        @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection

@section('ExtraCSS')
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.css') }}">
@endsection

@section('ExtraJS')
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
    </script>
    <script src="{{ asset('plugins/sweetalert2/sweetalert2.js') }}"></script>
@endsection