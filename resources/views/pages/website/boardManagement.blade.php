@extends('layouts.website', ['pageName' => 'chairman'])
@section('title', 'Board Of Management')
@section('web-content')
    <div id="main">
        <div class="breadcrumb-section">
            <div class="container">
                <h1>Key Persons of the Institute</h1>
                <div class="breadcrumb">
                    <a href="{{ route('home') }}">Home</a>
                    <span class="fa fa-angle-double-right"></span>
                    <span class="current">Key Persons of the Institute</span>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="dt-sc-two-third column first">
                <section id="primary" class="content-full-width pb-5">
                    <div class="dt-sc-hr"></div>
                    {{-- Founder Message --}}
                    <section id="teacher" class="teacher pt-5">
                        <div class=" clearfix">
                            <h2 class="dt-sc-hr-green-title"> Key Persons of the Institute</h2>
                            @php $studentkey = [0, 4, 8, 12, 16, 20, 24, 28, 32, 36, 40, 44, 48, 52]; @endphp
                            @foreach ($management as $key => $item)
                                <div
                                    class="column dt-sc-one-fourth student {{ in_array($key, $studentkey) ? 'first' : '' }} mb-3">
                                    <div class="dt-sc-team">
                                        <div class="image">
                                            <a href=""><img src="{{ asset('uploads/management/' . $item->image) }}"
                                                    class="manageImages" alt="Students Image" title="Students Image"></a>
                                            <div class="dt-sc-image-overlay"></div>
                                        </div>
                                        <div class="team-details">
                                            <h5> <a href="{{ route('management.details', $item->id) }}">{{ $item->name }}</a></h5>
                                            <p> {{ $item->designation }} </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </section>
                </section>
            </div>

            @include('layouts.partials.web_sidebar')

        </div>
    </div>
@endsection
