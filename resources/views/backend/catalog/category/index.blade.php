@extends('backend.layouts.app')

@section('title', app_name() . ' | '. __('labels.backend.access.category.management'))

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    @lang('labels.backend.access.category.management')
                </h4>
            </div><!--col-->

            <div class="col-sm-7 pull-right">
                @include('backend.catalog.category.includes.header-buttons')
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>@lang('labels.backend.access.category.table.name')</th>
                            <th>@lang('labels.backend.access.category.table.description')</th>
                           
                            <th>@lang('labels.general.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($catogorylists as $catogorylist)
                            <tr>
                                <td>{{ ucwords($catogorylist->name) }}</td>
                                <td>
                                   {!! ucwords($catogorylist->description) !!}
                                </td>
                                
                                <td>{!! $catogorylist->action_buttons !!}</td>
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
                   {!! $catogorylists->count() !!} {{ trans_choice('labels.backend.access.category.table.total', $catogorylists->count()) }} {!! $catogorylists->total() !!}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {!! $catogorylists->render() !!}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection
