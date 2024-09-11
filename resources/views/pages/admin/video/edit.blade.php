@extends('layouts.admin-master', ['pageName'=> 'video', 'title' => 'Edit Video'])
{{-- @section('title', 'gallery') --}}
@push('admin-css')
@endpush
@section('admin-content')
   <!-- Breadcubs Area Start Here -->

   <div class="breadcrumbs-area d-flex justify-content-between">
    <div>
        <h3>Video Gallery</h3>
    </div>
    <div class="">
        <ul>
            <li>
                <a href="index-2.html">Home</a>
            </li>
            <li>Admin</li>
        </ul>
    </div>

</div>
<!-- Breadcubs Area End Here -->
<main>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-7">
               <div class="card height-auto">
                <div class="card-body">
                    <div class="form">
                        <h4 class="heading"><i class="fas fa-edit"></i> Edit Video</h4>
                        <form action="{{ route('update.video', $video->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="title">Title <span class="text-danger">*</span> </label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" name="title" class="form-control form-control-sm shadow-none @error('title') is-invalid @enderror" id="title" placeholder="Enter Vidoe title" value="{{$video->title}}">
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="link"> Video Url <span class="text-danger">*</span> </label>
                                </div>
                                <div class="col-md-9 mb-2">
                                    <textarea name="link" class="form-control form-control-sm shadow-none @error('link') is-invalid @enderror" id="link" cols="30" rows="3">{{ $video->link }}</textarea>
                                   
                                    @error('link')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                  <div class="mt-2">
                                    <iframe width="100%" height="200" src="{{ $video->link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
                                  </div>
                                </div>
                            </div>
                            <div class="clearfix border-top">
                                <div class="float-md-right mt-2">
                                   
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
