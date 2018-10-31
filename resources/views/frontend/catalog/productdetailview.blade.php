@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')


@include('frontend.catalog.product')
@include('frontend.catalog.otherproduct')
@include('frontend.includes.latestcategory')









    
@endsection
@push('after-scripts')

@endpush
