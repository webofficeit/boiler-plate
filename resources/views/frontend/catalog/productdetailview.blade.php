@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')
<div class="container">
        <!-- main slider carousel -->
        <div class="row">
            <div class="col-12">
                <div class="product-name">Product Name</div>
            </div>
            <div class="col-lg-5" id="slider">
                <div id="myCarousel" class="carousel slide">
                    <!-- main slider carousel items -->
                    <div class="carousel-inner">
                        <div class="active item carousel-item" data-slide-number="0">
                            <img src="http://placehold.it/1200x1200&amp;text=one" class="img-fluid">
                        </div>
                        <div class="item carousel-item" data-slide-number="1">
                            <img src="http://placehold.it/1200x1200/888/FFF" class="img-fluid">
                        </div>
                        <div class="item carousel-item" data-slide-number="2">
                            <img src="http://placehold.it/1200x1200&amp;text=three" class="img-fluid">
                        </div>
                        <div class="item carousel-item" data-slide-number="3">
                            <img src="http://placehold.it/1200x1200&amp;text=four" class="img-fluid">
                        </div>
                        <div class="item carousel-item" data-slide-number="4">
                            <img src="http://placehold.it/1200x1200&amp;text=five" class="img-fluid">
                        </div>
                        <div class="item carousel-item" data-slide-number="5">
                            <img src="http://placehold.it/1200x1200&amp;text=six" class="img-fluid">
                        </div>

                        <!-- <a class="carousel-control left pt-3" href="#myCarousel" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
                        <a class="carousel-control right pt-3" href="#myCarousel" data-slide="next"><i class="fa fa-chevron-right"></i></a> -->

                    </div>
                    <!-- main slider carousel nav controls -->


                    <ul class="carousel-indicators list-inline">
                        <li class="list-inline-item active">
                            <a id="carousel-selector-0" class="selected" data-slide-to="0" data-target="#myCarousel">
                                <img src="http://placehold.it/80x60&amp;text=one" class="img-fluid">
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a id="carousel-selector-1" data-slide-to="1" data-target="#myCarousel">
                                <img src="http://placehold.it/80x60&amp;text=two" class="img-fluid">
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a id="carousel-selector-2" data-slide-to="2" data-target="#myCarousel">
                                <img src="http://placehold.it/80x60&amp;text=three" class="img-fluid">
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a id="carousel-selector-3" data-slide-to="3" data-target="#myCarousel">
                                <img src="http://placehold.it/80x60&amp;text=four" class="img-fluid">
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a id="carousel-selector-4" data-slide-to="4" data-target="#myCarousel">
                                <img src="http://placehold.it/80x60&amp;text=five" class="img-fluid">
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a id="carousel-selector-5" data-slide-to="5" data-target="#myCarousel">
                                <img src="http://placehold.it/80x60&amp;text=six" class="img-fluid">
                            </a>
                        </li>
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
                    @if($productlist->Offertype[0]->type ==1)
                    <div class="offer-validity">Offer valid till <span>{{ \Carbon\Carbon::parse($productlist->Offertype[0]->dateto)->format('d M Y')}}</span></div>
                    
                    @endif
                    <div class="view-price-list"><a href="{{ URL::to( 'storage/category/product/'.$productlist->user_id.'/doc/'.$productlist->pricelistdocument)  }}"><i class="far fa-file-pdf"></i> View Price List</a></div>
                </div>
            </div>
        </div>
        <!--/main slider carousel-->
</div>
    
@endsection
@push('after-scripts')
<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
@endpush