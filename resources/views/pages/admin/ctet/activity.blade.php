@extends('layouts.admin-master', ['pageName' => 'activity', 'title' => 'Add Ctet activites'])
@push('admin-css')
@endpush
@section('admin-content')
    <!-- Breadcubs Area Start Here -->

    <div class="breadcrumbs-area d-flex justify-content-between">
        <div>
            <h3>Admin Ctet Activites</h3>
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
                            <h4 class=""><i class="fas fa-plus"></i> Add Ctet Activites</h4>
                        </div>
                        <div class="card-body">
                            <div class="form">

                                <form action="{{ route('ctetactivity.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12 mb-2">

                                            <div class="row my-2">
                                                <div class="col-md-2">
                                                    <label for="title">Select Ctet <span class="text-danger"> *
                                                        </span></label>
                                                </div>
                                                <div class="col-md-6">
                                                  <select name="ctet_id" class="form-control form-control-sm" id="ctet_id">
                                                    <option value="" label="-- Select Ctet--"></option>
                                                    @foreach ($ctet as $item)
                                                    <option value="{{$item->id}}" >{{$item->title}}</option>
                                                    @endforeach
                                                  </select>
                                                </div>
                                            </div>
                                        
                                            <div class="row my-2">
                                                <div class="col-md-2">
                                                    <label for="title"> Title <span class="text-danger"> *
                                                        </span></label>
                                                </div>
                                                <div class="col-md-10">
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
                                                <div class="col-md-2">
                                                    <label for="name">Description </label>
                                                </div>
                                                <div class="col-md-10">
                                                    <textarea name="description" class="summernote" id="editor" cols="30" rows="10"></textarea>
                                                
                                                    @error('description')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
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
                    All Ctet Activity
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Title</th>
                                    <th>Ctet</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($activity as $key=>$item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->ctet->title }}</td>
                                        <td>{!! Str::of($item->description)->limit(50) !!}</td>
                                        <td>
                                            <a href="{{ route('ctetactivity.edit', $item) }}" class="btn btn-info btn-sm"><i
                                                    class="fa fa-edit"></i></a>
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="deletePartner({{ $item->id }})"><i
                                                    class="fa fa-trash"></i></button>
                                            <form id="delete-form-{{ $item->id }}"
                                                action="{{ route('ctetactivity.delete', $item) }}" method="POST"
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
<script type="text/javascript">
    $(document).ready(function() {
      $('.summernote').summernote();
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
