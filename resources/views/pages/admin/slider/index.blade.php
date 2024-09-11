@extends('layouts.admin-master', ['pageName'=> 'slider', 'title' => 'Add Slider'])
{{-- @section('title', 'Our Partner') --}}
@push('admin-css')
@endpush    
@section('admin-content')
   <!-- Breadcubs Area Start Here -->

   <div class="breadcrumbs-area d-flex justify-content-between">
    <div>
        <h3>Admin Slider</h3>
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
            <div class="col-md-6">
                <div class="card height-auto">
                    <div class="card-body">
                        <div class="form">
                            <div class="d-flex justify-content-between heading card-header">
                                <h4 class=""><i class="fas fa-plus"></i> Add new Slider</h4>
                            </div>
                            <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-md-12 mb-2">
                                       
                                        <div class="row my-2">
                                            <div class="col-md-3">
                                                <label for="headerline">Title</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input class="form-control form-control-sm @error('headerline') is-invalid @enderror" id="headerline" type="text" name="headerline" value="{{ old('headerline') }}" placeholder="Slider Title">
                                                @error('headerline')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                 
        
                                        <div class="row my-2">
                                            <div class="col-md-3">
                                                <label for="image" class="mt-1">Image</label>
                                            </div>
                                            <div class="col-md-9">
                                                <input class="form-control form-control-sm @error('image') is-invalid @enderror" id="image" type="file" name="image" onchange="readURL(this);">
                                                {{-- <small>(Size: 1600px x 600px)</small> --}}
                                                @error('image')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-12 text-center">

                                                <img class="form-controlo img-thumbnail" src="#" id="previewImage" style="height: 100px; width:100px; background: #3f4a49;">
                                            </div>


                                        </div>
                                        <hr class="my-2">
                                        <div class="clearfix mt-1">
                                            <div class="float-md-right">
                                                <button type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>
                                                <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
        
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-list"></i>
                        All Slider
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Headline</th>
                                        <th>Image</th>
                                        {{-- <th>Slogan</th> --}}
                                        {{-- <th>Text</th> --}}
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($sliders as $key=>$slider)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $slider->headerline }}</td>
                                            <td><img class="border" style="height: 60px; width:60px;" src="{{ asset($slider->image) }}" alt=""></td>
                                            {{-- <td>{{ $slider->slogan }}</td> --}}
                                            {{-- <td>{{ $slider->description }}</td> --}}
                                            <td>
                                                <a href="{{ route('slider.edit',$slider->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                                <a href="{{ route('slider.delete', $slider->id) }}" type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you Sure?')"><i class="fa fa-trash"></i></a>
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
        </div>
    </div>
    <div class="container-fluid">
       
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
    document.getElementById("previewImage").src="/uploads/no.png";
</script>
{{-- <script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
<script type="text/javascript">
    function deleteSlider(id) {
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
                document.getElementById('delete-form-'+id).submit();
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
</script> --}}
@endpush