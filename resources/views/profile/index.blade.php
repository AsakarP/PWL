@extends('template.app')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <section style="background-color: #eee;">
                <div class="container py-5">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card mb-4">

                                <div class="card-body text-center">
                                    @if (Auth::user()->profile_img)
                                        <img src="{{ asset('storage/' . Auth::user()->profile_img) }}" alt="avatar"
                                            class="rounded-circle img-fluid" style="width: 150px;">
                                    @else
                                        <i class="fa fa-user-circle" style="font-size: 150px;"></i>
                                    @endif
                                    <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                                    <a href="{{ route('delete-profile-photo', ['user' => $nrp]) }}" class="btn btn-primary">
                                        Delete Image </a>
                                    <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                        data-bs-target="#upload">Upload new image</button>
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
        </div>
        <!-- Modal-->
        <div class="modal fade" id="upload" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Upload Profile Photo</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form enctype="multipart/form-data" action="{{ route('update-profile-photo', ['user' => $nrp]) }}"
                        method="post">
                        @csrf
                        <div class="modal-body">

                            <label for="image" class="form-label">Preview Image</label>
                            <img class="img-preview img-fluid mb-3 col-sm-5">
                            <input type="hidden" name="oldImage" value="{{ Auth::user()->profile_img }}">
                            <input class="form-control" type="file" id="image" name="image"
                                onchange="previewImage()">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" id="saveChangesBtn" class="btn btn-primary" disabled>Save
                                changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@section('custom-javascript')
    <script>
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');
            const saveChangesBtn = document.querySelector('#saveChangesBtn');

            if (image.files.length > 0) {
                imgPreview.style.display = 'block';
                const oFReader = new FileReader();
                oFReader.readAsDataURL(image.files[0]);

                oFReader.onload = function(oFREvent) {
                    imgPreview.src = oFREvent.target.result;
                }
                saveChangesBtn.disabled = false;
            } else {
                imgPreview.style.display = 'none';
            }
        }
    </script>
@endsection
@endsection
