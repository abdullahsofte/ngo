@extends('layouts.admin-master', ['pageName'=> 'important', 'title' => 'Add Important Links'])
{{-- @section('title', 'Our Partner') --}}
@push('admin-css')
@endpush    
@section('admin-content')
   <!-- Breadcubs Area Start Here -->
   <div class="breadcrumbs-area d-flex justify-content-between">
    <div>
        <h3>Important Links</h3>
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
                        <h4 class=""><i class="fas fa-plus"></i> Add new Important Links</h4>
                    </div>
                    <div class="card-body">
                        <div class="form">
                          
                            <form action="{{ route('important.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <label for="title">Important Title <span class="text-danger"> * </span></label>
                                        <input class="form-control form-control-sm @error('title') is-invalid @enderror" id="title" type="text" name="title" value="{{ old('title') }}" placeholder="important title">
                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <label for="link">Important Link <span class="text-danger"> * </span></label>
                                        <input class="form-control form-control-sm @error('link') is-invalid @enderror" id="link" type="url" name="link" value="{{ old('link') }}" placeholder="important link">
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
                All Important Links
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th> Link</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($important as $key=>$important)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $important->title }}</td>
                                    <td>{{ $important->link }}</td>
                                    <td>
                                        <a href="{{ route('important.edit',$important) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="deleteSocial({{ $important->id }})"><i class="fa fa-trash"></i></button>
                                        <form id="delete-form-{{$important->id}}" action="{{route('important.delete',$important)}}" method="POST" style="display: none;">
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

<script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
<script type="text/javascript">
    function deleteSocial(id) {
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