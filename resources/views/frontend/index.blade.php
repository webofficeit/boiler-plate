@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')
@include('frontend.includes.slider')
@include('frontend.includes.map')
@include('frontend.includes.latestoffer')
@include('frontend.includes.latestcategory')
@include('frontend.includes.userlist')
  
    
@endsection
