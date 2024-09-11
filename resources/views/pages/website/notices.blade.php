@extends('layouts.website')
@section('title', 'Notice')

@section('web-content')
    <!-- ==================== Page-Title (Start) ==================== -->
    <div class="page-title">

        <div class="title">
            <h2 style="text-align: center;">Notice Board</h2>
        </div> 
    
      </div>
      <!-- ==================== Page-Title (End) ==================== -->
    
    
    
      <!-- ==================== Notice Area (Start) ==================== -->
      <section class="cart">
    
        <!-- ========== Shopping-Cart Area (Start) ========== -->
        <div class="shopping-cart">
    
            <div class='container'>
    
              <table class="notice-table">
                <tr class="notice_tr">
                  <th>SL</th>
                  <th>Date</th>
                  <th>Description</th>
                  <th>Action</th>
                </tr>
                @foreach ($notice as $sl=> $item)
                <tr class="t_body">
                  <td>{{$sl+1}}</td>
                  <td>{{ $item->title }}</td>
                  <td>{!! $item->description !!}</td>
                  <td>
                    <a href="{{$item->link}}" target="_blank" title="View" class="notice-viw"><i class="fas fa-eye"></i></a>
                   <a href="{{$item->link}}" download="" title="Download" class="notice-dwn"><i class="fas fa-download"></i></a>
                  </td>
                </tr>
                @endforeach
               
              </table>
    
            </div>
            
        </div>
        <!-- ========== Shopping-Cart Area (End) ========== -->
    
      </section>
      <!-- ==================== PDF Area (End) ==================== -->

@endsection
