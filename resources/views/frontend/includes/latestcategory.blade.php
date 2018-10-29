<section class="categories">
            <h2>Categories</h2> 
            <ul class="cat-box">
            @foreach($category as $key=>$category)
              <li> <a href="{{ url('category/'.$category['categoryseo']) }}">
                <div class="cat-inner" data-image-src="{{ asset('storage/category/'.$category['userid'].'/'.$category['categoryseo']) }}">
                  <img src="{{ asset('storage/category/'.$category['userid'].'/'.$category['categoryseo']) }}" alt="">
                </div>
                <div class="meta-box1">
                  <h2>{{$category['categoryname']}}</h2>
                  <p>{{$category['categorydescription']}}</p>
                  <h2>Offers in this category:</h2>
                  @foreach($category['productid'] as $keyproduct=>$categoryproduct)
                  <p>
                  <a href='{{ url($category["categoryseo"].'/offer/'.Crypt::encryptString($categoryproduct["id"])) }}'>
                     {{$categoryproduct["name"]}}
                  </a>
                  </p>
                  @endforeach
                </div></a>
              </li> 
            @endforeach           
            </ul> 
         </section>
