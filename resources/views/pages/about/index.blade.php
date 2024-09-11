@extends('layouts.admin-master', ['pageName'=> 'content', 'title' => 'About Update'])

@section('admin-content')
   <!-- Breadcubs Area Start Here -->

   <div class="breadcrumbs-area d-flex justify-content-between">
    <div>
        <h3> About Us</h3>
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
                <div class="card-body">
                    <div class="form">
                       <div class="card-header">
                        <h4 class="heading"><i class="fa fa-plus"></i> Update  About Us</h4>
                       </div>
                        <form action="{{ route('update.about', $company) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                               
                                <div class="col-md-6 mb-2">
                                    <label for="about" class="mt-2"> About Us Title</label>
                                    <input class="form-control form-control-sm @error('about_title') is-invalid @enderror"
                                    id="about_title" type="text" name="about_title"
                                    value="{{$company->about_title}}" placeholder=" About us title">
                              
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label for="about" class="mt-2"> About Us</label>
                                    <textarea class="form-control form-control-sm" name="about" id="editor" cols="4" rows="4">{{ $company->about }}</textarea>
                                    @error('about')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="about" class="mt-2"> Mission Us Title</label>
                                    <input class="form-control form-control-sm @error('mission_title') is-invalid @enderror"
                                    id="mission_title" type="text" name="mission_title"
                                    value="{{$company->mission_title}}" placeholder=" Mission vison title">
                              
                                </div>
                               
                                <div class="col-md-12 mb-2">
                                    <label for="about" class="mt-2"> Mission Vison</label>
                                    <textarea class="form-control form-control-sm" name="mission_vison" id="editor1" cols="4" rows="4">{{ $company->mission_vison }}</textarea>
                                    @error('mission_vison')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                            
                                <div class="col-md-4 mb-2">
                                    <label for="about_image">Mision Vision Image <small>(Size: 800px x 440px)</small></label>
                                    <input class="form-control form-control-sm" id="about_image" type="file" name="about_image" onchange="readAboutURL(this);">
                                    <div class="form-group mt-2">
                                        <img class="form-controlo img-thumbnail" src="#" id="previewAboutImage" style="width: 160px;height: 130px;">
                                    </div>
                                </div>
                                {{-- <div class="col-md-4 mb-2">
                                    <label for="bg_image">About Image 2</label>
                                    <input class="form-control form-control-sm" id="bg_image" type="file" name="bg_image" onchange="readBgURL(this);">
                                    <div class="form-group mt-2">
                                        <img class="form-controlo img-thumbnail" src="#" id="previewBgImage" style="width: 160px;height: 130px;">
                                    </div>
                                </div> --}}
                            </div>
                            
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
    ClassicEditor
        .create( document.querySelector( '#editor1' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
<script>

    function readAboutURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#previewAboutImage')
                    .attr('src', e.target.result)
                    .width(160)
                    .height(130);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    document.getElementById("previewAboutImage").src="{{ $company->about_image }}";

    function readBgURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#previewBgImage')
                    .attr('src', e.target.result)
                    .width(160)
                    .height(130);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    document.getElementById("previewBgImage").src="{{ $company->bg_image }}";
</script>
@endpush