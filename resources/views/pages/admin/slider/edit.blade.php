@extends('layouts.admin-master', ['pageName'=> 'slider', 'title' => 'Edit Slider'])
{{-- @section('title', 'Our Partner') --}}
@push('admin-css')
@endpush    
@section('admin-content')
   <!-- Breadcubs Area Start Here -->

   <div class="breadcrumbs-area d-flex justify-content-between">
    <div>
        <h3>Admin Slider</h3>
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
                    <div class="d-flex justify-content-between heading card-header">
                        <h4 class=""><i class="fas fa-plus"></i> Update Slider</h4>
                        <div>
                            <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm overflow-hidden">Dashboard</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form">
                     
                            <form action="{{ route('slider.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        {{-- <label for="slogan">Slider Slogan</label>
                                        <input class="form-control form-control-sm @error('slogan') is-invalid @enderror" id="slogan" type="text" name="slogan" value="{{ $slider->slogan }}" placeholder="Slider Slogan">
                                        @error('slogan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror --}}
                                        
                                        <label for="headerline">Slider Headline</label>
                                        <input class="form-control form-control-sm @error('headerline') is-invalid @enderror" id="headerline" type="text" name="headerline" value="{{ $slider->headerline }}" placeholder="Header Line">
                                        @error('headerline')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
        
                                        {{-- <label for="description">Slider Text</label>
                                        <input class="form-control form-control-sm @error('description') is-invalid @enderror" id="description" type="text" name="description" value="{{ $slider->description }}" placeholder="Slider Description">
                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror --}}
        
                                        <label for="image" class="mt-1">Slider Image <small>(Size:1600*600 px)</small></label>
                                        <input class="form-control form-control-sm  @error('image') is-invalid @enderror" id="image" type="file" name="image" onchange="readURL(this);">
                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                         @enderror
                                    </div>
                                    <div class="col-md-4 offset-md-1 mt-3">
                                        <img class="form-controlo img-thumbnail" src="#" id="previewImage" style="height: 205px; width:400px; background: #3f4a49;">
                                    </div>
                                </div>
                                <hr class="my-2">
                                <div class="clearfix mt-1">
                                    <div class="float-md-left">
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

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#previewImage')
                    .attr('src', e.target.result)
                    .width(400)
                    .height(205);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    document.getElementById("previewImage").src="{{ asset($slider->image) }}";
</script>
@endpush