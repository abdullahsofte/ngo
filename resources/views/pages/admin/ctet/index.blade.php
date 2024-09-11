@extends('layouts.admin-master', ['pageName'=> 'ctet', 'title' => @isset($ctetData) ? 'Update Ctet' : 'Ctet'])
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
        <h3>Admin Ctet</h3>
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
                        <h4 class="heading card-header">
                            @if(@isset($ctetData))
                                <i class="fas fa-edit"></i>
                                <span>Update Ctet</span>
                            @else
                                <i class="fas fa-plus"></i>
                                <span>Add Ctet </span>
                            @endif
                        </h4>
                        <form action="{{ (@$ctetData) ? route('ctet.update', $ctetData->id) : route('ctet.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12 mb-2">
                                            <label for="name"> Ttile <span class="text-danger">*</span> </label>
                                            <input type="text" name="title" class="form-control form-control-sm shadow-none @error('title') is-invalid @enderror" value="{{ @$ctetData ? $ctetData->title : old('title')}}" id="title" placeholder="Enter a Title">
                                            @error('title')
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
                                    <button type="submit" class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">{{(@$ctetData)?'Update':'Create'}}</button>
                                  
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
               </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-list"></i>
                        All Ctet List
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($ctet as $key=>$item)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $item->title }}</td> 
                                            <td>
                                                <a href="{{ route('ctet.edit', $item->id) }}" type="submit" class="btn btn-info btn-mod-info btn-sm mr-1"><i class="fas fa-edit"></i></button>
                                                <a href="{{ route('ctet.delete', $item->id) }}" type="submit" class="btn btn-danger btn-mod-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></button>
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
        </div>
    </div>
    
</main>
@endsection
