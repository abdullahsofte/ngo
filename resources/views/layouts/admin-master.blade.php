<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> {{ $title ?? '' }} | {{ $content->name }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset($content->logo) }}">
    <!-- Normalize CSS -->
    <link rel="stylesheet" href="{{ asset('backend/css/normalize.css') }}">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('backend/css/main.css') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('backend/css/bootstrap.min.css') }}">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('backend/css/all.min.css') }}">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="{{ asset('backend/fonts/flaticon.css') }}">
    <!-- Full Calender CSS -->
    <link rel="stylesheet" href="{{ asset('backend/css/fullcalendar.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
   
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('backend/css/animate.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
    <!-- Custom CSS -->
    <link href="{{ asset('css/admin-styles.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
    <!-- Modernize js -->
    <script src="{{ asset('backend/js/modernizr-3.6.0.min.js') }}"></script>
    @stack('admin-css')
</head>

<body>
    <!-- Preloader Start Here -->
    <div id="preloader"></div>
    <!-- Preloader End Here -->
    <div id="wrapper" class="wrapper bg-ash">
        <!-- Header Menu Area Start Here -->
        @include('layouts.partials.navbar')
        <!-- Header Menu Area End Here -->
        <!-- Page Area Start Here -->
        <div class="dashboard-page-one">
            <!-- Sidebar Area Start Here -->
            @include('layouts.partials.sidebar')
            <!-- Sidebar Area End Here -->
            <div class="dashboard-content-one ">

                <!-- Dashboard summery Start Here -->
                @yield('admin-content')
                <!-- Dashboard summery End Here -->


                <div class="modal fade" id="passwordChange" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Change Password</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('password.change') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <label for="">Old Password</label>
                                    <input type="password" name="old_password" class="form-control mb-1"
                                        placeholder="Enter Old Password">
                                    <label for="">New Password</label>
                                    <input type="password" class="form-control" name="password"
                                        placeholder="Enter New password">
                                </div>
                                <div class="modal-footer">
                                    <button type="reset"
                                        class="btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>
                                    <button type="submit"
                                        class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Footer Area Start Here -->
                {{-- <footer class="footer-wrap-layout1">
                     <div class="copyright">© {{ date('Y') }} Copyrights <a href="{{ route('home') }}" target="_blank">{{ $content->name }}</a>. All rights reserved. Designed by <a
                            href="#">Link-Up Technology LTD.</a></div>
                   </footer> --}}
                <!-- Footer Area End Here -->
            </div>
        </div>
        <!-- Page Area End Here -->
    </div>


    <!-- jquery-->
    <script src="{{ asset('backend/js/jquery-3.3.1.min.js') }}"></script>
    <!-- Plugins js -->
    <script src="{{ asset('backend/js/plugins.js') }}"></script>
    <!-- Popper js -->
    <script src="{{ asset('backend/js/popper.min.js') }}"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
    <!-- Counterup Js -->
    <script src="{{ asset('backend/js/jquery.counterup.min.js') }}"></script>
    <!-- Moment Js -->
    <script src="{{ asset('backend/js/moment.min.js') }}"></script>
    <!-- Waypoints Js -->
    <script src="{{ asset('backend/js/jquery.waypoints.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <!-- Scroll Up Js -->
    <script src="{{ asset('backend/js/jquery.scrollUp.min.js') }}"></script>
    <!-- Full Calender Js -->
    <script src="{{ asset('backend/js/fullcalendar.min.js') }}"></script>
    <!-- Chart Js -->
    <script src="{{ asset('backend/js/Chart.min.js') }}"></script>
    <!-- Custom Js -->
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    
    <script src="{{ asset('backend/js/main.js') }}"></script>


    <!-- Current Timer in Header -->
    <script type="text/javascript">
        setInterval(function() {
            var currentTime = new Date();
            var currentHours = currentTime.getHours();
            var currentMinutes = currentTime.getMinutes();
            var currentSeconds = currentTime.getSeconds();
            currentMinutes = (currentMinutes < 10 ? "0" : "") + currentMinutes;
            currentSeconds = (currentSeconds < 10 ? "0" : "") + currentSeconds;
            var timeOfDay = currentHours < 12 ? "AM" : "PM";
            currentHours = currentHours > 12 ? currentHours - 12 : currentHours;
            currentHours = currentHours == 0 ? 12 : currentHours;
            var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds + " " + timeOfDay;
            document.getElementById("timer").innerHTML = currentTimeString;
        }, 1000);
    </script>
    <!-- Current Timer in Header -->

    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info(" {{ Session::get('message') }} ");
                    break;

                case 'success':
                    toastr.success(" {{ Session::get('message') }} ");
                    break;

                case 'warning':
                    toastr.warning(" {{ Session::get('message') }} ");
                    break;

                case 'error':
                    toastr.error(" {{ Session::get('message') }} ");
                    break;
            }
        @endif
    </script>

    <script>
        @if (Session::has('success'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("{{ session('success') }}");
        @endif

        @if (Session::has('error'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error("{{ session('error') }}");
        @endif
    </script>

     <script type="text/javascript">
        $(document).ready(function() {

            $(document).on("click", "#delete", function(e) {
                e.preventDefault();

                var actionTo = $(this).attr("href");
                var token = $(this).attr("data-token");
                var id = $(this).attr("data-id");

                swal({
                        title: "Are You Sure?",
                        type: "success",
                        showCancelButton: true,
                        confirmButtonClass: "btn-success",
                        confirmButtonText: "Yes",
                        cancelButtonText: "No",
                        closeOnConfirm: false,
                        closeOnCancel: false,
                    },
                    function(isConfirm) {
                        if (isConfirm) {
                            $.ajax({
                                url: actionTo,
                                type: "post",
                                data: {
                                    id: id,
                                    _token: token
                                },
                                success: function(res) {
                                    if (res.success) {
                                        swal({
                                                title: "Deleted!",
                                                type: "success",
                                            },
                                            function(isConfirm) {
                                                if (isConfirm) {
                                                    $("." + id).fadeOut();
                                                    window.location.reload();
                                                }
                                            }
                                        );

                                    } else {
                                        swal({
                                            title: "This Name Used in Department .Please! Department delete first",
                                            type: "error",
                                        })
                                    }
                                },
                            });
                        } else {
                            swal("Cancelled", "", "error");
                        }
                    }
                );
                return false;
            });
        });
    </script>

    @stack('admin-js')
</body>

</html>
