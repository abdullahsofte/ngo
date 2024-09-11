@extends('layouts.website', ['pageName' => 'facilities'])
@section('title', 'Facilities')
@section('web-content')
    <div id="main">
        <div class="breadcrumb-section">
            <div class="container">
                <h1>Facilities</h1>
                <div class="breadcrumb">
                    <a href="{{ route('home') }}">Home</a>
                    <span class="fa fa-angle-double-right"></span>
                    <span class="current">Facilities</span>
                </div>
            </div>
        </div>

        {{--  Boy's Hostel  --}}
        <div class="container" id="boyshostel">
            <h2 class="dt-sc-hr-green-title pt-5">{{ "Boy's Hostel" }}</h2>

            @php $bhoskey = [0, 2, 4, 6, 8, 10, 12, 14, 16, 18, 20]; @endphp
            @foreach ($boyshostel as $key=>$boyhostel)
                @if (in_array($key, $bhoskey))
                    <section id="primary" class="content-full-width pb-5">
                        <div class="column dt-sc-one-half first">
                            <img src="{{ asset($boyhostel->image) }}" alt="Boy's Hostel" title="Boy's Hostel" class="facImg">
                        </div>

                        <div class="column dt-sc-one-half">
                            <h2>{{ $boyhostel->title }}</h2>
                            <div class="justify">{!! $boyhostel->description !!}</div>
                        </div>
                    </section>
                @else
                    <section id="primary" class="content-full-width pb-5">
                        <div class="column dt-sc-one-half first">
                            <h2>{{ $boyhostel->title }}</h2>
                            <div class="justify">{!! $boyhostel->description !!}</div>
                        </div>

                        <div class="column dt-sc-one-half">
                            <img src="{{ asset($boyhostel->image) }}" alt="Boy's Hostel" title="Boy's Hostel" class="facImg">
                        </div>
                    </section>
                @endif
            @endforeach

        </div>

        {{--  Girl's Hostel  --}}
        <div class="container" id="girlshostel">
            <h2 class="dt-sc-hr-green-title pt-5">{{ "Girl's Hostel" }}</h2>

            @php $ghoskey = [0, 2, 4, 6, 8, 10, 12, 14, 16, 18, 20]; @endphp
            @foreach ($girlshostel as $key=>$girlhostel)
                @if (in_array($key, $ghoskey))
                    <section id="primary" class="content-full-width pb-5">
                        <div class="column dt-sc-one-half first">
                            <img src="{{ asset($girlhostel->image) }}" alt="Girl's Hostel" title="Girl's Hostel" class="facImg">
                        </div>

                        <div class="column dt-sc-one-half">
                            <h2>{{ $girlhostel->title }}</h2>
                            <div class="justify">{!! $girlhostel->description !!}</div>
                        </div>
                    </section>
                @else
                    <section id="primary" class="content-full-width pb-5">
                        <div class="column dt-sc-one-half first">
                            <h2>{{ $girlhostel->title }}</h2>
                            <div class="justify">{!! $girlhostel->description !!}</div>
                        </div>

                        <div class="column dt-sc-one-half">
                            <img src="{{ asset($girlhostel->image) }}" alt="Girl's Hostel" title="Girl's Hostel" class="facImg">
                        </div>
                    </section>
                @endif
            @endforeach

        </div>

        {{--  Transport - Haice  --}}
        <div class="container" id="transport-haice">
            <h2 class="dt-sc-hr-green-title pt-5">Transport - Haice</h2>

            @php $haicekey = [0, 2, 4, 6, 8, 10, 12, 14, 16, 18, 20]; @endphp
            @foreach ($haices as $key=>$haice)
                @if (in_array($key, $haicekey))
                    <section id="primary" class="content-full-width pb-5">
                        <div class="column dt-sc-one-half first">
                            <img src="{{ asset($haice->image) }}" alt="Transport - Haice" title="Transport - Haice" class="facImg">
                        </div>

                        <div class="column dt-sc-one-half">
                            <h2>{{ $haice->title }}</h2>
                            <div class="justify">{!! $haice->description !!}</div>
                        </div>
                    </section>
                @else
                    <section id="primary" class="content-full-width pb-5">
                        <div class="column dt-sc-one-half first">
                            <h2>{{ $haice->title }}</h2>
                            <div class="justify">{!! $haice->description !!}</div>
                        </div>

                        <div class="column dt-sc-one-half">
                            <img src="{{ asset($haice->image) }}" alt="Transport - Haice" title="Transport - Haice" class="facImg">
                        </div>
                    </section>
                @endif
            @endforeach
        </div>

        {{--  Transport - Bus  --}}
        <div class="container" id="transport-bus">
            <h2 class="dt-sc-hr-green-title pt-5">Transport - Bus</h2>

            @php $buskey = [0, 2, 4, 6, 8, 10, 12, 14, 16, 18, 20]; @endphp
            @foreach ($buses as $key=>$bus)
                @if (in_array($key, $buskey))
                    <section id="primary" class="content-full-width pb-5">
                        <div class="column dt-sc-one-half first">
                            <img src="{{ asset($bus->image) }}" alt="Transport - Bus" title="Transport - Bus" class="facImg">
                        </div>

                        <div class="column dt-sc-one-half">
                            <h2>{{ $bus->title }}</h2>
                            <div class="justify">{!! $bus->description !!}</div>
                        </div>
                    </section>
                @else
                    <section id="primary" class="content-full-width pb-5">
                        <div class="column dt-sc-one-half first">
                            <h2>{{ $bus->title }}</h2>
                            <div class="justify">{!! $bus->description !!}</div>
                        </div>

                        <div class="column dt-sc-one-half">
                            <img src="{{ asset($bus->image) }}" alt="Transport - Bus" title="Transport - Bus" class="facImg">
                        </div>
                    </section>
                @endif
            @endforeach
        </div>

        {{--  Computer Lab  --}}
        <div class="container" id="computer-lab">
            <h2 class="dt-sc-hr-green-title pt-5">Computer Lab</h2>

            @php $comkey = [0, 2, 4, 6, 8, 10, 12, 14, 16, 18, 20]; @endphp
            @foreach ($computerlab as $key=>$computer)
                @if (in_array($key, $comkey))
                    <section id="primary" class="content-full-width pb-5">
                        <div class="column dt-sc-one-half first">
                            <img src="{{ asset($computer->image) }}" alt="Computer Lab" title="Computer Lab" class="facImg">
                        </div>

                        <div class="column dt-sc-one-half">
                            <h2>{{ $computer->title }}</h2>
                            <div class="justify">{!! $computer->description !!}</div>
                        </div>
                    </section>
                @else
                    <section id="primary" class="content-full-width pb-5">
                        <div class="column dt-sc-one-half first">
                            <h2>{{ $computer->title }}</h2>
                            <div class="justify">{!! $computer->description !!}</div>
                        </div>

                        <div class="column dt-sc-one-half">
                            <img src="{{ asset($computer->image) }}" alt="Computer Lab" title="Computer Lab" class="facImg">
                        </div>
                    </section>
                @endif
            @endforeach
        </div>

        {{-- Science Lab --}}
        <div class="container" id="science-lab">
            <h2 class="dt-sc-hr-green-title pt-5">Science Lab</h2>

            @php $scikey = [0, 2, 4, 6, 8, 10, 12, 14, 16, 18, 20]; @endphp
            @foreach ($sciencelab as $key=>$science)
                @if (in_array($key, $scikey))
                    <section id="primary" class="content-full-width pb-5">
                        <div class="column dt-sc-one-half first">
                            <img src="{{ asset($science->image) }}" alt="Science Lab" title="Science Lab" class="facImg">
                        </div>

                        <div class="column dt-sc-one-half">
                            <h2>{{ $science->title }}</h2>
                            <div class="justify">{!! $science->description !!}</div>
                        </div>
                    </section>
                @else
                    <section id="primary" class="content-full-width pb-5">
                        <div class="column dt-sc-one-half first">
                            <h2>{{ $science->title }}</h2>
                            <div class="justify">{!! $science->description !!}</div>
                        </div>

                        <div class="column dt-sc-one-half">
                            <img src="{{ asset($science->image) }}" alt="Science Lab" title="Science Lab" class="facImg">
                        </div>
                    </section>
                @endif
            @endforeach
        </div>

        {{-- Chemistry Lab --}}
        <div class="container" id="chemistry-lab">
            <h2 class="dt-sc-hr-green-title pt-5">Chemistry Lab</h2>

            @php $chemkey = [0, 2, 4, 6, 8, 10, 12, 14, 16, 18, 20]; @endphp
            @foreach ($chemistrylab as $key=>$chemistry)
                @if (in_array($key, $chemkey))
                    <section id="primary" class="content-full-width pb-5">
                        <div class="column dt-sc-one-half first">
                            <img src="{{ asset($chemistry->image) }}" alt="Chemistry Lab" title="Chemistry Lab" class="facImg">
                        </div>

                        <div class="column dt-sc-one-half">
                            <h2>{{ $chemistry->title }}</h2>
                            <div class="justify">{!! $chemistry->description !!}</div>
                        </div>
                    </section>
                @else
                    <section id="primary" class="content-full-width pb-5">
                        <div class="column dt-sc-one-half first">
                            <h2>{{ $chemistry->title }}</h2>
                            <div class="justify">{!! $chemistry->description !!}</div>
                        </div>

                        <div class="column dt-sc-one-half">
                            <img src="{{ asset($chemistry->image) }}" alt="Chemistry Lab" title="Chemistry Lab" class="facImg">
                        </div>
                    </section>
                @endif
            @endforeach
        </div>

        {{-- Biology Lab --}}
        <div class="container" id="biology-lab">
            <h2 class="dt-sc-hr-green-title pt-5">Biology Lab</h2>

            @php $biokey = [0, 2, 4, 6, 8, 10, 12, 14, 16, 18, 20]; @endphp
            @foreach ($biologylab as $key=>$biology)
                @if (in_array($key, $biokey))
                    <section id="primary" class="content-full-width pb-5">
                        <div class="column dt-sc-one-half first">
                            <img src="{{ asset($biology->image) }}" alt="Biology Lab" title="Biology Lab" class="facImg">
                        </div>

                        <div class="column dt-sc-one-half">
                            <h2>{{ $biology->title }}</h2>
                            <div class="justify">{!! $biology->description !!}</div>
                        </div>
                    </section>
                @else
                    <section id="primary" class="content-full-width pb-5">
                        <div class="column dt-sc-one-half first">
                            <h2>{{ $biology->title }}</h2>
                            <div class="justify">{!! $biology->description !!}</div>
                        </div>

                        <div class="column dt-sc-one-half">
                            <img src="{{ asset($biology->image) }}" alt="Biology Lab" title="Biology Lab" class="facImg">
                        </div>
                    </section>
                @endif
            @endforeach
        </div>

        {{-- Health Service --}}
        <div class="container" id="health-service">
            <h2 class="dt-sc-hr-green-title pt-5">Health Service</h2>

            @php $healthkey = [0, 2, 4, 6, 8, 10, 12, 14, 16, 18, 20]; @endphp
            @foreach ($healthservices as $key=>$health)
                @if (in_array($key, $healthkey))
                    <section id="primary" class="content-full-width pb-5">
                        <div class="column dt-sc-one-half first">
                            <img src="{{ asset($health->image) }}" alt="Health Service" title="Health Service" class="facImg">
                        </div>

                        <div class="column dt-sc-one-half">
                            <h2>{{ $health->title }}</h2>
                            <div class="justify">{!! $health->description !!}</div>
                        </div>
                    </section>
                @else
                    <section id="primary" class="content-full-width pb-5">
                        <div class="column dt-sc-one-half first">
                            <h2>{{ $health->title }}</h2>
                            <div class="justify">{!! $health->description !!}</div>
                        </div>

                        <div class="column dt-sc-one-half">
                            <img src="{{ asset($health->image) }}" alt="Health Service" title="Health Service" class="facImg">
                        </div>
                    </section>
                @endif
            @endforeach
        </div>
        {{-- canteen  --}}
        <div class="container" id="canteen">
            <h2 class="dt-sc-hr-green-title pt-5">Canteen</h2>

            @php $canteenhkey = [0, 2, 4, 6, 8, 10, 12, 14, 16, 18, 20]; @endphp
            @foreach ($canteen as $key=>$Canteen)
                @if (in_array($key, $canteenhkey))
                    <section id="primary" class="content-full-width pb-5">
                        <div class="column dt-sc-one-half first">
                            <img src="{{ asset($Canteen->image) }}" alt="Health Service" title="Health Service" class="facImg">
                        </div>

                        <div class="column dt-sc-one-half">
                            <h2>{{ $Canteen->title }}</h2>
                            <div class="justify">{!! $Canteen->description !!}</div>
                        </div>
                    </section>
                @else
                    <section id="primary" class="content-full-width pb-5">
                        <div class="column dt-sc-one-half first">
                            <h2>{{ $Canteen->title }}</h2>
                            <div class="justify">{!! $Canteen->description !!}</div>
                        </div>

                        <div class="column dt-sc-one-half">
                            <img src="{{ asset($Canteen->image) }}" alt="Health Service" title="Health Service" class="facImg">
                        </div>
                    </section>
                @endif
            @endforeach
        </div>

    </div>
@endsection

{{--  @push('web-js')
    <script data-cfasync="false" src="{{ asset('../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js') }}"></script><script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="{{ asset('website/js/jquery.tabs.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('website/js/jquery.isotope.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('website/js/jquery.carouFredSel-6.2.0-packed.js') }}"></script>
@endpush  --}}
