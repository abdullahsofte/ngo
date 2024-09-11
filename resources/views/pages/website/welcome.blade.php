@extends('layouts.website', ['pageName' => 'Welcome Note'])
@section('title', 'Welcome Note')
@section('web-content')
 

     <!-- ==================== Page-Title (Start) ==================== -->
  <div class="page-title">

    <div class="title">
      <h2>Welcome Note</h2>
    </div> 

    <div class="link">
      <a href="{{route('home')}}" class="fas fa-home"></a>
      <i class="fas fa-angle-double-right"></i>
      <span class="page">Welcome Note</span>
    </div>

  </div>
  <!-- ==================== Page-Title Area (End) ==================== -->



  <!-- ==================== About-Us Area (Start) ==================== -->
  <section class="about-us">

    <!-- ========== About Area (Start) ========== -->
    <section class="about">

      <div class="heading">
        <div class="content">
          <h2>{{$welcome->title}}:</h2>
          <div class="design">
            <span></span>
            <i class="fas fa-mosque"></i>
            <span></span>
          </div>
        </div>
      </div>

      <div class="box-container">
      
        <div class="content">
            <div class="justify">{!! $welcome->description !!}</div>
        </div>
    
      </div>
    
    </section>
    <!-- ========== About Area (End) ========== -->

  </section>
@endsection


