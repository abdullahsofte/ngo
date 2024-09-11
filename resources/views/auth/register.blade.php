@extends('layouts.admin-master', ['pageName' => 'register', 'title' => 'Registration'])
{{-- @section('title', 'Create User') --}}
@push('admin-css')
@endpush
@section('admin-content')
  <!-- Breadcubs Area Start Here -->

  <div class="breadcrumbs-area d-flex justify-content-between">
    <div>
        <h3>Admin Registration</h3>
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
                <div class="card-header">
                    <h4 class="heading"><i class="fa fa-user-plus"></i> Add New User</h4>
                </div>
                <div class="card-body">
                    <div class="form">
                      
                        <form action="{{ route('register.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="name" class="mb-1"> Name <span class="text-danger">*</span> </label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control form-control-sm shadow-none @error('name') is-invalid @enderror" id="name" placeholder="Enter name">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="phone" class="mb-1">Phone <span class="text-danger">*</span></label>
                                    <input type="number" name="phone" value="{{ old('phone') }}" class="form-control form-control-sm shadow-none @error('phone') is-invalid @enderror" id="phone" placeholder="Enter Phone Number">
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="email" class="mb-1">E-Mail Address <span class="text-danger">*</span></label>
                                    <input type="email" name="email" value="{{ old('email') }}" class="form-control form-control-sm shadow-none @error('email') is-invalid @enderror" id="email" placeholder="Enter Email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="username"> UserName <span class="text-danger">*</span></label>
                                    <input type="text" name="username" value="{{ old('username') }}" class="form-control form-control-sm shadow-none @error('username') is-invalid @enderror" id="username" placeholder="Enter Username">
                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
    
                                    
                                </div>
                                <div class="col-md-6 mb-2">
                                 
                                    <label for="password" class="mt-2"> Password <span class="text-danger">*</span></label>
                                    <input type="password" name="password" value="{{ old('password') }}" class="form-control form-control-sm shadow-none @error('password') is-invalid @enderror" id="password" placeholder="Enter Password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="image">User Image</label>
                                    <input class="form-control form-control-sm" id="image" type="file" name="image" onchange="readURL(this);">
                                    <div class="form-group mt-2">
                                        <img class="form-controlo img-thumbnail" src="#" id="previewImage" style="width: 100px;height: 80px; background: #3f4a49;">
                                    </div>
                                </div>
                            </div>
    
                            <div class="clearfix border-top">
                                <div class="float-md-right mt-2">
                                    <button type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>
                                    <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Create</button>
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
                <i class="fas fa-users mr-1"></i>
                All User List
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $key=>$user)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td><img class="border" style="height: 24px; width:40px;" src="{{ asset($user->image) }}" alt=""></td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>
                                        
                                        @if ($user->status == 1)
                                            <span class="badge bg-info">Active</span>
                                        @else
                                            <span class="badge bg-warning">Inactive</span>
                                        @endif
                                      
                                    </td>
                                    <td>
                                      
                                        @if ($user->status == 1)
                                        <a href="{{ route('user.inactive', $user->id) }}"
                                            title="Inactive" class="btn btn-danger btn-sm"><i
                                                class="fas fa-thumbs-down"></i></a>
                                    @else
                                        <a href="{{ route('user.active', $user->id) }}" title="Active"
                                            class="btn btn-info btn-sm"><i
                                                class="fas fa-thumbs-up"></i></a>
                                    @endif

                                        <a data-id="{{$user->id}}" class="btn btn-info btn-sm" href="{{route('user.edit',$user->id)}}"><i class="fas fa-edit"></i></a>
                                        
                                          
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
                    .width(100)
                    .height(80);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    document.getElementById("previewImage").src="/uploads/no.png";
</script>
@endpush
