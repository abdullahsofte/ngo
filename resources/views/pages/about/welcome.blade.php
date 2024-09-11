@extends('layouts.admin-master', ['pageName'=> 'content', 'title' => 'Welcome Note'])
 
@section('admin-content')
   <!-- Breadcubs Area Start Here -->

   <div class="breadcrumbs-area d-flex justify-content-between">
    <div>
        <h3> Welcome Note</h3>
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
                        <h4 class="heading"><i class="fa fa-plus"></i> Update  Welcome Note</h4>
                       </div>
                        <form action="{{route('welcome.update', $welcome)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-sm-2 my-2">Title</div>

                                <div class="col-sm-6 my-2">
                                    <input class="form-control form-control-sm @error('title') is-invalid @enderror"
                                    id="title" type="text" name="title"
                                    value="{{$welcome->title}}" placeholder=" title">
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                               
                            </div>
                            <div class="row">
                                <div class="col-md-2">

                                    <label for="description" class="mt-2"> Welcome Note</label>
                                </div>
                                <div class="col-md-10 mb-2">
                                    <textarea class="form-control form-control-sm summernote" name="description" id="summernote" cols="4" rows="4">{{$welcome->description}}</textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-2">
                                    <label for=""> Image </label>
                                </div>
                                <div class="col-md-4 mb-2">
                                    
                                    <input class="form-control form-control-sm" id="image" type="file" name="image" onchange="readAboutURL(this);">
                                    <small>(Size: 660px x 440px)</small>
                                    <div class="form-group mt-2">
                                        <img class="form-controlo img-thumbnail" src="#" id="previewAboutImage" style="width: 100px;height: 100px;">
                                    </div>
                                </div>
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


<script type="text/javascript">
    $(document).ready(function() {
      $('.summernote').summernote();
    });
</script>

<script>
      function readAboutURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#previewAboutImage')
                    .attr('src', e.target.result)
                    .width(100)
                    .height(100);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    document.getElementById("previewAboutImage").src="{{ $welcome->image }}";
</script>

@endpush