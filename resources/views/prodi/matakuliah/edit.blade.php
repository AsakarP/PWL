@extends('layouts.master')

@section('web-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Matakuliah</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Roles</li>
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
                    <div class="card-body">

                    @if($errors->any())
                        <div class="alert alert-danger">
                            {{ implode('', $errors->all(':message')) }}
                        </div>
                    @endif

                        <form method="Post" action="{{ route('mk-update', ['id' => $mk->id]) }}">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label>Kode MK</label>
                                <input type="text" class="form-control" 
                                       placeholder="Contoh: IN242" name="kode_mk" required autofocus
                                       maxlength="5" value="{{ $mk->kode_mk }}">
                            </div>
                            <div class="form-group">
                                <label>Nama MK</label>
                                <input type="text" class="form-control" 
                                       placeholder="Contoh: Pemrograman Web Lanjut" name="nama_mk" required autofocus
                                       maxlength="32" value="{{ $mk->nama_mk }}">
                            </div>
                            <div class="form-group">
                                <label>SKS</label>
                                <input type="text" class="form-control" 
                                       placeholder="Contoh: 2" name="sks" required autofocus
                                       maxlength="2" value="{{ $mk->sks }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

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
