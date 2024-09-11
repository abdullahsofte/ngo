@extends('layouts.admin-master', ['pageName'=> 'activity', 'title' => 'Edit activites'])
{{-- @section('title', 'Our Partner') --}}
@push('admin-css')
@endpush    
@section('admin-content')
   <!-- Breadcubs Area Start Here -->

   <div class="breadcrumbs-area d-flex justify-content-between">
    <div>
        <h3>Update Activity</h3>
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
<main class="vh-100">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card heaight-auto">
                    <div class="card-body">
                        <div class="form">
                            <div class="d-flex justify-content-between heading card-header">
                                <h4 class=""><i class="fa fa-edit"></i> Edit Activity</h4>
                                <div>
                                    <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm overflow-hidden">Dashboard</a>
                                </div>
                            </div>
                            <form action="{{ route('activity.update', $activity) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-5 mb-2">
                                        <div class="row my-2">
                                            <div class="col-md-3">
                                                <label for="rank">Rank<span class="text-danger"> * </span></label>
                                            </div>
                                            <div class="col-md-9">
                                            <input class="form-control @error('rank') is-invalid @enderror" id="rank" type="text" name="rank" value="{{ $activity->rank }}" placeholder="rank">
                                            @error('rank')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="row my-2">
                                            <div class="col-md-3">
                                                <label for="title"> Title <span class="text-danger"> * </span></label>
                                            </div>
                                            <div class="col-md-9">
                                            <input class="form-control @error('title') is-invalid @enderror" id="title" type="text" name="title" value="{{ $activity->title }}" placeholder="title">
                                            @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="row my-2">
                                            <div class="col-md-3">
                                                <label for="image" class="mt-1"> Image <small>(Size: 500px * 400px)</small></label>
                                            </div>
                                            <div class="col-md-9">
                                                <input class="form-control" id="image" type="file" name="image" onchange="readURL(this);">
                                                <img class="form-controlo img-thumbnail" src="#" id="previewImage" style="width: 150px;height: 120px; background: #3f4a49;">
                                            </div>
                                        </div>
                               
                                    </div>
                                    <div class="col-md-7  mt-2">
                                        <div class="row my-2">
                                            <div class="col-md-3">
                                                <label for="description"> Description <span class="text-danger"> * </span></label>
                                            </div>
                                            <div class="col-md-9">
                                                <textarea name="description" id="editor" cols="30" rows="10">{{ $activity->description }}</textarea>
                                            {{-- <input class="form-control @error('description') is-invalid @enderror" id="description" type="text" name="description" value="" placeholder=" description"> --}}
                                            @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-2">
                                <div class="clearfix mt-1">
                                    <div class="float-md-left">
                                        <a href="{{route('activity.index')}}" id="prev" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Back</a>
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
                    .width(150)
                    .height(120);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    document.getElementById("previewImage").src="{{ asset($activity->image) }}";
</script>
@endpush