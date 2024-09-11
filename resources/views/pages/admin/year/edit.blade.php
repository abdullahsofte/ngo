@extends('layouts.admin-master', ['title' => 'Edit Report Year'])
@section('admin-content')
   <!-- Breadcubs Area Start Here -->
   <div class="breadcrumbs-area d-flex justify-content-between">
    <div>
        <h3>Report Year </h3>
    </div>
    <div class="">
        <ul>
            <li>  <a href="{{ route('dashboard') }}">Home</a></li>
            <li>Admin</li>
        </ul>
    </div>

</div>
<!-- Breadcubs Area End Here -->
<main class="vh-100">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card heaight-auto">
                    <div class="card-body">
                        <div class="form">
                            <div class="d-flex justify-content-between heading card-header">
                                <h4 class=""><i class="fa fa-edit"></i> Update Report Year</h4>
                                <div>
                                    <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm overflow-hidden">Dashboard</a>
                                </div>
                            </div>
                            <form action="{{route('year.update', $year)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-12 mb-2">
                                    
                                        <div class="row my-2">
                                            <div class="col-md-3">
                                                <label for="year">Report Year <span class="text-danger"> * </span></label>
                                            </div>
                                            <div class="col-md-9">
                                            <input class="form-control @error('year') is-invalid @enderror" type="text" name="year" value="{{$year->year}}" placeholder="Report Year">
                                            @error('year')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            </div>
                                        </div>
                                        {{-- <div class="row my-2">
                                            <div class="col-md-3">
                                                <label for="image" class="mt-1"> Image <small>(Size: 720
                                                    * 480)</small></label>
                                            </div>
                                            <div class="col-md-7">
                                                <input class="form-control" id="image" type="file" name="image"
                                                    onchange="readURL(this);">
                                            </div>
                                            <div class="col-md-2">
                                                <img class="form-controlo img-thumbnail" src="#" id="previewImage"
                                                    style="width: 100px;height: 100px; background: #3f4a49;">
                                            </div>
                                        </div> --}}
                               
                                    
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
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#previewImage')
                    .attr('src', e.target.result)
                    .width(100)
                    .height(100);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    document.getElementById("previewImage").src = "{{ asset($year->image) }}";
</script>



@endpush