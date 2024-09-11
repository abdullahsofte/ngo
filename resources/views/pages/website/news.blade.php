@extends('layouts.website', ['pageName' => 'news'])
@section('title', 'News ')
@section('web-content')

  <!-- ==================== Page-Title (Start) ==================== -->
  <div class="page-title">

    <div class="title">
        <h2>All News</h2>
    </div> 

    <div class="link">
        <a href="{{route('home')}}" class="fas fa-home"></a>
        <i class="fas fa-angle-double-right"></i>
        <span class="page">Notice - news</span>
    </div> 

</div> 
<!-- ==================== Page-Title (End) ==================== -->


<section class="blog main">

    <div class="heading">
        <div class="content">
            <h2>our Recent News</h2>
            <div class="design">
                <span></span>
                <img id="heading-img" src="{{ asset('website/images/Logo/Logo.png') }}" alt="">
                <span></span>
            </div>
        </div>
    </div>

    <div class="box-container">

        @foreach ($news as $item)
        <div class="blog-item">
            <div class="image">
                <img src="{{ asset($item->image) }}" alt="{{$item->title}}">
            </div>
            <div class="content">
               
                <a class="main-heading" href="{{route('newsdetails', $item->id)}}">{{ $item->title}}</a>
                <p>{!! Str::of($item->description)->limit(60)!!}</p>
                <a href="{{route('newsdetails', $item->id)}}" style="margin: 5px 0; float: right;" class="btn">More Info</a>
            </div>
        </div>
        @endforeach
        
    </div>

</section>



@endsection
