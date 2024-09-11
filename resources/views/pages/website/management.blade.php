@extends('layouts.website', ['pageName' => 'management'])
@section('title', 'Management')

@section('web-content')

<section id="product-background" class="product-background d-flex" style="background-image: url('{{ asset($backimage->bgimage_other) }}')">
    <div class="container align-self-center">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-12">
                <nav aria-label="breadcrumb" style="--bs-breadcrumb-divider: '';">
                    <ol class="breadcrumb justify-content-center">
                      <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                      <span>&nbsp;/&nbsp;</span>
                      <li class="breadcrumb-item active" aria-current="page">Management</li>
                    </ol>
                  </nav>
            </div>
        </div>
    </div>
</section>
<section id="team" class="our-team section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-12">
                <h2 class="fs-2 fw-bold text-center text-uppercase text-white"><span class="section-border">Meet our
                        Management</span></h2>
            </div>
        </div>
        <div class="row gy-3">
            @foreach ($management as $item)
                <div class="col-md-3 col-12">
                    <div class="team-box">
                        <div class="img-box">
                            <div class="icon-box">
                                <ul class="link-icons justify-content-around">
                                    <li><a href="{{ $item->facebook }}" target="_blank"><i
                                                class="fa-brands fa-facebook-f"></i></a></li>
                                    <li><a href="{{ $item->twitter }}" target="_blank"><i
                                                class="fa-brands fa-twitter"></i></a></li>
                                    <li><a href="{{ $item->instagram }}" target="_blank"><i
                                                class="fa-brands fa-instagram"></i></a></li>
                                </ul>
                            </div>
                            <img src="{{ asset('uploads/management/' . $item->image) }}" alt="{{ $item->name }}"
                                class="img-fluid">
                        </div>
                        <h5 class="product-title text-center mt-4">{{ $item->name }}</h5>
                        <p class="text-designation text-center">{{ $item->designation }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection