@extends('layouts.website', ['pageName' => 'gallery'])
@section('title', 'Photo Gallery')
@section('web-content')
   
  <!-- ==================== Page-Title (Start) ==================== -->
  <div class="page-title">

    <div class="title">
      <h2>Photo Gallery</h2>
    </div> 

    <div class="link">
      <a href="{{route('home')}}" class="fas fa-home"></a>
      <i class="fas fa-angle-double-right"></i>
      <span class="page">Photo Gallery</span>
    </div>

  </div>
  <!-- ==================== Page-Title (End) ==================== -->



  <!-- ==================== Gallery Area (Start) ==================== -->
  <section class="gallery">

    <ul class="controls">
      <li class="button" data-filter="photo">Photo Gallery</li>
      {{-- <li class="button" data-filter="video">Video Gallery</li> --}}
    </ul>

    <div class="box-container">

        @foreach ($gallery as $item)
            
        <div class="gallery-item image double photo">
          <img src="{{asset('uploads/gallery/'. $item->image)}}" alt="{{$item->title}}">
          <div class="content">
            <a href="{{asset('uploads/gallery/'. $item->image)}}"><i class="fas fa-plus"></i></a>
          </div>
        </div>
        @endforeach

  
    
  
    </div>

  </section>
  <!-- ==================== Gallery Area (End) ==================== -->


@endsection
