@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')
    <div class="container">
     
            <div class="page-title">Categories</div>
            <div class="category-list-view list-view">
                <div class="row">
                    @if(count($category) > 0 )
                    @foreach($category as $category)
                        <div class="col-lg-3">
                            <div class="caegory-list-item list-item">
                                <a href='{{ url($category->seo.'/offer') }}'>
                                    <div class="list-item-img" style="background-image: url({{ asset('storage/category/'.$category->user_id.'/'.$category->picture) }});"></div>
                                    <div class="list-item-title">{{ $category->name }}</div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                    @else
            No records!
          @endif
                </div>
            </div>
</div>
    
@endsection
@push('after-scripts')
<script>

</script>
@endpush

