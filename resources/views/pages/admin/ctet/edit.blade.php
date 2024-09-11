@extends('layouts.admin-master', ['pageName'=> 'activity', 'title' => 'Edit activites'])
{{-- @section('title', 'Our Partner') --}}
@push('admin-css')
@endpush    
@section('admin-content')
   <!-- Breadcubs Area Start Here -->

   <div class="breadcrumbs-area d-flex justify-content-between">
    <div>
        <h3>Update Ctet Activity</h3>
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
                                <h4 class=""><i class="fa fa-edit"></i> Edit Ctet Activity</h4>
                                <div>
                                    <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm overflow-hidden">Dashboard</a>
                                </div>
                            </div>
                            <form action="{{ route('ctetactivity.update', $activity) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-12 mb-2">
                                        <div class="row my-2">
                                            <div class="col-md-2">
                                                <label for="title">Select Ctet <span class="text-danger"> *
                                                    </span></label>
                                            </div>
                                            <div class="col-md-6">
                                                <select name="ctet_id" id="ctet_id" class="form-control form-control-sm">
                                                    <option value="">-- Select CTET --</option>
                                                    @foreach ($ctet as $item)
                                                        <option value="{{ $item->id }}" {{ $item->id == $activity->ctet_id ? 'selected' : '' }}>{{ $item->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row my-2">
                                            <div class="col-md-2">
                                                <label for="title"> Title <span class="text-danger"> * </span></label>
                                            </div>
                                            <div class="col-md-10">
                                            <input class="form-control @error('title') is-invalid @enderror" id="title" type="text" name="title" value="{{ $activity->title }}" placeholder="title">
                                            @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            </div>
                                        </div>
   
                               
                                    </div>
                                    <div class="col-md-12  mt-2">
                                        <div class="row my-2">
                                            <div class="col-md-2">
                                                <label for="description"> Description</label>
                                            </div>
                                            <div class="col-md-10">
                                                <textarea name="description" class="summernote" id="editor" cols="30" rows="10">{{ $activity->description }}</textarea>
                                        
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
<script type="text/javascript">
    $(document).ready(function() {
      $('.summernote').summernote();
    });
</script>


@endpush