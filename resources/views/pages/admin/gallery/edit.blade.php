@extends('layouts.admin-master', ['pageName' => 'gallery', 'title' => 'Edit Gallery'])
{{-- @section('title', 'gallery') --}}
@push('admin-css')
@endpush
@section('admin-content')
    <!-- Breadcubs Area Start Here -->

    <div class="breadcrumbs-area d-flex justify-content-between">
        <div>
            <h3>Admin Photo Gallery</h3>
        </div>
        <div class="">
            <ul>
                <li>
                    <a href="{{ route('dashboard') }}">Home</a>
                </li>
                <li>Admin</li>
            </ul>
        </div>

    </div>
    <!-- Breadcubs Area End Here -->
    <main>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card height-auto">
                        <div class="card-body">
                            <div class="form-area">
                                <h4 class="heading"><i class="fas fa-edit"></i> Edit Photo</h4>
                                <form action="{{ route('update.gallery', $gallery->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12 mb-2">
                                            <label for="title"> Title <span class="text-danger">*</span> </label>
                                            <input type="text" name="title"
                                                class="form-control form-control-sm shadow-none @error('title') is-invalid @enderror"
                                                id="title" placeholder="Enter Image Name" value="{{ $gallery->title }}">
                                            @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label for="image">Image</label>
                                            <input class="form-control form-control-sm" id="image" type="file"
                                                name="image" onchange="readURL(this);">
                                                <small>(Size: 600*400 Px)</small>
                                            <div class="form-group mt-2">
                                                <img class="form-controlo img-thumbnail" src="#" id="previewImage"
                                                    style="width: 100px;height: 80px; background: #3f4a49;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix border-top">
                                        <div class="float-md-right mt-2">
                                            <button type="submit"
                                                class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Update</button>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@push('admin-js')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#previewImage')
                        .attr('src', e.target.result)
                        .width(100)
                        .height(80);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        @if (isset($gallery->image))
            document.getElementById("previewImage").src = "/uploads/gallery/{{ $gallery->image }}";
        @else
            document.getElementById("previewImage").src = "/uploads/no.png";
        @endif

        document.getElementById("prev").onclick = function() {
            location.href = "{{ route('gallery') }}";
        };
    </script>
@endpush
