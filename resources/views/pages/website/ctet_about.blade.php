@extends('layouts.website')
@section('title', 'Ctet About')
@section('web-content')

  <!-- ==================== Page-Title (Start) ==================== -->
  <div class="page-title">

    <div class="title">
      <h2>CTET</h2>
    </div> 

    <div class="link">
      <a href="../../index-2.html" class="fas fa-home"></a>
      <i class="fas fa-angle-double-right"></i>
      <span class="page">CTET - About</span>
    </div>

  </div>
  <!-- ==================== Page-Title Area (End) ==================== -->



  <!-- ==================== About-Us Area (Start) ==================== -->
  <section class="about-us">

    <!-- ========== About Area (Start) ========== -->
    <section class="about">

      <div class="heading">
        <div class="content">
          <h2>CTET - About</h2>
          <div class="design">
            <span></span>
            <img id="heading-img" src="{{asset('website/images/Logo/Logo.png')}}" alt="">
            <span></span>
          </div>
        </div>
      </div>

      <div class="box-container">
      
        <div class="content" style="text-align: center;">
          <h3>{{$content->ctet_about_title}}</h3>
          
          <div>
            {!! $content->ctet_about_description !!}
          </div>
        </div>
    
      </div>
    
    </section>
    <!-- ========== About Area (End) ========== -->

  </section>
    
@endsection