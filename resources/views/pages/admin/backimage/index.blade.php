@extends('layouts.admin-master', ['pageName'=> 'backimage', 'title' => 'Banner Update'])
{{-- @section('title', 'Our item') --}}
@push('admin-css')
@endpush    
@section('admin-content')
   <!-- Breadcubs Area Start Here -->

   <div class="breadcrumbs-area d-flex justify-content-between">
    <div>
        <h3>Banner Update</h3>
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
                <div class="card-body">
                    <div class="form">
                        <div class="d-flex justify-content-between heading card-header">
                            <h4 class=""><i class="fas fa-plus"></i> Update Banner</h4>
                        </div>
                        <form action="{{route('update.banner', $banner)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <div class="row mt-2">
                                        <div class="col-md-3">
                                            <label for="about" class="mt-2">Title</label>
                                        </div>
                                        <div class="col-md-9">
                                            <input class="form-control form-control-sm @error('title') is-invalid @enderror"
                                            id="title" type="text" name="title"
                                            value="{{$banner->title}}" placeholder="Title">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="about" class="mt-2">Description</label>
                                        </div>
                                        <div class="col-md-9">
                                            <textarea name="description" class="form-control form-control-sm @error('description') is-invalid @enderror" id="" cols="30" rows="4">{{$banner->description}}</textarea>
                                           
                                        </div>
                                    </div>
                              
                                </div>
                                <div class="col-md-6 mb-2">
                                    <div class="row my-2">
                                        <div class="col-md-3">
                                            <label for="image" class="mt-1">Image </label>
                                        </div>
                                        <div class="col-md-9">
                                            <input class="form-control form-control-sm @error('image') is-invalid @enderror" id="image" type="file" name="image" onchange="readURL(this);">
                                            @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <img class="form-controlo img-thumbnail" src="#" id="previewImage" style="width: 150px;height: 120px; background: #3f4a49;">
                                        </div>
                                    </div>
                                    
                                  
                                </div>
                               
                            </div>
                            <hr class="my-2">
                            <div class="clearfix mt-1">
                                <div class="float-md-right">
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

<script>
       function readAboutURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#previewImage')
                    .attr('src', e.target.result)
                    .width(100)
                    .height(100);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    document.getElementById("previewImage").src="{{ $banner->image }}";
</script>

@endpush