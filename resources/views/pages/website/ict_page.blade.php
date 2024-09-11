@extends('layouts.website', ['pageName' => 'about'])
@section('title', 'About Us')
@section('web-content')


  <!-- ==================== Page-Title (Start) ==================== -->
  <div class="page-title">

    <div class="title">
      <h2 style="text-align: center;">ICT Skill Development</h2>
    </div> 

  </div>
  <!-- ==================== Page-Title (End) ==================== -->



  <!-- ==================== Reports Area (Start) ==================== -->

  @foreach ($ict as $item)
      
  <section id="reports" class="gallery">

    <div class="heading">
      <div class="content">
        <h2 style="text-align: center;">{{ $item->title}}</h2>
        <div class="design">
          <span></span>
          <img id="heading-img" src="{{asset('website/images/Logo/Logo.png')}}" alt="">
          <span></span>
        </div>
      </div>
    </div>

    <div class="box-container">
      <!-- Peace Images -->

    @foreach ($ict as $ictImg)
    @foreach ($ictImg->ictImage as $ictMulti)
          
    <div class="gallery-item image single Inception">
      <img src="{{asset($ictMulti->multiimage)}}" alt="Gallery-Image">
      <div class="content">
        <a href="{{asset($ictMulti->multiimage)}}"><i class="fas fa-plus"></i></a>
      </div>
    </div>
    @endforeach
    @endforeach

   
  
    </div>

  </section>
  @endforeach
  <!-- ==================== Gallery Area (End) ==================== -->

@endsection

