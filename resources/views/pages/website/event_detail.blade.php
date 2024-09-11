@extends('layouts.website', ['pageName' => 'Event'])
@section('title', 'Event Details ')
@section('web-content')

 
    <!-- ==================== Page-Title (Start) ==================== -->
    <div class="page-title">

        <div class="title">
            <h2>Event Details</h2>
        </div> 
   
        <div class="link">
            <a href="{{route('home')}}" class="fas fa-home"></a>
            <i class="fas fa-angle-double-right"></i>
            <span class="page">Event Details</span>
        </div>
  
    </div>
    <!-- ==================== Page-Title (End) ==================== -->


    
    <!-- ==================== Single Blog Details (Start) ==================== -->
    <section class="blog-details">

        <!-- ========== Blog-Info Container (Start) ========== -->
        <div class="blog-container">

            <div class="blog-info">

                <div class="image">
                    <img src="{{asset($event->image)}}" alt="{{$event->title}}">
                </div>

                <div class="content"> 


                    <h6 class="main-heading" href="#">{{ $event->title}}</h6>

                    <div style="text-align:justify">
                        {!! $event->description !!}
                    </div>
                   
                    
                </div>
            </div>


        </div> 
        <!-- ========== Blog-Info Container (End) ========== --> 



        <!-- ========== Blog Sidebar Area (Start) ========== -->
        <div class="sidebar blog-sidebar">
       

            <!-- Recent Posts Area (Start) -->
            <div class="recent-post sidebar-item">

                <div class="sidebar-heading">
                    <h2>recent Event</h2>
                </div>

                <div class="box-container">
                    @foreach ($eventlist as $item)
                        
                    <div class="recent-item">
                        <img src="{{asset($item->image)}}" alt="">
                        <div class="content">
                            <a class="main-heading" href="{{route('eventDetails', $item->id)}}">{{ $item->title}}</a>
                        </div>
                    </div>
                    @endforeach

              
                </div>

            </div>
            <!-- Recent Posts Area (End) -->



 
        </div>
        <!-- ========== Blog Sidebar Area (End) ========== -->


    </section>
    
@endsection