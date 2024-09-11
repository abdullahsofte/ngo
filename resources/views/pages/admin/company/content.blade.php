@extends('layouts.admin-master', ['pageName'=> 'content', 'title' => 'Add Content'])
{{-- @section('title', 'Company Information') --}}
@push('admin-css')
    <link href="{{ asset('summernote/summernote-bs4.min.css') }}" rel="stylesheet">
@endpush
@section('admin-content')
   <!-- Breadcubs Area Start Here -->

   <div class="breadcrumbs-area d-flex justify-content-between">
    <div>
        <h3>Organization Profile</h3>
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
              <div class="card">
                <div class="card-header">
                    <h4 class="heading"><i class="fa fa-plus"></i> Update Organization Information</h4>
                 </div>
                <div class="card-body">
                    <div class="form">
                    
                        <form action="{{ route('company.update', $company) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="name">Organization Name <span class="text-danger">*</span> </label>
                                    <input type="text" name="name" value="{{ $company->name }}" class="form-control form-control-sm shadow-none @error('name') is-invalid @enderror" id="name">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="phone"> Phone <span class="text-danger">*</span> </label>
                                    <input type="text" name="phone" value="{{ $company->phone }}" class="form-control form-control-sm shadow-none @error('phone') is-invalid @enderror" id="phone">
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="email">E-Mail Address <span class="text-danger">*</span></label>
                                    <input type="email" name="email" value="{{ $company->email }}" class="form-control form-control-sm shadow-none @error('email') is-invalid @enderror" id="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="facebook"> Facebook</label>
                                    <input type="url" name="facebook" value="{{ $company->facebook }}" class="form-control form-control-sm shadow-none @error('facebook') is-invalid @enderror" id="facebook">
                                    @error('facebook')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="youtube"> Youtube</label>
                                    <input type="url" name="youtube" value="{{ $company->youtube }}" class="form-control form-control-sm shadow-none @error('youtube') is-invalid @enderror" id="youtube">
                                    @error('youtube')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="twitter"> Twitter</label>
                                    <input type="url" name="twitter" value="{{ $company->twitter }}" class="form-control form-control-sm shadow-none @error('twitter') is-invalid @enderror" id="twitter">
                                    @error('twitter')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="linkedin"> Linkedin</label>
                                    <input type="url" name="linkedin" value="{{ $company->linkedin }}" class="form-control form-control-sm shadow-none @error('linkedin') is-invalid @enderror mb-2" id="linkedin">
                                    @error('linkedin')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                {{-- <div class="col-md-6 mb-2">
                                    <label for="blog_link"> Blog Link</label>
                                    <input type="url" name="blog_link" value="{{ $company->blog_link }}" class="form-control form-control-sm shadow-none @error('blog_link') is-invalid @enderror mb-2" id="blog_link">
                                    @error('blog_link')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div> --}}
              
                        
                                <div class="col-md-6 mb-2">
                                    <label for="f_title"> Tag Line</label>
                                    <input type="text" name="f_title" value="{{ $company->f_title }}" class="form-control form-control-sm shadow-none @error('f_title') is-invalid @enderror mb-2" id="f_title">
                                    @error('f_title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="s_description">Footer Text</label>
                                    <textarea type="text" id="s_description" name="s_description" class="form-control form-control-sm shadow-none @error('s_description') is-invalid @enderror mb-2" rows="5">{{ $company->s_description }}</textarea>
                                    @error('s_description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                             

                                <div class="col-md-6 mb-2">
                                    <label for="map">Google Map</label>
                                    <textarea type="text" id="mapp" name="mapp" class="form-control form-control-sm shadow-none @error('mapp') is-invalid @enderror mb-2" rows="5">{{ $company->mapp }}</textarea>
                                    @error('mapp')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            
                           
                                <div class="col-md-6 mb-2">
                                    <label for="address"> Address <span class="text-danger">*</span></label>
                                    <textarea type="text" id="address" name="address" class="form-control form-control-sm shadow-none @error('address') is-invalid @enderror mb-2" rows="5">{{ $company->address }}</textarea>
                                    {{-- <input type="text" name="address" value="{{ $company->address }}" class="form-control form-control-sm shadow-none @error('address') is-invalid @enderror" id="address"> --}}
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                 <div class="col-md-6 mb-2">
                                    <label for="logo"> Logo</label>
                                    <input class="form-control form-control-sm" id="logo" type="file" name="logo" onchange="readURL(this);">
                                    <div class="form-group my-2">
                                        <img class="form-controlo img-thumbnail" src="#" id="previewImage" style="width: 160px;height: 130px;">
                                    </div>
                                </div> 
                              
                            </div>
                            {{-- <div class="row">
                                <div class="col-md-4 mb-2">
                                    <label for="logo"> Logo</label>
                                    <input class="form-control form-control-sm" id="logo" type="file" name="logo" onchange="readURL(this);">
                                    <div class="form-group my-2">
                                        <img class="form-controlo img-thumbnail" src="#" id="previewImage" style="width: 160px;height: 130px;">
                                    </div>
                                </div>

                            </div> --}}

                            <hr class="mt-0">
                            <div class="clearfix mt-1">
                                <div class="float-md-right">
                                    <button type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>
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
                    .width(160)
                    .height(130);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    document.getElementById("previewImage").src="{{ $company->logo }}";

    // function readAboutURL(input) {
    //     if (input.files && input.files[0]) {
    //         var reader = new FileReader();

    //         reader.onload = function (e) {
    //             $('#previewAboutImage')
    //                 .attr('src', e.target.result)
    //                 .width(160)
    //                 .height(130);
    //         };

    //         reader.readAsDataURL(input.files[0]);
    //     }
    // }
    // document.getElementById("previewAboutImage").src="{{ $company->about_image }}";

    // function readBgURL(input) {
    //     if (input.files && input.files[0]) {
    //         var reader = new FileReader();

    //         reader.onload = function (e) {
    //             $('#previewBgImage')
    //                 .attr('src', e.target.result)
    //                 .width(160)
    //                 .height(130);
    //         };

    //         reader.readAsDataURL(input.files[0]);
    //     }
    // }
    // document.getElementById("previewBgImage").src="{{ $company->bg_image }}";
</script>
@endpush
