<section class="categories">
    <h2>Categories</h2>
    <ul class="cat-box">
        @foreach($category as $key=>$category)
            <li>
                <a style="text-decoration: none; color:inherit;" href="{{ url('category/'.$category['categoryseo']) }}">
                   @if(isset($category['categoryimage'])&& ($category['categoryimage']!=''))
                    <div class="cat-inner" style="padding-bottom: 140%; background-repeat: no-repeat;background-size: cover;" data-image-src="{{ asset('storage/category/'.$category['userid'].'/'.$category['categoryimage']) }}">
                      @else
                  <div class="cat-inner" style="padding-bottom: 140%; background-repeat: no-repeat;background-size: cover;" data-image-src="img/no_Image_available.png">
                    @endif 
                    </div>
                </a>
                <div class="meta-box">
                    <a style="text-decoration: none; color:inherit;" href="{{ url('category/'.$category['categoryseo']) }}">
                        <h2>{{$category['categoryname']}}</h2>
                        <p>{!!$category['categorydescription']!!}</p>
                        <h2>Offers in this category:</h2>
                    </a>
                    @foreach($category['productid'] as $keyproduct=>$categoryproduct)
                        <p>
                            <a style="text-decoration: none; color:inherit;" href='{{ url($category["categoryseo"].'/offer/'.Crypt::encryptString($categoryproduct["id"])) }}'>
                                {{$categoryproduct["name"]}}
                            </a>
                        </p>
                    @endforeach
                </div>

            </li>
        @endforeach
    </ul>
</section>
