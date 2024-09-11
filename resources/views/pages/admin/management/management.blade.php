@extends('layouts.admin-master', ['pageName'=> 'management', 'title' => @isset($managementData) ? 'Update Management' : 'Management'])
{{-- @section('title', 'gallery') --}}
@push('admin-css')

<style>
    .ck.ck-editor__main>.ck-editor__editable:not(.ck-focused) {
    min-height: 150px;
}
</style>
@endpush
@section('admin-content')
   <!-- Breadcubs Area Start Here -->

   <div class="breadcrumbs-area d-flex justify-content-between">
    <div>
        <h3>Admin Management</h3>
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
                <div class="card-body">
                    <div class="form">
                        <h4 class="heading card-header">
                            @if(@isset($managementData))
                                <i class="fas fa-edit"></i>
                                <span>Update Management</span>
                            @else
                                <i class="fas fa-plus"></i>
                                <span>Add Management </span>
                            @endif
                        </h4>
                        <form action="{{ (@$managementData) ? route('management.update', $managementData->id) : route('management.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12 mb-2">
                                            <label for="name"> Name <span class="text-danger">*</span> </label>
                                            <input type="text" name="name" class="form-control form-control-sm shadow-none @error('name') is-invalid @enderror" value="{{ @$managementData ? $managementData->name : old('name')}}" id="name" placeholder="Enter a Name">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label for="rank"> Rank <span class="text-danger">*</span> </label>
                                            <input type="number" name="rank" class="form-control form-control-sm shadow-none @error('rank') is-invalid @enderror" value="{{ @$managementData ? $managementData->rank : old('rank')}}" id="rank" placeholder="Enter Rank">
                                            @error('rank')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label for="designation"> Designation <span class="text-danger">*</span> </label>
                                            <input type="text" name="designation" class="form-control form-control-sm shadow-none  @error('designation') is-invalid @enderror" value="{{ @$managementData ? $managementData->designation : old('designation') }}" id="designation" placeholder="Enter a Designation">
                                            @error('designation')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label for="image">Image <span class="text-danger">*</span> (Size: 700px * 800px) </label>
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
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="description">Description <span class="text-danger">*</span> </label>
                                            <textarea name="description" id="editor" cols="30" rows="10" class="form-control form-control-sm shadow-none @error('description') is-invalid @enderror">{{ @$managementData ? $managementData->description : old('description') }}</textarea>
                                            @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                               
                              
                              
                              
                             
                            </div>
                            <div class="clearfix border-top">
                                <div class="float-md-right mt-2">
                                    <button type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>
                                    <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">{{(@$managementData)?'Update':'Create'}}</button>
                                  
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
                All Member List
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Rank</th>
                                <th>Designation</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($management as $key=>$item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item->name }}</td>                                    
                                    <td>{{ $item->rank }}</td>                                    
                                    <td>{{ $item->designation }}</td>
                                    <td><img class="border" style="height: 70px; max-width:100%" src="{{ asset('uploads/management/'.$item->image) }}" alt=""></td>
                                    <td>
                                        <a href="{{ route('management.edit', $item->id) }}" type="submit" class="btn btn-info btn-mod-info btn-sm mr-1"><i class="fas fa-edit"></i></button>
                                        <a href="{{ route('management.delete', $item->id) }}" type="submit" class="btn btn-danger btn-mod-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></button>
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
    @if(isset($managementData->image))
    document.getElementById("previewImage").src="/uploads/management/{{ $managementData->image }}";
    @else
    document.getElementById("previewImage").src="/uploads/no.png";
    @endif   

</script>
@endpush