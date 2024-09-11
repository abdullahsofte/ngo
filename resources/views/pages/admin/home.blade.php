@extends('layouts.admin-master', ['pageName'=> 'dashboard', 'title' => 'Dashboard'])
@section('title', 'Dashboard')
@section('admin-content')

     <!-- Breadcubs Area Start Here -->
     
     {{-- <div class="breadcrumbs-area d-flex justify-content-between">
       <div> 
        <h3>Admin Dashboard</h3>
        </div>
        <div class=""> 
         <ul>
            <li>
                <a href="index-2.html">Home</a>
            </li>
            <li>Admin</li>
         </ul>
       </div>
     
    </div> --}}
    <!-- Breadcubs Area End Here -->
 <div class="card" style="margin: 20px">
    <div class="card-body">
        <div class="row gutters-20 ">
            <div class="col-lg-10 m-auto" >
             <div class=" " style="margin-top:100px; ">
                <div class=" text-center" style="padding:60px">
                    <h1>Welcome To</h1>
                    <img style="height: 100px;width:100px" src="{{ asset($content->logo) }}" alt="">
                    <h1>  {{$content->name}}</h1>
                 </div>
            </div>
           </div>
          
        </div>
    </div>
 </div>
@endsection