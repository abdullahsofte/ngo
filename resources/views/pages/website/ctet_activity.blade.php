@extends('layouts.website')
@section('title', 'Ctet Activity')
@section('web-content')

    <!-- ==================== Page-Title (Start) ==================== -->
    <div class="page-title">

        <div class="title">
            <h2>CTET</h2>
        </div>

        <div class="link">
            <a href="{{ route('home') }}" class="fas fa-home"></a>
            <i class="fas fa-angle-double-right"></i>
            <span class="page">CTET - Activity</span>
        </div>

    </div>
    <!-- ==================== Page-Title (End) ==================== -->



    <!-- ==================== Reports Area (Start) ==================== -->
    <section id="ctet" class="gallery" style="min-height: 600px">

        <ul class="controls">
            @foreach ($ctet as $key => $ctActive)
                <li class="button {{ $key == 0 ? 'active' : '' }}" data-filter="Inception{{ $ctActive->id }}">
                    {{ $ctActive->title }}</li>
            @endforeach

        </ul>
        <div class="box-container">
            <!-- Inception Images -->
            @foreach ($ctet as $sl => $ctActive)
                @if (isset($ctActive->ctetActive))
                    @foreach ($ctActive->ctetActive as $item)
                        <div class="box-item image Inception{{ $item->ctet_id }}"
                            @if ($sl == 0) style="display:block" @else style="display: none" @endif>
                            <div>
                                {!! $item->description !!}
                            </div>
                        </div>
                    @endforeach
                @endif
            @endforeach

        </div>

    </section>
    <!-- ==================== Gallery Area (End) ==================== -->
@endsection
