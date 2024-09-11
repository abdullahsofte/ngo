@extends('layouts.website', ['pageName' => 'chairman'])
@section('title', 'Chairman Message')
@section('web-content')
    <div id="main">
        <div class="breadcrumb-section">
            <div class="container">
                <h1>{{$chairman->designation}} </h1>
                <div class="breadcrumb">
                    <a href="{{ route('home') }}">Home</a>
                    <span class="fa fa-angle-double-right"></span>
                    <span class="current">{{$chairman->designation}} Message</span>
                </div>
            </div>
        </div>

        <div class="container">
            <section id="primary" class="content-full-width pt-5 pb-5">
                <div class="dt-sc-hr"></div>
                {{-- Founder Message --}}
                @foreach ($management as $chair)
                 
                  <div class="dt-sc-one column " id="chairman-message" style="margin-bottom:20px">
                    <h2>{{ $chair->designation }} Message </h2>
                    <div class="author-details">
                        <div class="dt-sc-one-third column first">
                            <img src="{{ asset('uploads/management/'.$chair->image) }}" alt="" title="">
                        </div>
                        <div class="dt-sc-two-third column ">
                            <h5><a href="#">{{ $chair->name }}</a></h5>
                            {{-- <span class="author-role">{{ $chair->designation }}</span> --}}
                            <div class="justify">{!! $chair->description !!}</div>
                        </div>
                    </div>
                </div>
                
                @endforeach
            </section>
          
        </div>

        <div class="dt-sc-hr"></div>
    </div>
@endsection

