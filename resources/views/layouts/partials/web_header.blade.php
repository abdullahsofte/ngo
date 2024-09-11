<header>

    <!-- ===== Header Area (Start) ===== -->
    <div class="header">

      <div class="header-0">
          <div class="box-container">
            <!-- Icons -->
            <div class="action">
              <div class="icon-container">
                <a href="{{$content->facebook}}" target="_blank" id="login" class="icon fab fa-facebook-f"></a>
                <a href="{{$content->linkedin}}" target="_blank" id="login" class="icon fab fa-linkedin-in"></a>
                <a href="{{$content->twitter}}" target="_blank" id="login" class="icon fab fa-twitter"></a>
                <a href="{{$content->youtube}}" target="_blank" id="login" class="icon fab fa-youtube"></a>
              </div>
            </div>
            <!-- Link -->
            <div class="action">
              <div class="icon-container">
                <a href="#" id="login" class="icon fas fa-home"><span style="margin-left: 5px; font-weight: 500;">Bangladesh</span></a>
                <a href="#" id="login" class="icon fas fa-sync "><span style="margin-left: 5px; font-weight: 500;">Secretariate of ADAB</span></a>
              </div>
            </div>
          </div>
      </div>

      <div class="header-1">

        <!-- Logo --> 
        <a class="logo" href="{{route('home')}}">
          <img src="{{asset($content->logo)}}" alt="logo">
          <div class="logo-name">
            <h3>{{$content->name}}</h3>
            <p>{{ $content->f_title}}</p>
          </div>
        </a>

        <ul class="header-contacts">
          <li><i class="fas fa-envelope"></i><h6>email:</h6><span class="gmail">{{$content->email }}</span></li>
          <li><i class="fas fa-phone"></i><h6>phone:</h6><span> {{ $content->phone}}</span></li>
        </ul>

        <a href="{{route('donat')}} " class="btn">donate</a>
        
      </div>

      <div class="header-2">

        <!-- Navbar --> 
        <nav class="navbar">

          <a class="nav-btn" href="{{route('home')}}">home</a>

          <div class="dropdown-menu">
              <button class="nav-btn">Who we are <i class="fas fa-angle-down"></i> </button>
              <div class="dropdown-content">
                  <a href="{{route('about')}}">history</a>
                  <a href="{{route('missionVision')}}">mission and vision</a>
                  <a href="{{route('messagePage')}}">messeges</a>
              </div>
          </div>

          @php
              $year = App\Models\Year::latest()->get();
          @endphp

          <div class="dropdown-menu">
              <button class="nav-btn">Reports <i class="fas fa-angle-down"></i> </button>
              <div class="dropdown-content">
                  <a href="{{route('ctetRreports')}}">
                      CTET - REPORTS
                  </a>
                  @foreach ($year as $item)
                      
                  <a href="{{route('yearWise', $item->id)}}"> {{$item->year}} </a>
                  @endforeach
                 
              </div>
          </div> 

          <div class="dropdown-menu">
              <button class="nav-btn">Ctet <i class="fas fa-angle-down"></i> </button>
              <div class="dropdown-content">
                  <a href="{{route('ctetAbout')}}">ctet-about</a>
                  <a href="{{route('ctetActivity')}}">ctet-activity</a>
              </div>
          </div> 

          <a class="nav-btn" href="{{route('ictPage')}}">ICT</a>

          <a class="nav-btn" href="{{route('donat')}}">Donate</a>

          <div class="dropdown-menu">
            <button class="nav-btn">Notice <i class="fas fa-angle-down"></i> </button>
            <div class="dropdown-content">
              <a href="{{route('notices')}}">All Notice</a>
              <a href="{{route('news')}}">All News</a>
              <a href="{{route('events')}}">All Events</a>
            </div>
          </div> 

          <div class="dropdown-menu">
              <button class="nav-btn">Gallery <i class="fas fa-angle-down"></i> </button>
              <div class="dropdown-content">
                  <a href="{{route('gallery')}}">Photo Gallery</a>
                  <a href="{{route('video')}}">Video Gallery</a>
              </div>
          </div>

          <a class="nav-btn" href="{{route('contact')}}">Contact</a>   
          
        </nav> 

        <div id="menu-btn" class="icon fas fa-bars"></div> 

      </div>
          
    </div>
    <!-- ===== Header Area (Ends) ===== -->

    <!-- ===== Mobile Menu Area (Start) ===== -->
    <div class="mobile-menu"> 

      <div id="close-side-bar" class="fas fa-times"></div>
    
      <nav class="mobile-navbar">

        <div class="nav-link">
          <div class="main-nav-link"> <a class="nav-btn" href="{{route('home')}}">home</a> </div>
        </div>   

        <div class="nav-link">
          <div class="main-nav-link"> <div class="nav-btn">Who we are</div> <i class="fas fa-plus"></i> </div>
          <div class="sub-nav-link">
            <a href="{{route('about')}}">history</a>
            <a href="{{route('missionVision')}}">mission and vision</a>
            <a href="{{route('messagePage')}}">messeges</a>
          </div>
        </div> 

        <div class="nav-link">
          <div class="main-nav-link"> <div class="nav-btn">Reports</div> <i class="fas fa-plus"></i> </div>
          <div class="sub-nav-link">
            <a href="{{route('ctetRreports')}}">CTET - REPORTS</a>
            @foreach ($year as $item)
            <a href="{{route('yearWise', $item->id)}}"> {{$item->year}} </a>
            @endforeach
          </div>
        </div> 

        <div class="nav-link">
          <div class="main-nav-link"> <div class="nav-btn">CTET</div> <i class="fas fa-plus"></i> </div>
          <div class="sub-nav-link">
            <a href="{{route('ctetAbout')}}">ctet-about</a>
            <a href="{{route('ctetActivity')}}">ctet-activity</a>
          </div>
        </div> 

        <div class="nav-link">
          <div class="main-nav-link"><a class="nav-btn" href="{{route('donat')}}">Donate</a></div>
        </div>
        
        <div class="nav-link">
          <div class="main-nav-link"><a class="nav-btn" href="{{route('ictPage')}}">ICT</a></div>
        </div>

        <div class="nav-link">
          <div class="main-nav-link"> <div class="nav-btn">Notice</div> <i class="fas fa-plus"></i> </div>
          <div class="sub-nav-link">
            <a href="{{route('notices')}}">All Notice</a>
            <a href="{{route('news')}}">All News</a>
            <a href="{{route('events')}}">All Events</a>
          </div>
        </div> 

        <div class="nav-link">
          <div class="main-nav-link"> <div class="nav-btn">Gallery</div> <i class="fas fa-plus"></i> </div>
          <div class="sub-nav-link">
            <a href="{{route('gallery')}}">Photo Gallery</a>
            <a href="{{route('video')}}">Video Gallery</a>
          </div>
        </div> 
        
        <div class="nav-link">
          <div class="main-nav-link"> 
            <div class="nav-btn">Contact</div> <i class="fas fa-plus"></i> </div>
          <div class="sub-nav-link">
            <a href="{{route('contact')}}">Office</a>
          </div>
        </div> 

      </nav>
    
    </div>
    <!-- ===== Mobile Menu Area (Ends) ===== -->

  </header>