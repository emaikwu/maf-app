<div class="orbit" role="region" aria-label="Favorite Space Pictures" data-orbit>
  <ul class="orbit-container">
    <button class="orbit-previous" aria-label="previous"><span class="show-for-sr">Previous
        Slide</span>&#9664;</button>
    <button class="orbit-next" aria-label="next"><span class="show-for-sr">Next Slide</span>&#9654;</button>
    @if(isset($slides))
      @foreach($slides as $key => $value)
        <li class="orbit-slide {{$key === 0 ? "is-active" : null}}">
          <img src="/images/slides/{{$value->photo}}" alt=""/>
          <div id="slide-wrapper">
            <div class="slide-content">
              <h2>{{$value->title}}</h2>
              <p>{{$value->info}}</p>
            </div>
          </div>
        </li>
      @endforeach
    @endif
  </ul>
</div>