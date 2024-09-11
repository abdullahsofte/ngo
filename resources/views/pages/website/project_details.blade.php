@extends('layouts.website', ['pageName' => 'project'])
@section('title', 'Project Details ')
@section('web-content')

 
    <!-- ==================== Page-Title (Start) ==================== -->
    <div class="page-title">

        <div class="title">
            <h2>Project Details</h2>
        </div> 
   
        <div class="link">
            <a href="{{route('home')}}" class="fas fa-home"></a>
            <i class="fas fa-angle-double-right"></i>
            <span class="page">Project Details</span>
        </div>
  
    </div>
    <!-- ==================== Page-Title (End) ==================== -->


    
    <!-- ==================== Single Blog Details (Start) ==================== -->
    <section class="blog-details">

        <!-- ========== Blog-Info Container (Start) ========== -->
        <div class="blog-container">

            <div class="blog-info">

                <div class="image">
                    <img src="{{asset($project->image)}}" alt="{{$project->title}}">
                </div>

                <div class="content"> 


                    <h6 class="main-heading" href="#">{{ $project->title}}</h6>

                    <div style="text-align:justify">
                        {!! $project->description !!}
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
                    <h2>recent Project</h2>
                </div>

                <div class="box-container">
                    @foreach ($projectList as $item)
                        
                    <div class="recent-item">
                        <img src="{{asset($item->image)}}" alt="">
                        <div class="content">
                            <a class="main-heading" href="{{route('projectDetails', $item->id)}}">{{ $item->title}}</a>
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