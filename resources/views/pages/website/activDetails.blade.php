@extends('layouts.website', ['pageName' => 'Activity'])
@section('title', 'Activity Details')
@section('web-content')
    <div id="main">
        <div class="breadcrumb-section">
            <div class="container">
                <h1>{{ $active->title }}</h1>
                <div class="breadcrumb">
                    <a href="{{ route('home') }}">Home</a>
                    <span class="fa fa-angle-double-right"></span>
                    <a href="{{route('activites')}}">Activities</a>
                    <span class="fa fa-angle-double-right"></span>
                    <span class="current">{{ $active->title }}</span>
                </div>
            </div>
        </div>

        <div class="container">
            <section id="primary" class="with-sidebar pt-5">
                <article class="blog-entry">
                    <div class="blog-entry-inner">
                        <div class="entry-meta">
                            <a href="#" class="blog-author"><img src="{{ asset($active->image) }}" alt="" title=""></a>
                            {{-- <div class="date">
                                <span> {{ date('d', strtotime($activelist->date)) }} </span>
                                <p> {{ date('M', strtotime($activelist->date)) }} <br> {{ date('Y', strtotime($activelist->date)) }} </p>
                            </div>
                            <a href="#" class="entry_format"><span class="fa fa-picture-o"></span></a> --}}
                        </div>
                        <div class="entry-thumb">
                            <a href="#"><img src="{{ asset($active->image) }}" alt="" title="" class="eventsimg"></a>
                        </div>
                        <div class="entry-details">
                            <div class="entry-title">
                                <h3> {{ $active->title }} </h3>
                            </div>

                            <div class="entry-body">
                                {!! $active->description !!}
                            </div>
                        </div>
                    </div>
                </article>
            </section>

            <section id="secondary">
                <aside class="widget widget_categories ">
                    <h3 class="widgettitle">Latest Activites </h3>
                    @foreach ($activelist as $item)
                    <div class="events-list "height="365">
                       <div class="event-thumb">
                           <a href="{{route('active.details',$item->id)}}" title="">
                               <img src="{{ asset($item->image) }}" class=""
                                   alt="" title="">
                           </a>
                       </div>
                       <div class="event-details">
                           <h2><a href="{{route('active.details',$item->id)}}">{{$item->title}}</a></h2>
                           <div class="event-meta"><span class="fa fa-calendar"></span> {{$item->date}}</div>
                           <div class="event-excerpt">
                               {!! Str::of($item->description)->words(16, '...');!!} <a href="{{route('active.details',$item->id)}}">read more</a>
                           </div>
                       </div>
                   </div>

                    @endforeach
                </aside>
            </section>
        </div>
    </div>
@endsection
