

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

<div class="container">
  <div class="page-title">Offer</div>
</div>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner container">
    <div class="carousel-item active">
      <h4 class="carousel-title">Carousel Title</h4>
      <div class="carousel-desc">Use data attributes to easily control the position of the carousel. 
        data-slide accepts the keywords prev or next, which alters the slide position relative to its 
        current position. Alternatively, use data-slide-to to pass a raw slide index to the carousel 
        data-slide-to="2", which shifts the slide position to a particular index beginning with 0.</div>
      <div class="carousel-percent">
        <span class="percent-val">20 %</span>
        <span class="percent-text">GRC accepted</span>
      </div>
    </div>
	<div class="carousel-item">
      <h4 class="carousel-title">Carousel Title</h4>
      <div class="carousel-desc">Use data attributes to easily control the position of the carousel. 
        data-slide accepts the keywords prev or next, which alters the slide position relative to its 
        current position. Alternatively, use data-slide-to to pass a raw slide index to the carousel 
        data-slide-to="2", which shifts the slide position to a particular index beginning with 0.</div>
      <div class="carousel-percent">
        <span class="percent-val">20 %</span>
        <span class="percent-text">GRC accepted</span>
      </div>
    </div>
<div class="carousel-item">
      <h4 class="carousel-title">Carousel Title</h4>
      <div class="carousel-desc">Use data attributes to easily control the position of the carousel. 
        data-slide accepts the keywords prev or next, which alters the slide position relative to its 
        current position. Alternatively, use data-slide-to to pass a raw slide index to the carousel 
        data-slide-to="2", which shifts the slide position to a particular index beginning with 0.</div>
      <div class="carousel-percent">
        <span class="percent-val">20 %</span>
        <span class="percent-text">GRC accepted</span>
      </div>
    </div>
    {{-- <div class="carousel-item">
      <img class="d-block w-100" src="..." alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="..." alt="Third slide">
    </div> --}}
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
