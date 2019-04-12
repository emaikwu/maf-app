<div id="hero" class="owl-carousel owl-theme">
    @if(isset($slides))
      @foreach($slides as $key => $value)
        <div class="slide-item">
          <img class="owl-lazy" data-src="/images/slides/{{$value->photo}}"/>
            <div id="slide-wrapper">
              <div class="slide-content">
                <h2>{{$value->title}}</h2>
                <p>{{$value->info}}</p>
              </div>
              <div class="counter">
                <span class="current">{{$key + 1}}</span>
                <span class="slash">/</span>
                <span class="total">{{count($slides)}}</span>
              </div>
            </div>
        </div>
      @endforeach
    @endif
</div>