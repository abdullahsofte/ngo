@extends('layouts.admin-master', ['pageName' => 'message', 'title' => 'All Customer Message'])

{{-- @section('title', 'Service') --}}
@section('admin-content')
    <!-- Breadcubs Area Start Here -->

    <div class="breadcrumbs-area d-flex justify-content-between">
        <div>
            <h3>Contact Message</h3>
        </div>
        <div class="">
            <ul>
                <li>
                    <a href="{{ route('dashboard') }}">Home</a>
                </li>
                <li>Admin</li>
            </ul>
        </div>

    </div>
    <!-- Breadcubs Area End Here -->
    <main class="vh-100">
        <div class="container-fluid">
            <div class="card my-3">
                <div class="card-header">
                    <i class="far fa-envelope"></i>
                    Messages
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($messages as $key=>$item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{!! $item->email !!}</td>
                                        <td>  {{ $item->subject }}  </td>
                                        <td>  {{ $item->message }} </td>
                                        <td>
                                            <a href="{{ route('admin.message.delete', $item->id) }}" type="submit"
                                                class="d-inline btn btn-danger btn-sm b-btn"
                                                onclick="return confirm('Are you sure you want to delete?');"><i
                                                    class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">Data Not Found</td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
