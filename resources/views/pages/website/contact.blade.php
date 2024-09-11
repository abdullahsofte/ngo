@extends('layouts.website', ['pageName' => 'contact'])
@section('title', 'Contact Us')
@section('web-content')
   
  <!-- ==================== Page-Title (Start) ==================== -->
  <div class="page-title">

    <div class="title">
      <h2>Contact Us</h2>
    </div>
  </div>
  <!-- ==================== Page-Title (End) ==================== -->
  
 

  <!-- ==================== Checkout Area (Start) ==================== -->
  <section id="contact">
    <div class="contact">
        <div class="contact-us">
            <h3>Contact Us</h3>
            <ul>
                <li><p><i class="fas fa-phone"></i><span>{{ $content->phone}}</span></p></li>
                <li><p><i class="fas fa-envelope"></i><span class="gmail">{{ $content->email}}</span></p></li>
                <li><p><i class="fas fa-map"></i><span>{{ $content->address}}</span></p></li>
            </ul>
        </div>
    </div>
    <div class="google-map">
        <iframe src="{{$content->mapp}}" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
  </section>
  <!-- ==================== Checkout Area (End) ==================== -->
  
@endsection
