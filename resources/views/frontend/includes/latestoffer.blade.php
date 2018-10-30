
<section class="hotoffers">
<h2>Hot Offers</h2>
<div class="container">
  <div class="row">
       @foreach($product as $key=>$product)
           <div class="col-md-3 col-sm-6">
              <div class="hot-box">
                <a href='{{ url($product["categoryseo"].'/offer/'.Crypt::encryptString($product["id"])) }}'>
                    @if(isset($product['imagees']))
                        <div  style="background:url({{ url('storage/category/product/'.$product['userid'].'/images/'.$product['imagees']) }}) center/cover no-repeat;padding-bottom: 100%" class="offer-list"></div>
                  @else
                  <img src="{{ asset('img/giradeals-white.png') }}">
                    @endif
                  <div class="hover-box">
                    <h2>{{ $product['name'] }}</h2>
                  </div>
                </a>
              </div>
        </div>
      @endforeach
  </div>
</div>
</section>

