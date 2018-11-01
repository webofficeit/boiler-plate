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
            <h3><span>{{$productlist->category->name}}</span> <span>GRC{{$productlist->girapercentage}}%</span></h3>
            <div class="offer-inner">
                <div class="offer-blocks">
                    <p>{!!$productlist->descriptionoffer!!}</p>
                </div>
                {{--<div class="list-rating">
                    <img src="{{URL::asset('/img/rating-bg.png')}}" alt="">
                    <h2>{{$productlist->girapercentage}}%</h2>
                </div>--}}

            </div>

            <p>{!!$productlist->descriptionbussiness!!}</p>

            @if((isset($productlist->Offertype[0]->type))&& ($productlist->Offertype[0]->type ==1))
                <div class="offer-validity">Offer valid till
                    <span>{{ \Carbon\Carbon::parse($productlist->Offertype[0]->dateto)->format('d M Y')}}</span></div>

            @endif
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