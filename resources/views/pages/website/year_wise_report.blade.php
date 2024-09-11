@extends('layouts.website', ['pageName' => 'Year Wise Report'])
@section('title', 'Year Wise Report')
@section('web-content')
 

  <!-- ==================== Page-Title (Start) ==================== -->
  <div class="page-title">

    <div class="title">
      <h2>Reports</h2>
    </div> 

    <div class="link">
      <a href="{{route('home')}}" class="fas fa-home"></a>
      <i class="fas fa-angle-double-right"></i>
      <span class="page">Reports - {{$year->year}}</span>
    </div>

  </div>
  <!-- ==================== Page-Title (End) ==================== -->


  <!-- ==================== Reports Area (Start) ==================== -->
  <section id="reports" class="gallery">

    <div class="heading">
      <div class="content">
        <h2>Reports - {{$year->year}}</h2>
        <div class="design">
          <span></span>
          <img id="heading-img" src="{{asset('website/images/Logo/Logo.png')}}" alt="">
          <span></span>
        </div>
      </div>
    </div>

    <div class="box-container">
      <!-- Peace Images -->

 {{-- {{dd($report)}} --}}

 @if (isset($report->reportImage))
     
 @foreach ($report->reportImage as $item)
     
 <div class="gallery-item image single Inception">
   <img src="{{asset($item->multiimage)}}" alt="Gallery-Image">
   <div class="content">
     <a href="{{asset($item->multiimage)}}"><i class="fas fa-plus"></i></a>
   </div>
 </div>
 @endforeach
 @else
      <h3 style="color: red; text-align:center">No Report Found</h3>
 @endif

  
    </div>

  </section>
  <!-- ==================== Reports Area (End) ==================== -->
@endsection


