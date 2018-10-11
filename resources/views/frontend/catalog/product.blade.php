@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')
    
     

    <div class="card">
    <div class="card-body">
      @foreach($product as $product)
      <div class="row">
           <a href='{{ url($slug.'/offer/'.Crypt::encryptString($product['id'])) }}'>{{ $product['name'] }}</a>
        @if(isset($product['imagees']))
           <img src='{{ url('storage/category/product/'.$product['userid'].'/images/'.$product['imagees']) }}'  >
        @endif
           </div>
      @endforeach
    </div>    
    </div>
    
@endsection
@push('after-scripts')
<script>

</script>
@endpush

