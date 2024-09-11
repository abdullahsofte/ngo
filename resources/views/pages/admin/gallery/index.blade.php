@extends('layouts.admin-master', ['pageName' => 'gallery', 'title' => 'Add Gallery'])
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
                        <div class="card-header">
                            <h4 class="heading"><i class="fas fa-plus"></i> Add a Photo</h4>
                        </div>
                        <div class="card-body">
                            <div class="form">

                                <form action="{{ route('store.gallery') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">

                                        <div class="col-md-12 mb-2">
                                            <div class="row">

                                                <div class="col-md-3 mb-1">
                                                    <label for="title">Title<span class="text-danger">*</span> </label>
                                                </div>
                                                <div class="col-md-9 mb-1">
                                                    <input type="text" name="title"
                                                        class="form-control form-control-sm shadow-none @error('title') is-invalid @enderror"
                                                        id="title" placeholder=" Image title"
                                                        value="{{ old('title') }}">
                                                    @error('title')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="image">Image <span class="text-danger">*</span> </label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input class="form-control form-control-sm" id="image"
                                                        type="file" name="image" onchange="readURL(this);">
                                                        <small>(Size: 600*400 Px)</small>
                                                </div>
                                                <div class="col-md-12 text-center">
                                                    <div class="form-group mb-0">
                                                        <img class="form-controlo img-thumbnail" src="#"
                                                            id="previewImage"
                                                            style="width: 100px;height: 100px; background: #3f4a49;">
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="my-2">
                                            <div class="clearfix mt-1">
                                                <div class="float-md-right">
                                                    <button type="reset"
                                                        class="btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>
                                                    <button type="submit"
                                                        class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
                                                </div>
                                            </div>


                                        </div>

                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <i class="fas fa-list"></i>
                            Gallery List
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center" id="dataTable" width="100%"
                                    cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($galleries as $key=>$user)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $user->title }}</td>
                                                <td><img class="border" style="height: 50px; max-width:50px"
                                                        src="{{ asset('uploads/gallery/' . $user->image) }}" alt="">
                                                </td>
                                                <td>
                                                    <a href="{{ url('gallery/edit/' . $user->id) }}" type="submit"
                                                        class="btn btn-info btn-mod-info btn-sm mr-1"><i
                                                            class="fas fa-edit"></i></button>
                                                        <a href="{{ url('gallery/delete/' . $user->id) }}" type="submit"
                                                            class="btn btn-danger btn-mod-danger btn-sm"
                                                            onclick="return confirmDel()"><i
                                                                class="fas fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5">Data Not Found</td>
                                            </tr>
                                        @endforelse

                                    </tbody>
                                </table>
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
                        .height(100);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        document.getElementById("previewImage").src = "/uploads/no.png";
    </script>
@endpush
