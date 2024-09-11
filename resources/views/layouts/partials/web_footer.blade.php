<footer class="footer">

    <div class="box-container">

      <div class="footer-item">
        <!-- Logo --> 
        <a class="logo" href="{{route('home')}}">
          <img src="{{asset($content->logo)}}" alt="logo">
          <div class="logo-name">
            <h3>{{$content->name}}</h3>
            <p>{{ $content->f_title}}</p>
          </div>
        </a>
        <p>{{$content->s_description}}</p>
      </div>

      <div class="footer-item">
        <h2>useful links</h2>
        <div class="info links pages">
          <div class="links-item">
            <p><a href="{{route('home')}}">home</a></p>
            <p><a href="{{route('about')}}">about</a></p>
            <p><a href="{{route('notices')}}">Notice</a></p>
            <p><a href="{{route('news')}}">News</a></p>
            <p><a href="{{route('events')}}">events</a></p>
          </div>
          <div class="links-item">
            <p><a href="{{route('gallery')}}">gallery</a></p>
            <p><a href="{{route('ctetAbout')}}">CTET-About</a></p>
            <p><a href="{{route('ctetActivity')}}">Ctet-Activity</a></p>
            <p><a href="{{route('contact')}}">contact</a></p>
          </div>
        </div>
      </div> 

      <div class='footer-item'>
        <h2>contact info</h2> 
        <div class="info">
          <p><i class="fas fa-phone"></i><span>{{$content->phone}}</span></p>
          <p><i class="fas fa-envelope"></i><span class="gmail">{{$content->email}}</span></p>
          <p><i class="fas fa-map"></i><span>{{$content->address}}</span></p>
        </div>
        <div class="social">

          <a href="{{$content->facebook}}" target="_blank" id="login" class="icon fab fa-facebook-f"></a>
          <a href="{{$content->linkedin}}" target="_blank" id="login" class="icon fab fa-linkedin-in"></a>
          <a href="{{$content->twitter}}" target="_blank" id="login" class="icon fab fa-twitter"></a>
          <a href="{{$content->youtube}}" target="_blank" id="login" class="icon fab fa-youtube"></a>
        </div>
      </div>

    </div>

    <div class="content">
        <p> <?php echo date('Y') ?> all rights reserved ©  {{$content->name}} | Developed by <span><a href="https://linktechbd.com" target="_blank">Link-Up Technology LTD</a></span></p>
    </div>

  </footer>