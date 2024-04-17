@extends('template.app')

@section('content')
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            {{-- main content here --}}
            <section style="background-color: #eee;">
                <div class="container py-5">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-body text-center">
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp"
                                        alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                                    <h5 class="my-3">{{ $nama }}</h5>
                                    <p class="text-muted mb-1">{{ $role }}</p>
                                    <p class="text-muted mb-4">{{ $nrp }}</p>
                                    <div class="d-flex justify-content-center mb-2">
                                        <a href="#" class="btn btn-primary" role="button">Edit Profile</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Full Name</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">{{ $nama }}</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Email</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">{{ $email }}</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Role</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"><span
                                                    class="badge bg-primary">{{ $role }}</span></p>
                                        </div>
                                    </div>
                                    @if ($kurikulum)
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <p class="mb-0">Kurikulum</p>
                                            </div>
                                            <div class="col-sm-9">
                                                <p class="text-muted mb-0">{{ $kurikulum }}</p>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
