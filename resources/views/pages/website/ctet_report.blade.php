@extends('layouts.website')
@section('title', 'Ctet Reports')
@section('web-content')

  <!-- ==================== Page-Title (Start) ==================== -->
  <div class="page-title">

    <div class="title">
      <h2>Reports</h2>
    </div> 

    <div class="link">
      <a href="{{route('home')}}" class="fas fa-home"></a>
      <i class="fas fa-angle-double-right"></i>
      <span class="page">Reports - CTET REPORTS</span>
    </div>

  </div>
  <!-- ==================== Page-Title (End) ==================== -->



  <!-- ==================== Reports Area (Start) ==================== -->
  <section id="reports" class="gallery">

    <ul class="controls">
      @foreach ($ctetReport as $key=> $item)
          
      <li class="button {{$key==0 ? 'active' : ''}}" data-filter="Inception{{$item->id}}">{{$item->title}}</li>
      @endforeach

    </ul>
  </hr>

    <div class="box-container">
      <!-- Inception Images -->

      @foreach ($ctetSubReport as $sl=> $subreport)
        @if (isset($subreport->subreportImage))
          @foreach ($subreport->subreportImage as $key=> $item)
              
            <div class="gallery-item image single Inception{{ $subreport->report_id }}"  @if($sl == 0) style="display:block" @else style="display: none" @endif >
              <img src="{{asset($item->multiimage)}}" alt="Gallery-Image">
              <div class="content">
                <a href="{{asset($item->multiimage)}}"><i class="fas fa-plus"></i></a>
              </div>
            </div>
          @endforeach
        @endif

      @endforeach

   
  
    </div>

  </section>
  <!-- ==================== Gallery Area (End) ==================== -->

    
@endsection