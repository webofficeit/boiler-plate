@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

    @include('frontend.includes.map')
    
    @if(count($category) > 0 )
    <section class="list">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <div class="side-menu">
              <h2>Categoiries</h2>
              <ul>
                  @include('frontend.catalog.categorylist')
               
              </ul>
            </div>
          </div>
          <div class="col-md-8 float-right">
            <div class="row offerlist">
              @include('frontend.catalog.productlist')  
              
              
            </div>
          </div>
        </div>
      </div>
    </section>
    
       @else
            No records!
          @endif
    
    
    

    
@endsection

@push('after-scripts')
<script src="{{ URL::asset('js/listview.js') }}"></script>
    
@endpush



