@extends('layouts.website', ['pageName' => 'donat'])
@section('title', 'Donat ')
@section('web-content')
    <!-- ==================== Page-Title (Start) ==================== -->
    <div class="page-title">
        <div class="title">
            <h2 style="text-align: center;">Donate</h2>
        </div> 
    </div>
    <!-- ==================== Page-Title (End) ==================== -->
   
  

    <!-- ==================== Shop-Grid Area (Start) ==================== -->
    <section class="shop">
        <!-- ========== Shop Container (Start) ========== -->
        <div class="shop-container">

            <div class="intro">
                <div class="showing">
                    Donate Methods
                </div>
            </div>

            <div class="product-container grid">
                @foreach ($payment as $item)
                    
                <div class="product-item"> 
                    <div class="image">
                        <a href="{{route('donatDetails', $item->id)}}">
                            <img src="{{asset('uploads/payment/'.$item->image)}}" alt="">
                        </a>
                    </div>
                    <div class="content">
                        <a href="{{route('donatDetails', $item->id)}}"><h3>{{$item->title}}</h3></a> 
                    </div>
                </div>
                @endforeach
               

                
            </div>
        </div>
        <!-- ========== Shop Container (End) ========== --> 
    </section>
    <!-- ==================== Shop-Grid Area (End) ==================== -->
    
@endsection