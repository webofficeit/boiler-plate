@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')
    
     

    <div class="card">
    <div class="card-body">
      @foreach($category as $category)
      <div class="row>
           <a href='{{ url($category->seo.'/product') }}'>{{ $category->seo }}</a>
          
      </div>
      @endforeach
    </div>    
    </div>
    
@endsection
@push('after-scripts')
<script>

</script>
@endpush

