@extends('layouts.admin-master', ['pageName' => 'Sub Report', 'title' => 'Add Sub Report'])
@push('admin-css')
@endpush
@section('admin-content')
    <!-- Breadcubs Area Start Here -->

    <div class="breadcrumbs-area d-flex justify-content-between">
        <div>
            <h3>Admin Sub Report</h3>
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
    <main class="">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card height-auto">
                        <div class="d-flex justify-content-between heading card-header">
                            <h4 class=""><i class="fas fa-plus"></i> Add Sub Report</h4>
                        </div>
                        <div class="card-body">
                            <div class="form">

                                <form action="{{ route('subreport.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 mb-2">
                                            <div class="row my-2">
                                                <div class="col-md-3">
                                                    <label for="title">Select Report <span class="text-danger"> *
                                                        </span></label>
                                                </div>
                                                <div class="col-md-9">
                                                  <select name="report_id" class="form-control form-control-sm" id="report_id">
                                                    <option value="" label="-- Select Report--"></option>
                                                    @foreach ($report as $item)
                                                    <option value="{{$item->id}}" >{{$item->title}}</option>
                                                    @endforeach
                                                  </select>
                                                </div>
                                            </div>
                                          
                                            <div class="row my-2">
                                                <div class="col-md-3">
                                                    <label for="title"> Title <span class="text-danger"> *
                                                        </span></label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input
                                                        class="form-control form-control-sm @error('title') is-invalid @enderror"
                                                        id="title" type="text" name="title"
                                                        value="{{ old('title') }}" placeholder=" title">
                                                    @error('title')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row my-2">
                                                <div class="col-md-3">
                                                    <label for="image" class=""> Image </label>
                                                </div>
                                                <div class="col-md-9">
                                                    <input
                                                        class="form-control form-control-sm @error('image') is-invalid @enderror"
                                                        id="image" type="file" name="image"
                                                        onchange="readURL(this);">
                                                        <img class="form-controlo img-thumbnail" src="#" id="previewImage"
                                                style="width: 100px;height: 100px; background: #3f4a49;">
                                                    @error('image')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                           
                                           


                                        </div>
                                        <div class="col-md-6">
                                            <div class="row my-2">
                                                <div class="col-md-3">
                                                    <label for="" class=" col-form-label">Multi Image </label>
                                                </div>
                                                <div class="col-md-9">
                                                
                                                    <input class="form-control form-control-sm" id="multiimage" type="file" multiple name="multiimage[]">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-2">
                                    <div class="clearfix mt-1">
                                        <div class="float-md-right">
                                            <button type="reset"
                                                class="btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>
                                            <button type="submit"
                                                class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
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
                    All Sub Report
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($subreport as $key=>$item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td><img class="border" style="height: 40px; width:50px;"
                                                src="{{ asset($item->image) }}" alt=""></td>
                                        <td>
                                            <a href="{{ route('subreport.edit', $item) }}" class="btn btn-info btn-sm"><i
                                                    class="fa fa-edit"></i></a>
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="deletePartner({{ $item->id }})"><i
                                                    class="fa fa-trash"></i></button>
                                            <form id="delete-form-{{ $item->id }}"
                                                action="{{ route('subreport.delete', $item) }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td rowspan="5">Data Not Found</td>
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
        document.getElementById("previewImage").src = "/uploads/no.png";
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
    <script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
    <script type="text/javascript">
        function deletePartner(id) {
            swal({
                title: 'Are you sure?',
                text: "You want to Delete this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-' + id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }
    </script>
@endpush
