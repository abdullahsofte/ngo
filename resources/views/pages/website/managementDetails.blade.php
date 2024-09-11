@extends('layouts.website')
@section('title', 'Management')
@section('web-content')


  <!-- ==================== Page-Title (Start) ==================== -->
  <div class="page-title">

    <div class="title">
      <h2>{{$persone->designation}} Message</h2>
    </div> 

    <div class="link">
      <a href="{{route('home')}}" class="fas fa-home"></a>
      <i class="fas fa-angle-double-right"></i>
      <span class="page">{{$persone->designation}} Message</span>
    </div>

  </div>
  <!-- ==================== Page-Title (End) ==================== -->



  <!-- ==================== Team Details Area (Start) ==================== -->
  <section class="team-details">

    <div class="team-intro"> 

      <div class="image">
          <img src="{{ asset('uploads/management/'.$persone->image) }}" alt="">
      </div>

      <div class="content">

        <div class="intro">
          <h3>{{ $persone->name }}</h3>
          <p>{{ $persone->designation }}</p>
        </div>

        <div class="contact-details">
          <h4>About :</h4>
          <div class="box-container">
            <div class="justify">{!! $persone->description !!}</div>
          </div>
        </div>

      </div>

    </div>

 

  </section>
  <!-- ==================== Team Details Area (End) ==================== -->


@endsection

