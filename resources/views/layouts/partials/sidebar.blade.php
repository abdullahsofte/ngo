<div class="sidebar-main sidebar-menu-one sidebar-expand-md sidebar-color" style="min-height: 550px">
    <div class="mobile-sidebar-header d-md-none">
         <div class="header-logo">
             <a href="{{ route('dashboard') }}"><img src="{{ asset($content->logo) }}" alt="logo"></a>
         </div>
    </div>
     <div class="sidebar-menu-content">
         <ul class="nav nav-sidebar-menu sidebar-toggle-view">
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link"><i class="flaticon-dashboard"></i><span>Dashboard</span></a>
            </li>

             <li class="nav-item sidebar-nav-item">
                 <a href="#" class="nav-link"><i class="flaticon-books"></i><span>Website Content</span></a>
                 <ul class="nav sub-group-menu">
                     <li class="nav-item">
                         <a href="{{ route('slider.index') }}" class="nav-link"><i class="fas fa-angle-right"></i>Slider Entry</a>
                     </li>
                     <li class="nav-item">
                        <a href="{{route('admin.welcome')}}" class="nav-link"><i class="fas fa-angle-right"></i>Welcome Note</a>
                    </li>
                     <li class="nav-item">
                         <a href="{{route('admin.about')}}" class="nav-link"><i class="fas fa-angle-right"></i>About Us</a>
                     </li>
                     <li class="nav-item">
                         <a href="{{route('messageAdd')}}" class="nav-link"><i class="fas fa-angle-right"></i>Message</a>
                     </li>
                     <li class="nav-item">
                         <a href="{{route('admin.ctetabout')}}" class="nav-link"><i class="fas fa-angle-right"></i>CTET About</a>
                     </li>
                   
                     <li class="nav-item">
                         <a href="{{ route('news.index') }}" class="nav-link"><i class="fas fa-angle-right"></i>News Entry</a>
                     </li>
                     <li class="nav-item">
                         <a href="{{ route('event.index') }}" class="nav-link"><i class="fas fa-angle-right"></i>Event Entry</a>
                     </li>
                    
                     <li class="nav-item">
                         <a href="{{ route('project.index') }}" class="nav-link"><i class="fas fa-angle-right"></i>Project Entry</a>
                     </li>
                    
                     {{-- <li class="nav-item">
                         <a href="{{route('activity.index')}}" class="nav-link"><i class="fas fa-angle-right"></i>Activites</a>
                     </li> --}}
                   
                    
                     <li class="nav-item">
                         <a href="{{route('notice.index')}}" class="nav-link"><i class="fas fa-angle-right"></i>Notice </a>
                     </li>
                     <li class="nav-item">
                         <a href="{{route('service.index')}}" class="nav-link"><i class="fas fa-angle-right"></i>Service Entry </a>
                     </li>
                   
                     <li class="nav-item">
                         <a href="{{route('testimonial.index')}}" class="nav-link"><i class="fas fa-angle-right"></i>Testimonial Entry </a>
                     </li>
                     <li class="nav-item">
                         <a href="{{route('admin.banner')}}" class="nav-link"><i class="fas fa-angle-right"></i>Add Banner</a>
                     </li>
               
                 </ul>
             </li>
             <li class="nav-item sidebar-nav-item">
                <a href="#" class="nav-link"><i
                    class="flaticon-shopping-list"></i><span>Ctet Report</span></a>
                <ul class="nav sub-group-menu">
                
                    <li class="nav-item"><a href="{{route('ctet.index')}}" class="nav-link"><i class="fas fa-angle-right"></i>Ctet Entry</a></li>
                    <li class="nav-item"><a href="{{route('ctetactivity.index')}}" class="nav-link"><i class="fas fa-angle-right"></i>Ctet Activity </a></li>
                    <li class="nav-item"><a href="{{route('ctetreport.index')}}" class="nav-link"><i class="fas fa-angle-right"></i>Ctet Report </a></li>
                    <li class="nav-item"><a href="{{route('subreport.index')}}" class="nav-link"><i class="fas fa-angle-right"></i>Ctet Sub Report </a></li>
                    <li class="nav-item"><a href="{{route('year.index')}}" class="nav-link"><i class="fas fa-angle-right"></i> Report Year</a></li>
                    <li class="nav-item"><a href="{{route('report.index')}}" class="nav-link"><i class="fas fa-angle-right"></i> Report Entry</a></li>
                    <li class="nav-item"><a href="{{route('ict.index')}}" class="nav-link"><i class="fas fa-angle-right"></i> ICT</a></li>
                </ul>
            </li>
            
          
             <li class="nav-item sidebar-nav-item">
                <a href="#" class="nav-link"><i
                    class="flaticon-shopping-list"></i><span>Donate</span></a>
                <ul class="nav sub-group-menu">
                    <li class="nav-item"><a href="{{route('payment.type.index')}}" class="nav-link"><i class="fas fa-angle-right"></i>Payment Type</a></li>
                    <li class="nav-item"><a href="{{route('donateList')}}" class="nav-link"><i class="fas fa-angle-right"></i>Donate List</a></li>
                    
                </ul>
            </li>
             <li class="nav-item sidebar-nav-item">
                <a href="#" class="nav-link"><i
                    class="flaticon-shopping-list"></i><span>Gallery</span></a>
                <ul class="nav sub-group-menu">
                    {{-- <li class="nav-item"><a href="{{route('year.index')}}" class="nav-link"><i class="fas fa-angle-right"></i>Year Entry</a></li> --}}
                    <li class="nav-item"><a href="{{route('gallery.index')}}" class="nav-link"><i class="fas fa-angle-right"></i>Photo Gallery</a></li>
                    <li class="nav-item"><a href="{{route('videos.index')}}" class="nav-link"><i class="fas fa-angle-right"></i>Video Gallery </a></li>
                </ul>
            </li>
          
         

             <li class="nav-item sidebar-nav-item">
                <a href="#" class="nav-link"><i
                    class="flaticon-planet-earth"></i><span>Administration</span></a>
                <ul class="nav sub-group-menu">
                    <li class="nav-item">
                        <a href="{{ route('company.edit') }}" class="nav-link"><i class="fas fa-angle-right"></i>Company Profile</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('management.index')}}" class="nav-link"><i
                                class="fas fa-angle-right"></i>Management</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a href="{{route('admin.message')}}" class="nav-link"><i
                                class="fas fa-angle-right"></i>Contact Message</a>
                    </li> --}}
                    {{-- <li class="nav-item">
                        <a href="{{route('social.index')}}" class="nav-link"><i
                                class="fas fa-angle-right"></i>Social Links</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('important.index')}}" class="nav-link"><i
                                class="fas fa-angle-right"></i>Important Links</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('partner.index')}}" class="nav-link"><i
                                class="fas fa-angle-right"></i>Sister Concerns</a>
                    </li> --}}
                  
                </ul>
            </li>
             <li class="nav-item sidebar-nav-item">
                <a href="#" class="nav-link"><i
                    class="flaticon-settings"></i><span>Authentication</span></a>
                <ul class="nav sub-group-menu">
                 
                    <li class="nav-item">
                        <a href="{{ route('register.create') }}" class="nav-link"><i class="fas fa-angle-right"></i>User Create</a>
                    </li>
                </ul>
            </li>
         </ul>
     </div>
 </div> 