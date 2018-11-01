@if(isset($product) && (count($product) > 0) )
<div class="infinite-scroll">
    <div class="row">
@foreach($product as $products)
<div class="col-sm-12 col-md-6">
                <div class="list-box">
                  <div class="list-thumb">
                      @if((isset($products->Offerimage[0]))&&($products->Offerimage[0]->name!=''))
                      <div style="background: url({{ url('storage/category/product/'.$products->user_id.'/images/'.json_decode($products->Offerimage[0]->name)[0]) }}) center/cover no-repeat; padding-bottom:100%; "></div>
                      
                      @else
                      <img src="{{ asset('img/no_Image_available.png') }}" alt="">
                      @endif
                    
                  </div>
                  <div class="list-meta">
                    <p>{!!str_limit($products->descriptionoffer,100) !!}</p>
                    <div class="list-rating">
                      <img src="{{ asset('img/rating-bg.png')}}" alt="">
                      <h2>{{$products->girapercentage}}%</h2>
                    </div>
                  </div>
                    <a href="{{ url($slug.'/offer/'.Crypt::encryptString($products->id)) }}">{{$products->name}}</a>
                </div>
              </div>
  @endforeach
   {{ $product->links() }}
    </div>
   </div>
          @else
            No records!
          @endif