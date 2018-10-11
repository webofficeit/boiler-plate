@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')
    
     

    <div class="card">
    <div class="card-body"> 
      @foreach($category as $category)
      <div class="row">
           <a href='{{ url($category->seo.'/offer') }}'>{{ $category->seo }}</a>
           
          <img src='{{ url('storage/category/'.$category->user_id.'/'.$category->picture) }}'>
      </div>
      @endforeach
    </div>    
    </div>
    
@endsection
@push('after-scripts')
<script>

</script>
@endpush

