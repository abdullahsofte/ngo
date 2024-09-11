@extends('layouts.website', ['pageName' => 'teachers'])
@section('title', 'Successful Students')
@section('web-content')
    <div id="main">
        <div class="breadcrumb-section">
            <div class="container">
                <h1>Successful Students</h1>
                <div class="breadcrumb">
                    <a href="{{ route('home') }}">Home</a>
                    <span class="fa fa-angle-double-right"></span>
                    <span class="current">Successful Students</span>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="dt-sc-two-third column first">

                <section id="primary" class="content-full-width pt-5">
                    <h2 class="dt-sc-hr-green-title mt-4">Successful Students</h2>
                    @php $newkey = [0, 5, 10, 15, 20, 25, 30, 35, 40, 45, 50, 55, 60]; @endphp
                    @foreach ($students as $key=>$item)
                      
                        <div class="column dt-sc-one-fifth teachersec {{ in_array($key, $newkey) ? 'first' : '' }}">
                            <div class="dt-sc-team">
                                <div class="image">
                                    <img class="item-mask" src="{{ asset('website/images/mask.png') }}" alt="" title="">
                                    <img src="{{ asset($item->image) }}" class="techImages" alt="Teacher Image" title="Teacher Image">
                                    <div class="dt-sc-image-overlay"></div>
                                </div>
                                <div class="team-details">
                                    <h5> {{ $item->name }} </h5>
                                    <h6> {{ $item->designation }} </h6>
                                    <p> {{ $item->batch }} </p>
                                </div>
                            </div>
                        </div>
                      
                    @endforeach
                </section>
            </div>
            @include('layouts.partials.web_sidebar')
        </div>
    </div>
@endsection
