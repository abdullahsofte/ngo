@extends('layouts.admin-master', ['pageName'=> 'Concerns', 'title' => 'Add Sister Concerns'])
{{-- @section('title', 'Our Partner') --}}
@push('admin-css')
@endpush    
@section('admin-content')
   <!-- Breadcubs Area Start Here -->

   <div class="breadcrumbs-area d-flex justify-content-between">
    <div>
        <h3>Sister Concerns</h3>
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
                        <h4 class=""><i class="fas fa-plus"></i> Add new Sister Concerns</h4>
                    </div>
                    <div class="card-body">
                        <div class="form">
                          
                            <form action="{{ route('partner.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <label for="name">School Name <span class="text-danger"> * </span></label>
                                        <input class="form-control form-control-sm @error('name') is-invalid @enderror" id="name" type="text" name="name" value="{{ old('name') }}" placeholder="School Name">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <label for="name">Website Link <span class="text-danger"> * </span></label>
                                        <input class="form-control form-control-sm @error('link') is-invalid @enderror" id="link" type="url" name="link" value="{{ old('link') }}" placeholder="School link">
                                        @error('link')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <hr class="my-3">
                                        <div class="clearfix mt-1">
                                            <div class="float-md-right">
                                                <button type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>
                                                <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
                                            </div>
                                        </div>
        
                                        {{-- <label for="image" class="mt-1">Partner Image <small>(Size: 400px * 150px)</small></label>
                                        <input class="form-control form-control-sm @error('image') is-invalid @enderror" id="image" type="file" name="image" onchange="readURL(this);">
                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror --}}
                                    </div>
                                    {{-- <div class="col-md-4 d-md-flex justify-content-center align-items-center">
                                        <img class="form-controlo img-thumbnail" src="#" id="previewImage" style="width: 150px;height: 120px; background: #3f4a49;">
                                    </div> --}}
                                  
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
                All Sister Concerns
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>School Name</th>
                                <th>School Link</th>
                                {{-- <th>Image</th> --}}
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($partners as $key=>$partner)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $partner->name }}</td>
                                    <td>{{ $partner->link }}</td>
                                    {{-- <td><img class="border" style="height: 40px; width:50px;" src="{{ asset($partner->image) }}" alt=""></td> --}}
                                    <td>
                                        <a href="{{ route('partner.edit',$partner) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="deletePartner({{ $partner->id }})"><i class="fa fa-trash"></i></button>
                                        <form id="delete-form-{{$partner->id}}" action="{{route('partner.destroy',$partner)}}" method="POST" style="display: none;">
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
            
            reader.onload = function (e) {
                $('#previewImage')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(120);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    document.getElementById("previewImage").src="/uploads/no.png";
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
</script>
@endpush