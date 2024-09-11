@extends('layouts.website', ['pageName' => 'donat'])
@section('title', 'Donat ')
@section('web-content')
   
 <!-- ==================== Page-Title (Start) ==================== -->
 <div class="page-title">

    <div class="title">
      <h2>Donate</h2>
    </div> 

    <div class="link">
      <a href="{{route('home')}}" class="fas fa-home"></a>
      <i class="fas fa-angle-double-right"></i>
      <span class="page">Donate - {{$payment->title}}</span>
    </div>

  </div>
  <!-- ==================== Page-Title (End) ==================== -->
  
 

  <!-- ==================== Checkout Area (Start) ==================== -->
  <section>

    <div class="checkout">

      <div class="box-2"> 
        <!-- ========== Payment-Method Area (Start) ========== -->
        <div class="payment-methods checkout-item">

          <div class="heading"> 
            <h2>payment method</h2> 
          </div>
           @if (isset($payment->description))
               
           <div class="content">
             <div class="form">
               <input readonly type="text" value="Gateway : {{$payment->title}}" class="box">
               <input readonly type="text" value="Send Money : 017XXXXXXXX" class="box">
             </div>
             <ul style="list-style: none;">
               <li><h6>HOW TO PAY</h6></li>
             {!! @$payment->description!!}
             </ul>
 
           </div>
           @endif

        </div>
        <!-- ========== Payment-Method Area (End) ========== -->
      </div>

      <div class="box-1">

        <!-- ========== Billing-Address Area (Start) ========== -->
        <div class="billing address checkout-item">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li style="list-style-type: none; color:red;font-size:15px">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif

          @if (session('success'))
              <div class="alert alert-success" style="color: green;font-size:26px">
                  {{ session('success') }}
              </div>
          @endif

          <div class="heading">
            <h2>Donor Information</h2>
          </div>

          <form class="form" action="{{route('store.donate')}}" enctype="multipart/form-data" method="POST">
            @csrf
           

            <input readonly type="text" name="gateway" placeholder="company" id="b-company" class="box" value="Payment Gateway - {{$payment->title}}">
           
            <input type="text" name="name" placeholder="Name" id="b-first-name" class="box" required>
            <input type="text" name="phone" placeholder="Phone Number" id="b-company" class="box" required>
            <input type="text" name="transaction" placeholder="Transaction ID" id="b-country" class="box" required>
            <input type="text" name="message" placeholder="Message" id="b-country" class="box">
            
            <button class="btn">Donate</button>
          </form>

        </div>
        <!-- ========== Billing-Address Area (End) ========== -->
      </div>

    </div>

  </section>
  <!-- ==================== Checkout Area (End) ==================== -->
    
@endsection