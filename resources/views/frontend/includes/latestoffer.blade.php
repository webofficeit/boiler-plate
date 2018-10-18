

{{-- <div class="col-12">
  <div class="category-list-view list-view">
    <div class="row">
      @foreach($product as $product)
        <div class="col-lg-3">
          <div class="product-list-item list-item">
            <a href='{{ url($product["categoryseo"].'/offer/'.Crypt::encryptString($product['id'])) }}'>
              @if(isset($product['imagees']))
                <div class="list-item-img" style="background-image: url({{ url('storage/category/product/'.$product['userid'].'/images/'.$product['imagees']) }}"></div>
              @endif
            <div class="list-item-title">{{ $product['name'] }}</div>
            </a>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div> --}}

<!-- <div class="container">
  <div class="page-title">Latest Offers</div>
</div> -->

<div class="slider-container">
<div class="videoBG">
    <video class="my-background-video jquery-background-video is-visible is-playing" loop="" autoplay="" muted="" poster="https://giracoin.com/wp-content/themes/giracoin/img/poster.jpg" style="min-width: auto; min-height: auto; width: 100%; height: auto; position: absolute; left: 50%; top: 50%; transform: translate(-50%, -50%); transition-duration: 0ms;">
      <source src="https://giracoin.com/wp-content/themes/giracoin/video/video.mp4" type="video/mp4">
      <source src="https://giracoin.com/wp-content/themes/giracoin/video/video.webm" type="video/webm">
      <source src="https://giracoin.com/wp-content/themes/giracoin/video/video.ogv" type="video/ogg">
    </video>
    
  </div>
{{-- <div id="homeCarousel" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
  @foreach($product as $k=>$prod)
    <li data-target="#homeCarousel" data-slide-to="{{$k}}" class=" {{$k==0?'active':''}}"></li>
    @endforeach
  </ol>
  <div class="carousel-inner container">
    @foreach($product as $key=>$product)
    <div class="carousel-item {{$key==0?'active':''}}">
      @if(isset($product['imagees']))
        <div class="carousel-img">
          <a href='{{ url($product["categoryseo"].'/offer/'.Crypt::encryptString($product["id"])) }}'>
            <img src="{{ url('storage/category/product/'.$product['userid'].'/images/'.$product['imagees']) }}">
          </a>
        </div>
      @endif
      <a href='{{ url($product["categoryseo"].'/offer/'.Crypt::encryptString($product['id'])) }}'>
        <h4 class="carousel-title">{{ $product['name'] }}</h4>
      </a>
      <div class="carousel-percent">
        <span class="percent-val">{{$product['percentage']}}%</span>
        <span class="percent-text">GRC accepted</span>
      </div>
    </div>
    @endforeach
  </div>
  <a class="carousel-control-prev" href="#homeCarousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#homeCarousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div> --}}

<div class="container">
  <div class="page-title">Offers</div>
  <div class="recent-list-view list-view">
    <div class="row">
    @if(count($product) > 0 )
        @foreach($product as $product)
          <div class="col-lg-3 col-md-6">
            <div class="recent-list-item list-item">
              <a href='{{ url($product["categoryseo"].'/offer/'.Crypt::encryptString($product['id'])) }}'>
                @if(isset($product['imagees']))
                  <div class="list-item-img" style="background-image: url({{ url('storage/category/product/'.$product['userid'].'/images/'.$product['imagees']) }}"></div>
                @endif
                <div class="list-item-title">{{ $product['name'] }}</div>
              </a>
            </div>
          </div>
          @endforeach
      @else
        No records!
      @endif
    </div>

  </div>
</div>

</div>
