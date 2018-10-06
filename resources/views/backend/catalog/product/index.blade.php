@extends('backend.layouts.app')

@section('title', app_name() . ' | '. __('labels.backend.access.product.management'))

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    @lang('labels.backend.access.product.management')
                </h4>
            </div><!--col-->

            <div class="col-sm-7 pull-right">
                @include('backend.catalog.product.includes.header-buttons')
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>@lang('labels.backend.access.product.table.name')</th>
                            <th>@lang('labels.backend.access.product.table.description')</th>
                           
                            <th>@lang('labels.general.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($productlists as $productlist)
                            <tr>
                                <td>{{ ucwords($productlist->name) }}</td>
                                <td>
                                   {{ ucwords($productlist->descriptionoffer) }}
                                </td>
                                
                                <td>{!! $productlist->action_buttons !!}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!--col-->
        </div><!--row-->
        <div class="row">
            <div class="col-7">
                <div class="float-left">
                   {!! $productlists->count() !!} {{ trans_choice('labels.backend.access.users.table.total', $productlists->count()) }}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection
