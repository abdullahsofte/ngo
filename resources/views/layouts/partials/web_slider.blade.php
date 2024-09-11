<div id="slider">
    <div class="slider">
        @foreach ($slider as $item)
            <div class="slick_slider">
                <img src="{{ asset($item->image) }}" alt="Slide background" />
            </div>
        @endforeach
    </div>
</div>
<div class="bann_overly">
    <a href="{{ $content->youtube }}" target="_blank">
        <div class="video_icon">
            <i class="fa fa-youtube-play" aria-hidden="true"></i>
        </div>
    </a>
</div>
