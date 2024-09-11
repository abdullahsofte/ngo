@extends('layouts.admin-master', ['pageName' => 'Event', 'title' => 'Edit News'])
@section('admin-content')
    <!-- Breadcubs Area Start Here -->

    <div class="breadcrumbs-area d-flex justify-content-between">
        <div>
            <h3>Edit News </h3>
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
                            <h4 class=""><i class="fa fa-edit"></i> Edit News</h4>
                        </div>
                        <div class="card-body">
                            <div class="form">

                                <form action="{{ route('news.update', $news->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 mb-2">
                                            <label for="title">News Title <span class="text-danger"> * </span></label>
                                            <input class="form-control @error('title') is-invalid @enderror" id="title"
                                                type="text" name="title" value="{{ $news->title }}"
                                                placeholder="News Title">
                                            @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <label for="date">News Date <span class="text-danger"> * </span></label>
                                            <input class="form-control @error('date') is-invalid @enderror" id="date"
                                                type="date" name="date" value="{{ $news->date }}"
                                                placeholder="News date">
                                            @error('date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                            <label for="image" class="mt-1">Image</label>
                                            <input class="form-control @error('image') is-invalid @enderror" id="image"
                                                type="file" name="image" onchange="readURL(this);">
                                            <img class="form-controlo img-thumbnail" src="#" id="previewImage"
                                                style="width: 100px;height: 100px; background: #3f4a49;">
                                            @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            </br>
                                           
                                        </div>

                                        <div class="col-md-6 mb-2">
                                            <div class="form-group">
                                                <label for="description">News Details</label>
                                                <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="editor"
                                                    rows="4">{{ $news->description }}</textarea>
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
                                            <a href="{{ route('news.index') }}"
                                                class="btn-fill-lg bg-blue-dark btn-hover-yellow">Back</a>
                                            <button type="submit"
                                                class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Update</button>
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
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
     <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

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
        document.getElementById("previewImage").src = "{{ asset($news->image) }}";
    </script>

    <script>
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

<script>
    $(document).on('click', '.close-btn.remove', function() {
        var newsImgId = $(this).attr("data-image_id");

        $.ajax({
            url: "{{ url('delete_news_image') }}/" + newsImgId,
            dataType: "json",
            method: "GET",
            success: function(data) {
                $html = "";
                if (data.newsImages.length > 0) {
                    data.newsImages.forEach(item => {
                        $html += `<span class="pip">
                            <img src="${location.origin}/${item.multiimage}" class="imageThumb" data-image_id="${item.id}" alt="">
                            <span class="close-btn remove" data-image_id="${item.id}">
                                remove
                            </span>
                        </span>`;
                    });
                }
                $(".multi-image-box").empty();
                $(".multi-image-box").append($html);
            }
        });

    });
</script>
@endpush
