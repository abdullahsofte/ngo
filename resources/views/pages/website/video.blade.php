@extends('layouts.website', ['pageName' => 'video'])
@section('title', 'Video Gallery')
@section('web-content')

    <!-- ==================== Page-Title (Start) ==================== -->
    <div class="page-title">

        <div class="title">
            <h2>Video Gallery</h2>
        </div>

        <div class="link">
            <a href="{{route('home')}}" class="fas fa-home"></a>
            <i class="fas fa-angle-double-right"></i>
            <span class="page">Video Gallery</span>
        </div>

    </div>
    <!-- ==================== Page-Title (End) ==================== -->



    <!-- ==================== Gallery Area (Start) ==================== -->
    <section class="gallery">

        <ul class="controls">
            <li class="button" data-filter="video">Video Gallery</li>
        </ul>

        <div class="box-container">

            @foreach ($video as $item)
                
            <div class="gallery-item image double video">
                <iframe width="100%" height="100%" src="{{$item->link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                {{-- <div class="content">
                    <div class="text">
                        <a href="{{$item->link}}"><i class="fas fa-play"></i></a>
                    </div>
                </div> --}}
            </div>
            @endforeach


        </div>

    </section>
    <!-- ==================== Gallery Area (End) ==================== -->
@endsection
