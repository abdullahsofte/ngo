@extends('layouts.admin-master', ['pageName'=> 'news', 'title' => 'Add News'])
@section('admin-content')
   <!-- Breadcubs Area Start Here -->

   <div class="breadcrumbs-area d-flex justify-content-between">
    <div>
        <h3>News</h3>
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
                <div class="card-header">
                    <h4 class="heading"><i class="fas fa-plus"></i> Add News </h4>
                </div>
                <div class="card-body">
                    <div class="form">
                        
                        <form action="{{ route('store.news') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="title">  Title <span class="text-danger">*</span> </label>
                                    <input type="text" name="title" class="form-control form-control-sm shadow-none @error('title') is-invalid @enderror" id="title" placeholder="Enter a News Title" value="{{ old('title') }}">
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <label for="date"> Date <span class="text-danger">*</span> </label>
                                    <input type="date" name="date" class="form-control form-control-sm shadow-none @error('date') is-invalid @enderror" id="date" placeholder="Enter a News date" value="{{ old('date') }}">
                                    @error('date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <label for="image">Image <small>(Size: 600px * 500px)</small></label>
                                    <input class="form-control form-control-sm @error('image') is-invalid @enderror" id="image" type="file" name="image" onchange="readURL(this);">
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
    
                                    <div class="form-group mt-2">
                                        <img class="form-controlo img-thumbnail" src="#" id="previewImage" style="width: 100px;height: 100px; background: #3f4a49;">
                                    </div>

                                

                                </div>
                          
                                <div class="col-md-6 mb-2">
                                      
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="editor" rows="4" placeholder="News Details">{{ old('description') }}</textarea>
                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <hr class="my-2">
                            <div class="clearfix mt-1">
                                <div class="float-md-right">
                                    <button type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>
                                    <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
                                    
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="card my-3">
            <div class="card-header">
                <i class="fas fa-list"></i>
                News List
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($news as $key=>$item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td><img class="border" style="height: 50px; width:65px;" src="{{ asset($item->image) }}" alt=""></td>
                                    <td>{{ $item->title }}</td>                                    
                                    <td>{{ $item->date }}</td>                                    
                                    <td>
                                        <a href="{{ route('news.edit', $item->id) }}" class="btn btn-info btn-mod-info btn-sm mr-1"><i class="fas fa-edit"></i></button>
                                        <a href="{{ route('news.delete', $item->id) }}" class="btn btn-danger btn-mod-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">Data Not Found</td>
                                </tr>
                            @endforelse
                            
                        </tbody>
                    </table>
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
                    .width(100)
                    .height(100);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    document.getElementById("previewImage").src="/uploads/no.png";
</script>

<script>
    // multiple image
    $(document).ready(function() {
        if (window.File && window.FileList && window.FileReader) {
            $("#multiimage").on("change", function(e) {
                var files = e.target.files,
                    filesLength = files.length;
                for (var i = 0; i < filesLength; i++) {
                    var f = files[i]
                    var fileReader = new FileReader();
                    fileReader.onload = (function(e) {
                        var file = e.target;
                        $("<span class=\"pip\">" +
                            "<img class=\"imageThumb\" src=\"" + e.target.result +
                            "\" title=\"" + file.name + "\"/>" +
                            "<br/><span class=\"remove\">Remove</span>" +
                            "</span>").insertAfter("#multiimage");
                        $(".remove").click(function() {
                            $(this).parent(".pip").remove();
                        });
                    });
                    fileReader.readAsDataURL(f);
                }
            });
        } else {
            alert("Your browser doesn't support to File API")
        }
    });
</script>
@endpush