@extends('layouts.admin-master', ['pageName' => 'profile', 'title' => 'Profile'])
{{-- @section('title', 'Update Profile') --}}
@push('admin-css')
@endpush
@section('admin-content')
  <!-- Breadcubs Area Start Here -->

  <div class="breadcrumbs-area d-flex justify-content-between">
    <div>
        <h3>Admin Profile Update</h3>
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
            <div class="col-md-12">
               <div class="card height-auto">
                <div class="card-header">
                    <h4 class="heading"><i class="fa fa-user-plus"></i> Update Profile</h4>
                   </div>
                <div class="card-body">
                    <div class="form">
                     
                        <form action="{{ route('register.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="name" class="mb-1"> Name <span class="text-danger">*</span> </label>
                                    <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control form-control-sm shadow-none @error('name') is-invalid @enderror" id="name" placeholder="Enter name">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="phone" class="mb-1">Phone <span class="text-danger">*</span></label>
                                    <input type="number" name="phone" value="{{ Auth::user()->phone }}" class="form-control form-control-sm shadow-none @error('phone') is-invalid @enderror" id="phone" placeholder="Enter Phone Number">
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="email" class="mb-1">E-Mail Address <span class="text-danger">*</span></label>
                                    <input type="email" name="email" value="{{ Auth::user()->email }}" class="form-control form-control-sm shadow-none @error('email') is-invalid @enderror" id="email" placeholder="Enter Email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="username" class="mb-1"> UserName <span class="text-danger">*</span></label>
                                    <input type="text" name="username" value="{{ Auth::user()->username }}" class="form-control form-control-sm shadow-none @error('username') is-invalid @enderror" id="username" placeholder="Enter Username">
                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="image" class="mb-1">User Image</label>
                                    <input class="form-control form-control-sm" id="image" type="file" name="image" onchange="readURL(this);">
                                    <div class="form-group mt-2">
                                        <img class="form-controlo img-thumbnail" src="#" id="previewImage" style="width: 100px;height: 80px; background: #3f4a49;">
                                    </div>
                                </div>
                                {{-- <div class="col-md-6 mb-2">
                                    <label for="image" class="mb-1">Welcome Note</label>
                                    <textarea name="welcome_note" id="editor" cols="30" rows="10"></textarea>

                                </div> --}}
                            </div>

                            <div class="clearfix border-top">
                                <div class="float-md-right mt-2">
                                    <a class="btn-fill-lg bg-blue-dark btn-hover-yellow" href="{{route('register.create')}}">Back</a>
                                    <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Update</button>
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
<script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#previewImage')
                    .attr('src', e.target.result)
                    .width(100)
                    .height(80);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    document.getElementById("previewImage").src="{{ asset(Auth::user()->image) }}";
</script>
@endpush
