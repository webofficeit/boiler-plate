@if(isset($relatedProduct) && (count($relatedProduct) > 0) )

<section class="hotoffers">
            <h2>Other offers in this area</h2>
            <div class="container">
              <div class="row">
                 
              @foreach($relatedProduct as $relatedProduct)  
              
                <div class="col-md-3 col-sm-6">
                  <div class="hot-box">
                      <a href="{{ url($relatedProduct->category->seo.'/offer/'.Crypt::encryptString($relatedProduct->id)) }}">
                          @if(isset($relatedProduct->Offerimage)&& count($relatedProduct->Offerimage)>0)
                          <img src="{{ url('storage/category/product/'.$relatedProduct->user_id.'/images/'.json_decode($relatedProduct->Offerimage[0]->name)[0]) }}" alt="">
                          @endif
                          <div class="hover-box">
                        <h2>{{$relatedProduct->name}}</h2>
                      </div>
                    </a>
                  </div>
                </div> 
               @endforeach
               
                
              </div>
            </div>
         </section>

 @endif