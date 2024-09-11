@extends('layouts.website', ['pageName' => 'Principal'])
@section('title', 'Report Publication')

@section('web-content')
    <div id="main">
        <div class="breadcrumb-section">
            <div class="container">
                <h1> Report Publication</h1>
                <div class="breadcrumb">
                    <a href="{{ route('home') }}">Home</a>
                    <span class="fa fa-angle-double-right"></span>
                    <span class="current"> Report Publication</span>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="dt-sc-two-third column first">
                <div  class=" py-5">
                    <div class="group">
                        <div class="row">
                            <div class="span12">
                                <table style="margin-top: 20px; " class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th>SL</th>
                                            <th> Date</th>
                                            <th> Title</th>
                                            <th>View &amp; Download</th>
                                        </tr>
        
                                       @foreach ($report as $key=>$item)
                                       <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$item->date}}</td>
                                        <td>{{$item->title}}</td>
                                        <td>
                                            <a href="{{asset($item->file)}}"
                                                target="_blank" class="btn btn-info">view</a>
                                            <a href="{{asset($item->file)}}"
                                                download="" class="btn btn-dangers">Download</a>
                                        </td>
                                    </tr>
                                       @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.partials.web_sidebar')

        </div>

    </div>

@endsection


