@extends('layouts.admin-master', ['pageName'=> 'important', 'title' => 'Edit Important Links'])
{{-- @section('title', 'Our Partner') --}}
@push('admin-css')
@endpush    
@section('admin-content')
   <!-- Breadcubs Area Start Here -->

   <div class="breadcrumbs-area d-flex justify-content-between">
    <div>
        <h3>Admin Important Links</h3>
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
                <div class="d-flex justify-content-between heading card-header">
                    <h4 class=""><i class="fa fa-edit"></i> Edit Important Links</h4>
                    <div>
                        <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm overflow-hidden">Dashboard</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form">
                       
                        <form action="{{ route('important.update', $important) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="title">Important Title <span class="text-danger"> * </span></label>
                                    <input class="form-control @error('title') is-invalid @enderror" id="title" type="text" name="title" value="{{ $important->title }}" placeholder="important title">
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <label for="link">Important Link <span class="text-danger"> * </span></label>
                                    <input class="form-control @error('link') is-invalid @enderror" id="link" type="url" name="link" value="{{ $important->link }}" placeholder="important link">
                                    @error('link')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
    

                                </div>
                            
                            </div>
                            <hr class="my-2">
                            <div class="clearfix mt-1">
                                <div class="float-md-left">
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


@endpush