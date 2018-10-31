@if(isset($product) && (count($product) > 0) )
@foreach($product as $product)
<div class="col-sm-12 col-md-6">
                <div class="list-box">
                  <div class="list-thumb">
                      @if(isset($product['imagees']))
                      <div  style="background-image: url({{ url('storage/category/product/'.$product['userid'].'/images/'.$product['imagees']) }})"></div>
                    @endif
                    <img src="{{ asset('img/no_Image_available.png') }}" alt="">
                  </div>
                  <div class="list-meta">
                    <p>{!!$product['description'] !!}</p>
                    <div class="list-rating">
                      <img src="{{ asset('img/rating-bg.png')}}" alt="">
                      <h2>{{$product['percentage']}}%</h2>
                    </div>
                  </div>
                <a href="{{ url($slug.'/offer/'.Crypt::encryptString($product['id'])) }}">Explore</a>
                </div>
              </div>
  @endforeach
          @else
            No records!
          @endif