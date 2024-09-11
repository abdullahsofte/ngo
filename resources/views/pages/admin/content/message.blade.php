@extends('layouts.admin-master', ['pageName'=> 'content', 'title' => 'Message Update'])

@section('admin-content')
   <!-- Breadcubs Area Start Here -->

   <div class="breadcrumbs-area d-flex justify-content-between">
    <div>
        <h3> CTET Message</h3>
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
                        <h4 class="heading"><i class="fa fa-plus"></i> Update  Message</h4>
                       </div>
                        <form action="{{ route('messageUpdate', $message) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                               
                                <div class="col-md-6 mb-2">
                                    <label for="about" class="mt-2"> Message Titile</label>
                                    <input class="form-control form-control-sm @error('message_title') is-invalid @enderror"
                                    id="message_title" type="text" name="message_title"
                                    value="{{$message->message_title}}" placeholder="message title">
                              
                                </div>
                            </div>

                                <label for="about" class="mt-2"> Description</label>
                                <textarea name="message_description" class="summernote" id="editor" cols="30" rows="10">{!!$message->message_description!!}</textarea>
      
                            
                            <hr class="mt-0">
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
@endpush
