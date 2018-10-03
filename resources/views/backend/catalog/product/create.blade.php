@extends('backend.layouts.app')

@section('title', __('labels.backend.access.product.management') . ' | ' . __('labels.backend.access.product.create'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
    {{ html()->form('POST', route('admin.product.update'))->class('form-horizontal')->attribute('enctype', 'multipart/form-data')->open() }}
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-5">
                        <h4 class="card-title mb-0">
                            @lang('labels.backend.access.product.management')
                            <small class="text-muted">@lang('labels.backend.access.product.create')</small>
                        </h4>
                    </div><!--col-->
                </div><!--row-->

                <hr>

                <div class="row mt-4 mb-4">
                    <div class="col">
                        <div class="form-group row">
                            {{ html()->label(__('validation.attributes.backend.access.product.name'))->class('col-md-2 form-control-label')->for('name') }}

                            <div class="col-md-10">
                                {{ html()->text('name')
                                    ->class('form-control')
                                    ->placeholder(__('validation.attributes.backend.access.product.nameplaceholder'))
                                    ->attribute('maxlength', 191)
                                    ->required()
                                    ->autofocus() }}
                            </div><!--col-->
                        </div><!--form-group-->

                     

                      <div class="form-group row">
                          {{ html()->label(__('validation.attributes.backend.access.product.descriptionoffer'))->for('descriptionoffer') }}
                                
                                <div class="col-md-10">
                                    {{ html()->textarea('descriptionoffer')
                                        ->class('form-control')
                                        ->placeholder(__('validation.attributes.backend.access.product.descriptionofferplaceholder'))
                                         }}
                                         </div>
                            </div>
                        <div class="form-group row">
                          {{ html()->label(__('validation.attributes.backend.access.product.category'))->for('productcategory') }}
                                
                                <div class="col-md-10">
                                    <select name="category">
                                        <option value="">select</option>
 @foreach ($Acategorys as $Acategorys)
                                        <option value={{ $Acategorys['id'] }}>{{ $Acategorys['name'] }}</option>
                                        @endforeach
  
</select>
                                         </div>
                            </div>  
                        <div class="form-group row">
                          {{ html()->label(__('validation.attributes.backend.access.product.descriptionbussiness'))->for('descriptionbussiness') }}
                                
                                <div class="col-md-10">
                                    {{ html()->textarea('descriptionbussiness')
                                        ->class('form-control')
                                        ->placeholder(__('validation.attributes.backend.access.product.descriptionbussinessplaceholder'))
                                         }}
                                         </div>
                            </div>
                        
                 
                        
                          <div class="form-group row increment clone">
                              
                            {{ html()->label(__('validation.attributes.backend.access.product.image'))->class('col-md-2 form-control-label')->for('image') }}

                                   <div class="input-group control-group" >
          <input type="file" name="imagelist[]" class="form-control">
          
        </div>
                              
                            
                        </div><!--form-group-->
                        <div class="input-group-btn"> 
            <button class="btn btn-success addmorepicture" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
          </div>
                        
                        <div class="form-group row">
                          {{ html()->label(__('validation.attributes.backend.access.product.percentage'))->for('percentage') }}
                                
                                <div class="range-slider">
  <input class="range-slider__range" name="rangeslider" type="range" value="20" min="20" max="100">
  <span class="range-slider__value">20</span>
</div>
                        
               </div>
                        
<div class="form-group row">
                          {{ html()->label(__('validation.attributes.backend.access.product.deliverymethod'))->for('deliverymethod') }}
                                
                                <div class="col-md-10">
                                    <select name="delivery">
                                        <option value="">select</option>
                                        @foreach ($Adeliverys as $Adelivery)
                                        <option value={{ $Adelivery['id'] }}>{{ $Adelivery['name'] }}</option>
                                        @endforeach
             
  
  
</select>
                                         </div>
                            </div>  
                        
                          <div class="form-group row">
                              
                            {{ html()->label(__('validation.attributes.backend.access.product.pricelist'))->class('col-md-2 form-control-label')->for('pricelist') }}

                                   <div class="col-md-10" >
          <input type="file" name="pricelist" class="form-control">
          
        </div>
                              
                            
                        </div>
                        
                         <div class="form-group row">
                              
                            {{ html()->label(__('validation.attributes.backend.access.product.offervalid'))->class('col-md-2 form-control-label')->for('offervalid') }}

                                   <div class="col-md-10" >
                                       
                                        <input type="radio" name="toggle_option" checked value="1" /> Forever
                    <input type="radio" name="toggle_option" value="2"  /> Timeperiod
         
        </div>
   </div>
                        
                        <div class="form-group row timeperiod hide">
                              
                            {{ html()->label(__('validation.attributes.backend.access.product.timefrom'))->class('col-md-2 form-control-label')->for('timefrom') }}

                                   <div class="col-md-10 input-append date form_datetime" >
          <input data-date-format="dd/mm/yyyy" id="datepickerfrom" name="datepickerfrom">
          
        </div>
                            <div class="col-md-10 input-append date form_datetime" >
          <input data-date-format="dd/mm/yyyy" id="datepickerto" name="datepickerto">
          
        </div>
                              
                            
                        </div>
                        
                        
                        
                        
                        
                    </div><!--col-->
                </div><!--row-->
            </div><!--card-body-->

            <div class="card-footer clearfix">
                <div class="row">
                    <div class="col">
                        {{ form_cancel(route('admin.auth.user.index'), __('buttons.general.cancel')) }}
                    </div><!--col-->

                    <div class="col text-right">
                        {{ form_submit(__('buttons.general.crud.create')) }}
                    </div><!--col-->
                </div><!--row-->
            </div><!--card-footer-->
        </div><!--card-->
    {{ html()->form()->close() }}
@endsection

@push('after-scripts')
<script src="<?php echo e(URL::asset('js/slider.js')); ?>"></script>
    <script>
        $(document).ready(function() {

      $(".addmorepicture").click(function(){ 
          var html = $(".clone").html();
          $(".increment").after(html);
      });
      
      

    
rangeSlider();
    });
    
    $('input[name=toggle_option]').change(function() {
                
                alert($(this).val());
            });
    
    </script>
    
@endpush    
