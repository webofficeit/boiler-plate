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
                           
                           <th>@lang('labels.backend.access.product.table.category')</th>
                           @if ($logged_in_user->isAdmin())
                           <th>@lang('labels.backend.access.product.table.confirm')</th>
                           
                           <th>@lang('labels.backend.access.product.table.user')</th>
                           @endif
                            <th>@lang('labels.general.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($productlists as $keyproduct => $productlist)
                              
                              
                            <tr>
                                <td>{{ ucwords($productlist->name) }}</td>
                                <td>
                                   {!! ucwords($productlist->descriptionoffer) !!}
                                </td>
                                <td>
                            
                                     {{ucwords($productlist->category['name'])}}
                                </td>
                                @if ($logged_in_user->isAdmin())
                                <td>
                            <div class="radio-toggle{{$keyproduct}}">
                                    <input type="radio" name="toggle_option_confirm{{$keyproduct}}" value="1" id="{{$keyproduct}}" data-key ="{{$productlist->id}}"   {{($productlist->confirmed == 1) ? 'checked':''}} />
                                    <label for="yes">Yes</label>
                                    <input type="radio" name="toggle_option_confirm{{$keyproduct}}" value="0"  id="{{$keyproduct}}" data-key ="{{$productlist->id}}" {{($productlist->confirmed == 0) ? 'checked':''}} />
                                    <label for="no">No</label>
                                </div>
                                     
                                </td>
                                
                                <td><a href='{!! url('admin/auth/user/'.$productlist->users['id']); !!}'>{!! $productlist->users['email'] !!}</a></td>
                                @endif
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
                   {!! $productlists->count() !!} {{ trans_choice('labels.backend.access.product.table.total', $productlists->count()) }} {!! $productlists->total() !!}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {!! $productlists->render() !!}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->
@endsection

@push('after-scripts')
<script>
   $('[type="radio"]').on('change', function() {
       $.ajax({
                    url:      '/admin/product/listconfirm',
                    type:     'post',
                    dataType: 'json',
                    data:     {"_token": "{{ csrf_token() }}",'datagrid':$(this).attr('data-key'),'dataval':$(this).val()},
                    success: function(data) {
                        
                         
                    },
                    error: function(xhr, textStatus, errorThrown) {
                        console('AJAX ERROR ! Check the console !');                    
                    }
                });
   
});
</script>
@endpush    
