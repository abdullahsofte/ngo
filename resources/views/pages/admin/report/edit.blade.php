@extends('layouts.admin-master', ['title' => 'Edit Report '])
@section('admin-content')
   <!-- Breadcubs Area Start Here -->

   <div class="breadcrumbs-area d-flex justify-content-between">
    <div>
        <h3>Report </h3>
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
                                <h4 class=""><i class="fa fa-edit"></i> Update Report </h4>
                                <div>
                                    <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm overflow-hidden">Dashboard</a>
                                </div>
                            </div>
                            <form action="{{ route('report.update', $report) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                  <div class="col-md-6 mt-2">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="title">Select Year <span class="text-danger"> *
                                                </span></label>
                                        </div>
                                        <div class="col-md-8">
                                          <select name="year_id" class="form-control form-control-sm" id="year_id">
                                            <option value="" label="-- Select Report--"></option>
                                            @foreach ($year as $item)
                                            <option value="{{$item->id}}" {{ $item->id == $report->year_id ? 'selected' : '' }}>{{$item->year}}</option>
                                            @endforeach
                                          </select>
                                        </div>
                                    </div>
                                   <div class="row">
                                    <div class="col-md-4">
                                        <label for="title"> Title <span class="text-danger"> * </span></label>
                                    </div>
                                    <div class="col-md-8">
                                    <input class="form-control @error('title') is-invalid @enderror" id="title" type="text" name="title" value="{{ $report->title }}" placeholder="title">
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                   </div>
                                  </div>
                                  <div class="col-md-6 mt-2">
                                    <div class="row">
                                        <div class="col-md-3">

                                            <label for="" class="col-form-label">Multi Image </label>
                                        </div>
                                        <div class="col-md-9">

                                            <input type="file" name="multiimage[]" multiple
                                                class="form-control form-control-sm" id="multiimage">
                                            <div class="multi-image-box">
                                                @foreach ($report->reportImage as $item)
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
<script type="text/javascript">
    $(document).ready(function() {
      $('.summernote').summernote();
    });
</script>


<script>
    $(document).on('click', '.close-btn.remove', function() {
        var newsImgId = $(this).attr("data-image_id");

        $.ajax({
            url: "{{ url('delete_report_image') }}/" + newsImgId,
            dataType: "json",
            method: "GET",
            success: function(data) {
                $html = "";
                if (data.reportImage.length > 0) {
                    data.reportImage.forEach(item => {
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