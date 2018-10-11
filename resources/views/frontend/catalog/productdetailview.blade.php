@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')
<div class="container">
        <!-- main slider carousel -->
        <div class="row">
            <div class="col-12">
                <div class="product-name">{{ $productlist->name}}</div>
            </div>
            <div class="col-lg-5" id="slider">
                <div id="myCarousel" class="carousel slide">
                    <!-- main slider carousel items -->
                    <div class="carousel-inner">
                       @if(count($productlist->Offerimage)>0)
                        @forelse(json_decode($productlist->Offerimage[0]->name) as $slidekey => $productlistimage)
                          <div class="{{$slidekey==0?'active':''}} item carousel-item" data-slide-number="{{$slidekey}}">
                            <img src="{{ url('storage/category/product/'.$productlist->user_id.'/images/'.$productlistimage) }}" class="img-fluid">
                        </div>
                        @empty
    
                        @endforelse
                        @endif

                        

                    </div>
                    <!-- main slider carousel nav controls -->


                    <ul class="carousel-indicators list-inline">
                        @if(count($productlist->Offerimage)>0)
                        @forelse(json_decode($productlist->Offerimage[0]->name) as $slideplacekey =>$productlistimage)
                    
                        <li class="list-inline-item {{$slideplacekey==0?'active':''}}">
                            <a id="carousel-selector-0" class="selected" data-slide-to={{$slideplacekey}} data-target="#myCarousel">
                                <img src="{{ url('storage/category/product/'.$productlist->user_id.'/images/'.$productlistimage) }}" class="img-fluid">
                            </a>
                        </li>
                        @empty
    
                        @endforelse
                        @endif
                        
                    </ul>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="product-details">
                    <div class="product-category">{{$productlist->category->name}}</div>
                    <div class="product-price">{{$productlist->girapercentage}}% <span>accepted as giracoin</span></div>
                    <div class="offer-desc">
                        <ul>
                            <li>{{$productlist->descriptionoffer}}</li>
                            
                        </ul>
                    </div>
                    <div class="business-desc">{{$productlist->descriptionbussiness}}</div>
                    @if((isset($productlist->Offertype[0]->type))&& ($productlist->Offertype[0]->type ==1))
                    <div class="offer-validity">Offer valid till <span>{{ \Carbon\Carbon::parse($productlist->Offertype[0]->dateto)->format('d M Y')}}</span></div>
                    
                    @endif
                    @if($productlist->pricelistdocument)
                    <div class="view-price-list"><a href="{{ URL::to( 'storage/category/product/'.$productlist->user_id.'/doc/'.$productlist->pricelistdocument)  }}"><i class="far fa-file-pdf"></i> View Price List</a></div>
                    @endif
                </div>
            </div>
        </div>
        <!--/main slider carousel-->
</div>
    
@endsection
@push('after-scripts')

@endpush