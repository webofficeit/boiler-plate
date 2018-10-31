@if(isset($product) && (count($product) > 0) )
@foreach($product as $product)
<div class="col-sm-12 col-md-6">
                <div class="list-box">
                  <div class="list-thumb">
                      @if(isset($product['imagees']))
                      <div  style="background-image: url({{ url('storage/category/product/'.$product['userid'].'/images/'.$product['imagees']) }})"></div>
                      @else
                      <img src="{{ asset('img/no_Image_available.png') }}" alt="">
                      @endif
                    
                  </div>
                  <div class="list-meta">
                    <p>{!!str_limit($product['description'],100) !!}</p>
                    <div class="list-rating">
                      <img src="{{ asset('img/rating-bg.png')}}" alt="">
                      <h2>{{$product['percentage']}}%</h2>
                    </div>
                  </div>
                <a href="{{ url($slug.'/offer/'.Crypt::encryptString($product['id'])) }}">{{$product['name']}}</a>
                </div>
              </div>
  @endforeach
          @else
            No records!
          @endif