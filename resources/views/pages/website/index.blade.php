@extends('layouts.website')
@section('title', 'Home')

@section('web-content')

    <!-- ==================== Home-Slider Area (Start) ==================== -->
    <section class="home">

        <div class="box-container">
            <div class="box-item">
                <div class="swiper-container home-slider">
                    <div class="swiper-wrapper">
                        @foreach ($slider as $item)
                            <div class="swiper-slide home-item">
                                <img src="{{ asset($item->image) }}" alt="">
                            </div>
                        @endforeach



                    </div>

                    <div class="swiper-pagination swiper-pagination1"></div>

                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>

                </div>
            </div>
            <div class="box-item">
                @foreach ($management as $sl => $item)
                    <div class="card">
                        <div class="card-top">
                            <h4>Director General Message {{ $sl + 1 }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="image">
                                <img src="{{ asset('uploads/management/' . $item->image) }}" alt="">
                            </div>
                            <div class="content">
                                <ul style="list-style: none;">
                                    <li>
                                        <p class="name"><b>{{ $item->name }}</b></p>
                                    </li>
                                    <li>
                                        <p><b>{{ $item->designation }}</b></p>
                                    </li>
                                    <li>
                                        <p>{!! Str::of($item->description)->limit(100) !!}</p>
                                        <a href="{{ route('management.details', $item->id) }}" style="float: right"
                                            class="">Read More</a>
                                    </li>

                                </ul>

                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

    </section>
    <!-- ==================== Home-Slider Area (End) ==================== -->



    <!-- ==================== About Welcome Area (Start) ==================== -->
    <section class="about">

        <div class="heading">
            <div class="content">
                <h2>Welcome to our site</h2>
                <div class="design">
                    <span></span>
                    <img id="heading-img" src="{{ asset('website/images/Logo/Logo.png') }}" alt="">
                    <span></span>
                </div>
            </div>
        </div>

        <div class="box-container">

            <div class="image">
                <div class="sub-image one">
                    <img src="{{ asset('website/images/About/About-1.jpg') }}" alt="">
                </div>
            </div>

            <div class="content">
                <h3>{{ $welcome->title }}</h3>
                <p>{!! $welcome->description !!}</p>
                <a href="{{ route('welcome') }}" class="btn">Read More</a>
            </div>

        </div>

    </section>
    <!-- ==================== About Welcome Area (End) ==================== -->



    <!-- ==================== Services Area (Start) ==================== -->
    <section class="pillars">

        <div class="heading transparent-bg">
            <div class="content">
                <h2>Our Services</h2>
                <div class="design">
                    <span></span>
                    <img id="heading-img" src="{{ asset('website/images/Logo/Logo.png') }}" alt="">
                    <span></span>
                </div>
            </div>
        </div>

        <div class="box-container">
            @foreach ($service as $item)
                <div class="pillar-item">
                    <div class="icon">
                        <img src="{{ asset($item->image) }}" alt="{{ $item->title }}">
                    </div>
                    <h4>{{ $item->title }}</h4>
                    <p>{!! $item->description !!}</p>
                </div>
            @endforeach


        </div>

    </section>
    <!-- ==================== Services Islam Area (End) ==================== -->



    <!-- ==================== Mision Area (Start) ==================== -->
    <section class="about">

        <div class="box-container">

            <div class="image">
                <div class="sub-image one">
                    <img src="{{ asset($content->about_image) }}" alt="">
                </div>
            </div>

            <div class="content">
                <h3>Our mission & vision </h3>

                {!! $content->mission_vison !!}
                <a href="{{ route('missionVision') }}" class="btn">Read More</a>
            </div>

        </div>

    </section>
    <!-- ==================== Mision Area (End) ==================== -->

  

    <section class="faq">
  
        <div class="accordion-container" style="border: 1px solid; padding:5px;border-radius:5px">
            <div class="notice-header">
                <h4>Notice Board</h4>
            </div>
            <marquee direction="up" height="350px" scrollamount="4" scrolldelay="80">
                    @foreach ($notice as $item)
                        {{-- <li><a href=""></a></li> --}}
                        <div class="accordion">
                            <div class="accordion-heading">
                              <a href="{{route('notices')}}">{{ $item->title }}</a>
                            </div>
                         </div>
                    @endforeach
            </marquee>
            <a href="{{ route('notices') }}" style="float: right" class="btn">Read More</a>
            
    
        </div>
    
        <div class="accordion-container" style="border: 1px solid;padding:5px;border-radius:5px">
            <div class="notice-header">
                <h4>News</h4>
            </div>
            <marquee direction="down" height="350px" scrollamount="4" scrolldelay="80">
                    @foreach ($news as $item)
                        {{-- <li><a href=""></a></li> --}}
                        <div class="accordion">
                            <div class="accordion-heading">
                              <a href="{{route('newsdetails', $item->id)}}">{{ $item->title }}</a>
                            </div>
                         </div>
                    @endforeach
            </marquee>
            <a href="{{ route('news') }}" style="float: right" class="btn">Read More</a>
    
        </div>
    
        {{-- <div class="image">
            hello
        </div> --}}
        
      </section>
    {{-- notice end --}}



    <!-- ==================== CHANGE THE WORLD Area (Start) ==================== -->
    <section class="pillars">

        <div class="heading transparent-bg">
            <div class="content">
                <h2>{{ $banner->title}}</h2>
                <div class="design">
                    <span></span>
                    <img id="heading-img" src="{{ asset('website/images/Logo/Logo.png') }}" alt="">
                    <span></span>
                </div>
            </div>
        </div>

        <div class="box-container">

            <div class="pillar-item">
                <p style="font-size: 24px; margin-bottom: 10px; padding: 0 80px;">{{$banner->description}}</p>
                <div class="image" style="margin: 0 auto; width: 35%;">
                    <img style="width: 100%;" src="{{ asset($banner->image) }}" alt="">
                </div>
            </div>

        </div>

    </section>
    <!-- ==================== CHANGE THE WORLD Area (End) ==================== -->

    <!-- ==================== Gallery Area (Start) ==================== -->
    <section class="gallery">

        <div class="heading">
            <div class="content">
                <h2>our gallery</h2>
                <div class="design">
                    <span></span>
                    <img id="heading-img" src="{{ asset('website/images/Logo/Logo.png') }}" alt="">
                    <span></span>
                </div>
            </div>
        </div>

        <ul class="controls">
            <li class="button active" data-filter="photo">Photo Gallery</li>
            <li class="button" data-filter="video">Video Gallery</li>
        </ul>

        <div class="box-container">

            @foreach ($gallery as $item)
                <div class="gallery-item image double photo">
                    <img src="{{ asset('/uploads/gallery/' . $item->image) }}" alt="{{ $item->title }}">
                    <div class="content">
                        <div class="text">
                            <a href="{{ asset('/uploads/gallery/' . $item->image) }}"><i class="fas fa-plus"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach

            @foreach ($video as $item)
                <div class="gallery-item image double video">
                    <iframe width="100%" height="100%" src="{{ $item->link }}" title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    <div class="content">
                        <div class="text">
                            <a href="{{ $item->link }}"><i class="fas fa-play"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach




        </div>

    </section>
    <!-- ==================== Gallery Area (End) ==================== -->



    <!-- ==================== Network & ALLIANCES Area (Start) ==================== -->
    <section class="testimonial">

        <div class="heading">
            <div class="content">
                <h2>testimonial</h2>
                <div class="design">
                    <span></span>
                    <img id="heading-img" src="{{ asset('website/images/Logo/Logo.png') }}" alt="">
                    <span></span>
                </div>
            </div>
        </div>

        <div class="swiper-container testimonial-slider">
            <div class="swiper-wrapper">
                @foreach ($testimonial as $item)
                    <div class="swiper-slide testi-item">
                        <div class="top_logo">
                            <img style="width: 50%;" src="{{ asset($item->image) }}" alt="">
                        </div>
                        <div style="text-align:justify">

                            {!! $item->description !!}
                        </div>
                    </div>
                @endforeach


            </div>

            <div class="swiper-pagination swiper-pagination2"></div>

        </div>

    </section>
    <!-- ==================== Network & ALLIANCES Area (End) ==================== -->



    <!-- ==================== Project Area (Start) ==================== -->
    <section class="blog main">

        <div class="heading">
            <div class="content">
                <h2>our Recent Project</h2>
                <div class="design">
                    <span></span>
                    <img id="heading-img" src="{{ asset('website/images/Logo/Logo.png') }}" alt="">
                    <span></span>
                </div>
            </div>
        </div>

        <div class="box-container">

            @foreach ($project as $item)
                <div class="blog-item">
                    <div class="image">
                        <img src="{{ asset($item->image) }}" alt="{{ $item->title }}">
                    </div>
                    <div class="content">

                        <a class="main-heading" href="{{ route('projectDetails', $item->id) }}">{{ $item->title }}</a>
                        <p>{!! Str::of($item->description)->limit(60) !!}</p>
                        <a href="{{ route('projectDetails', $item->id) }}" style="margin: 5px 0; float: right;"
                            class="btn">More Info</a>
                    </div>
                </div>
            @endforeach

        </div>
        <div style="text-align: center">
            <a href="{{ route('project') }}" style="text-align:center" class="btn">See All Projects</a>
        </div>

    </section>
    <!-- ==================== Project Area (End) ==================== -->

@endsection
