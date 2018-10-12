<div class="page-title">Offer</div>
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
