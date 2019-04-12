<footer class="callout">
  <div class="grid-x grid-padding-x">
    <div class="small-12">
      <div class="social">
        @isset($settings)
          <h2>We are social</h2>
          <ul>
            @foreach($settings as $setting)
              @if($setting->facebook)
                <li><a href="{{$setting->facebook}}"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
              @endif
              @if($setting->instagram)
                <li><a href="{{$setting->instagram}}"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
              @endif
              @if($setting->twitter)
                <li><a href="{{$setting->twitter}}"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
              @endif
            @endforeach
          </ul>
        @endisset
      </div>
    </div>
  </div>
  <div class="copy">
    <p>&copy; <?php time() ?> Mafete n Gifts All rights reserved</p>
  </div>
</footer>
