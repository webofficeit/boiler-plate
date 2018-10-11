@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')
    
     

    <div class="card">
        <div class="card-body"> 
            <div class="category-list-view list-view">
                <div class="row">
                    @foreach($category as $category)
                        <div class="col-lg-3">
                            <div class="caegory-list-item">
                                <img src='{{ url('storage/category/'.$category->user_id.'/'.$category->picture) }}' class="img-fluid" >
                                <a href='{{ url($category->seo.'/offer') }}'>{{ $category->seo }}</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>    
    </div>
    
@endsection
@push('after-scripts')
<script>

</script>
@endpush

