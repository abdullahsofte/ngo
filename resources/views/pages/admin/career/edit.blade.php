@extends('layouts.admin-master', ['title' => 'Edit Career'])
@section('admin-content')
   <!-- Breadcubs Area Start Here -->

   <div class="breadcrumbs-area d-flex justify-content-between">
    <div>
        <h3>Career </h3>
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
                                <h4 class=""><i class="fa fa-edit"></i> Update Career</h4>
                                <div>
                                    <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm overflow-hidden">Dashboard</a>
                                </div>
                            </div>
                            <form action="{{route('announcement.update', $announcement)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-7 mb-2">
                                        <div class="row my-2">
                                            <div class="col-md-3">
                                                <label for="title">Select Department <span class="text-danger"> *
                                                    </span></label>
                                            </div>
                                            <div class="col-md-9">
                                              <select name="announce_id" class="form-control form-control-sm" id="announce_id">
                                                <option value="" label="-- Select Department--"></option>
                                                @foreach ($announce_sec as $item)
                                                <option value="{{$item->id}}" {{$item->id == $announcement->announce_id ? 'selected' : ''}}>{{$item->title}}</option>
                                                @endforeach
                                              </select>
                                              
                                            </div>
                                        </div>
                                    
                                        <div class="row my-2">
                                            <div class="col-md-3">
                                                <label for="title"> Title <span class="text-danger"> * </span></label>
                                            </div>
                                            <div class="col-md-9">
                                            <input class="form-control @error('title') is-invalid @enderror" id="title" type="text" name="title" value="{{ $announcement->title }}" placeholder="title">
                                            @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            </div>
                                        </div>
                               
                                    
                                        <div class="row my-2">
                                            <div class="col-md-3">
                                                <label for="" class="mt-1"> File <small></small></label>
                                            </div>
                                            <div class="col-md-9">
                                                <input class="form-control" type="file" name="file" onchange="readURL(this);">
                                            </div>
                                        </div>
                               
                                    
                                    </div>
                                    <div class="col-md-4 offset-md-1 mt-3">
                                        <iframe class="form-controlo img-thumbnail" src="#" frameborder="0" id="previewImage" style="width: 150px;height: 120px; background: #3f4a49;"></iframe>
                                       
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
    document.getElementById("previewImage").src="{{ asset($announcement->file) }}";
</script>
@endpush