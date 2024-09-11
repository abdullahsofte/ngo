@extends('layouts.admin-master', ['pageName'=> 'subReport', 'title' => 'Edit Sub Report'])
{{-- @section('title', 'Our Partner') --}}
@push('admin-css')
@endpush    
@section('admin-content')
   <!-- Breadcubs Area Start Here -->

   <div class="breadcrumbs-area d-flex justify-content-between">
    <div>
        <h3>Update Sub Report</h3>
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
                                <h4 class=""><i class="fa fa-edit"></i> Edit Sub Report</h4>
                                <div>
                                    <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm overflow-hidden">Dashboard</a>
                                </div>
                            </div>
                            <form action="{{ route('subreport.update', $subReport) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="row my-2">
                                            <div class="col-md-4">
                                                <label for="title">Select Report <span class="text-danger"> *
                                                    </span></label>
                                            </div>
                                            <div class="col-md-8">
                                              <select name="report_id" class="form-control form-control-sm" id="report_id">
                                                <option value="" label="-- Select Report--"></option>
                                                @foreach ($report as $item)
                                                <option value="{{$item->id}}" {{ $item->id == $subReport->report_id ? 'selected' : '' }}>{{$item->title}}</option>
                                                @endforeach
                                              </select>
                                            </div>
                                        </div>
                                        <div class="row my-2">
                                            <div class="col-md-4">
                                                <label for="title"> Title <span class="text-danger"> * </span></label>
                                            </div>
                                            <div class="col-md-8">
                                            <input class="form-control @error('title') is-invalid @enderror" id="title" type="text" name="title" value="{{ $subReport->title }}" placeholder="title">
                                            @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="row my-2">
                                            <div class="col-md-4">
                                                <label for="image" class="mt-1"> Image </label>
                                            </div>
                                            <div class="col-md-8">
                                                <input class="form-control" id="image" type="file" name="image" onchange="readURL(this);">
                                                <img class="form-controlo img-thumbnail" src="#" id="previewImage" style="width: 100px;height: 100px; background: #3f4a49;">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-7 mt-2">
                                        <div class="row">
                                            <div class="col-md-3">

                                                <label for="" class="col-form-label">Multi Image </label>
                                            </div>
                                            <div class="col-md-9">

                                                <input type="file" name="multiimage[]" multiple
                                                    class="form-control form-control-sm" id="multiimage">
                                                <div class="multi-image-box">
                                                    @foreach ($subReport->subreportImage as $item)
                                                        <span class="pip">
                                                            <img src="{{ asset($item->multiimage) }}" class="imageThumb"
                                                                data-image_id="{{ $item->id }}" alt="">
                                                            <span class="close-btn remove" data-image_id="{{ $item->id }}">
                                                                remove
                                                            </span>
                                                        </span>
                                                    @endforeach
                                                </div>
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
    document.getElementById("previewImage").src="{{ asset($subReport->image) }}";
</script>

<script>
    $(document).on('click', '.close-btn.remove', function() {
        var newsImgId = $(this).attr("data-image_id");

        $.ajax({
            url: "{{ url('delete_ctet_image') }}/" + newsImgId,
            dataType: "json",
            method: "GET",
            success: function(data) {
                $html = "";
                if (data.subreportImage.length > 0) {
                    data.subreportImage.forEach(item => {
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