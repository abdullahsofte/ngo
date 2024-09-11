@extends('layouts.admin-master', ['pageName'=> 'content', 'title' => 'CTET About Update'])

@section('admin-content')
   <!-- Breadcubs Area Start Here -->

   <div class="breadcrumbs-area d-flex justify-content-between">
    <div>
        <h3> CTET About</h3>
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
                <div class="card-body">
                    <div class="form">
                       <div class="card-header">
                        <h4 class="heading"><i class="fa fa-plus"></i> Update  CTET About</h4>
                       </div>
                        <form action="{{ route('update.ctetabout', $ctetAbout) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                               
                                <div class="col-md-6 mb-2">
                                    <label for="about" class="mt-2"> CTET About</label>
                                    <input class="form-control form-control-sm @error('ctet_about_title') is-invalid @enderror"
                                    id="ctet_about_title" type="text" name="ctet_about_title"
                                    value="{{$ctetAbout->ctet_about_title}}" placeholder=" CTET About title">
                              
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label for="about" class="mt-2"> CTET About</label>
                                    <textarea class="form-control form-control-sm" name="ctet_about_description" id="editor" cols="4" rows="4">{!!$ctetAbout->ctet_about_description!!}</textarea>
                                    @error('ctet_about_description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                              
                            </div>
                            
                            <hr class="mt-0">
                            <div class="clearfix mt-1">
                                <div class="float-md-right">
                                    <button type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>
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
<script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endpush
