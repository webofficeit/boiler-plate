<section class="offer-details">
    <div class="container">
        <div class="offer-thumb">
            <ul class="slide-view slider-for">
                @if(count($productlist->Offerimage)>0)
                    @forelse(json_decode($productlist->Offerimage[0]->name) as $slideplacekey =>$productlistimage)
                        <li>
                            <img src="{{ url('storage/category/product/'.$productlist->user_id.'/images/'.$productlistimage) }}">
                        </li>
                    @empty
                    @endforelse
                @endif
            </ul>
            <ul class="slider-nav">
                @if(count($productlist->Offerimage)>0)
                    @forelse(json_decode($productlist->Offerimage[0]->name) as $slideplacekey =>$productlistimage)
                        <li>
                            <a href="#nogo">
                                <img src="{{ url('storage/category/product/'.$productlist->user_id.'/images/'.$productlistimage) }}">
                            </a>
                        </li>
                    @empty
                    @endforelse
                @endif
            </ul>
        </div>
        <div class="offer-meta">
            <h2>{{ $productlist->name}}</h2>
            <h3><span>{{$productlist->category->name}}</span></h3>
            <div class="offer-inner">
                <div class="offer-blocks">
                    <p>{!!$productlist->descriptionoffer!!}</p>
                </div>
                <div class="offer-img">
                   <img src="{{ asset('img/gira.png') }}" alt="">
                   <h2>{{$productlist->girapercentage}}%</h2>
                 </div>
                

            </div>

            <p>{!!$productlist->descriptionbussiness!!}</p>

            @if((isset($productlist->Offertype[0]->type))&& ($productlist->Offertype[0]->type ==1))
                <div class="offer-validity">Offer valid till
                    <span>{{ \Carbon\Carbon::parse($productlist->Offertype[0]->dateto)->format('d M Y')}}</span></div>

            @endif
            <p>
            <span class="vendor-details"><h4> Merchant Details </h4>
                <div class="vendor-name"> {{$user->first_name}} {{$user->last_name }}</div>
                 <div class="vendor-email">{{$user->email}}</div>
                 <div class="vendor-type">{{isset($user->accounttype->name)?$user->accounttype->name:''}}</div>
                 <div class="vendor-address">{{$user->address}}</div>
                 <div class="vendor-phone">{{$user->phoneno}}</div>
                 <div class="vendor-city"> {{$user->city}}</div>
                 <div class="vendor-con">{{isset($user->country->country_name)?$user->country->country_name:''}}</div>
            </span></p>
            @if($productlist->pricelistdocument)
                <div class="view-price-list">
                    <a href="download/{{$productlist->pricelistdocument}}/{{$productlist->user_id}}"><i
                                class="far fa-file-pdf"></i> View Price List</a></div>
            @endif
            @if($productlist->buynow!='')
                <a class="button" target="_blank" href="{{$productlist->buynow}}">Buy now</a>
            @endif
        </div>
    </div>
</section>