@extends('backend.layouts.app')

@section('title', __('labels.backend.access.product.management') . ' | ' . __('labels.backend.access.product.create'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
    {{ html()->form('POST', route('admin.product.editupdate'))->class('form-horizontal')->attribute('enctype', 'multipart/form-data')->open() }}
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-5">
                        <h4 class="card-title mb-0">
                            @lang('labels.backend.access.product.management')
                            <small class="text-muted">@lang('labels.backend.access.product.edit')</small>
                        </h4>
                    </div><!--col-->
                </div><!--row-->

                <hr>

                <div class="row mt-4 mb-4">
                    <div class="col">
                        <input type='hidden' id="prodid" name="prodid" value="{{$product->id}}">
                        <input type='hidden' id="prevoiusurl" name="prevoiusurl" value="{{$isconfirm}}">
                        <div class="form-group row">
                            {{ html()->label(__('validation.attributes.backend.access.product.name'))->class('col-md-2 form-control-label')->for('name') }}

                            <div class="col-md-6">
                                {{ html()->text('name')
                                    ->class('form-control')
                                    ->placeholder(__('validation.attributes.backend.access.product.nameplaceholder'))
                                    ->attribute('maxlength', 191)
                                    ->value($product->name)
                                    ->required()
                                    ->autofocus() }}
                            </div><!--col-->
                        </div><!--form-group-->

                        <div class="form-group row">
                            {{ html()->label(__('validation.attributes.backend.access.product.descriptionoffer'))->class('col-md-2 form-control-label')->for('descriptionoffer') }}
                                
                            <div class="col-md-6">
                                {{ html()->textarea('descriptionoffer')
                                    ->class('form-control')
                                    ->value($product->descriptionoffer)
                                    ->placeholder(__('validation.attributes.backend.access.product.descriptionofferplaceholder'))
                                }}
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ html()->label(__('validation.attributes.backend.access.product.category'))->class('col-md-2 form-control-label')->for('productcategory') }}
                            <div class="col-md-6"> 
                                <select name="category" class="form-control">
                                    <option value="">select</option>
                                    @foreach ($Acategorys as $Acategorys)
                                        <option {{($product->categoryid==$Acategorys['id'])? 'selected':''}} value={{ $Acategorys['id'] }}>{{ $Acategorys['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>  
                        <div class="form-group row">
                            {{ html()->label(__('validation.attributes.backend.access.product.descriptionbussiness'))->class('col-md-2 form-control-label')->for('descriptionbussiness') }}
                            <div class="col-md-6">
                                {{ html()->textarea('descriptionbussiness')
                                    ->class('form-control')
                                    ->value($product->descriptionbussiness)
                                    ->placeholder(__('validation.attributes.backend.access.product.descriptionbussinessplaceholder'))
                                        }}
                            </div>
                        </div>
                        
                 <div class="image-list">
                     
                        @forelse ($product->picture as $keypicture => $picture)
                        
                            <div class="form-group row increment">                              
                                {{ html()->label(__('validation.attributes.backend.access.product.image'))->class('col-md-2 form-control-label')->for('image') }}
                                <div class="col-md-6">
                                    <div class="input-group control-group">
                                        <input type="file" name="imagelist[]" class="custom-file-input" accept="image/*">
                                        <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="img-wrap" data-id = {{$keypicture}}>
                                        <span class="close">&times;</span>
                                        <img src="{{ url('storage/category/product/'.$product->user_id.'/images/'.$picture) }}" class="img-fluid" >
                                    </div>
                                </div>
                            </div><!--form-group-->
                        
                        @empty
              <div class="form-group row increment">
                              
                            {{ html()->label(__('validation.attributes.backend.access.product.image'))->class('col-md-2 form-control-label')->for('image') }}

                  <div class="col-md-6">
                                    <div class="input-group control-group imagelist">
                                        <input type="file" name="imagelist[]" accept="image/*" class="custom-file-input">
                                        <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                    </div>
                                </div>
        </div>
@endforelse
                        </div>
                        
                        
                        <div class='clone d-none'>
                          <div class="form-group row increment">
                              
                            {{ html()->label(__('validation.attributes.backend.access.product.image'))->class('col-md-2 form-control-label')->for('image') }}

                  <div class="col-md-6">
                                    <div class="input-group control-group imagelist">
                                        <input type="file" name="imagelist[]" class="custom-file-input">
                                        <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                    </div>
                                </div>
        </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-10 offset-md-2 input-group-btn"> 
                                <button class="btn btn-primary addmorepicture" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                            </div>
                        </div>
                        
                        <div class="form-group row range-slider-container">
                            {{ html()->label(__('validation.attributes.backend.access.product.percentage'))->class('col-md-2 form-control-label align-self-end')->for('percentage') }}    
                            <div class="range-slider col-md-6">
                                <input class="range-slider__range" name="rangeslider" type="range" value="{{$product->girapercentage}}" min="20" max="99">
                                <span class="range-slider__value">20</span>
                            </div>                        
                        </div>
                        
                        <div class="form-group row">
                            {{ html()->label(__('validation.attributes.backend.access.product.deliverymethod'))->class('col-md-2 form-control-label')->for('deliverymethod') }}
                                
                            <div class="col-md-6">
                                <select name="delivery" class="form-control">
                                    <option value="">select</option>
                                    @foreach ($Adeliverys as $Adelivery)
                                        <option  {{($product->deliverymethodid==$Adelivery['id'])? 'selected':''}} value={{ $Adelivery['id'] }}>{{ $Adelivery['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>  
                        
                        <div class="form-group row">
                              
                            {{ html()->label(__('validation.attributes.backend.access.product.pricelist'))->class('col-md-2 form-control-label')->for('pricelist') }}
                            <div class="col-md-6" >
                                <div class="input-group">
                                    <input type="file" name="pricelist" class="custom-file-input">
                                    <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                </div>
                            </div>
                            <div class="col-md-4">                    
                                <a href="{{ URL::to( 'storage/category/product/'.$product->user_id.'/doc/'.$product->pricelistdocument)  }}" target="_blank"> {{ str_after(str_replace_last('/','#',$product->pricelistdocument, '/'),'#') }} </a>
                            </div>
                        </div>
                        
                          <div class="form-group row">
                            {{ html()->label(__('validation.attributes.backend.access.product.buynow'))->class('col-md-2 form-control-label')->for('name') }}

                            <div class="col-md-6">
                                {{ html()->text('buy')
                                    ->class('form-control')
                                    ->placeholder(__('validation.attributes.backend.access.product.buynowplaceholder'))
                                    ->attribute('maxlength', 191)
                                    ->value($product->buynow)
                                    ->autofocus() }}
                            </div><!--col-->
                        </div><!--form-group-->
                        
                        <div class="form-group row">
                            {{ html()->label(__('validation.attributes.backend.access.product.offervalid'))->class('col-md-2 form-control-label')->for('offervalid') }}
                            <div class="col-md-10" >
                                <div class="radio-toggle">
                                    <input type="radio" name="toggle_option" value="1" {{($product->Offertype)&&($product->Offertype[0]->type == 1) ? 'checked':''}} id="timeperiod" />
                                    <label for="timeperiod">Timeperiod</label>
                                    
                                    <input type="radio" name="toggle_option" value="2" id="forever" {{($product->Offertype)&&($product->Offertype[0]->type == 2) ? 'checked':''}}  />
                                    <label for="forever">Forever</label>
                                    
                                </div>
                            </div>
                        </div>
                           
                        
                        <div class="form-group row timeperiod">
                            {{ html()->label(__('validation.attributes.backend.access.product.timeperiod'))->class('col-md-2 form-control-label')->for('timeperiod') }}
                            <div class="col-md-3">
                                <div class="input-group date form_datetime">                                    
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <input id="datepickerfrom" name="datepickerfrom" class="form-control calendar-datepicker">
                                </div>
                            </div>
                            <div class="col-md-3" >
                                <div class="input-group date form_datetime">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <input id="datepickerto" name="datepickerto" class="form-control calendar-datepicker">
                                </div>
                            </div>
                        </div>
                        
                        @if ($logged_in_user->isAdmin())
                        <div class="form-group row">
                            {{ html()->label(__('validation.attributes.backend.access.product.confirmation'))->class('col-md-2 form-control-label')->for('offervalid') }}
                            <div class="col-md-10" >
                                <div class="radio-toggle">
                                    <input type="radio" name="toggle_option_confirm" value="1" id="yes"   {{($product->confirmed == 1) ? 'checked':''}} />
                                    <label for="yes">Yes</label>
                                    <input type="radio" name="toggle_option_confirm" value="0" {{($product->confirmed == 0) ? 'checked':''}} id="no" />
                                    <label for="no">No</label>
                                </div>
                            </div>
                        </div>
                        @endif
                        
                    </div><!--col-->
                </div><!--row-->
            </div><!--card-body-->

            <div class="card-footer clearfix">
                <div class="row">
                    <div class="col">
                        {{ form_cancel(route('admin.product'), __('buttons.general.cancel')) }}
                    </div><!--col-->

                    <div class="col text-right">
                        {{ form_submit(__('buttons.general.crud.update')) }}
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
            
            if({{$product->Offertype[0]->type}} == 2) {
                $('.timeperiod').hide()
            }
            
            var max_fields = 5;
       var intialval = $('.increment:visible').length; 
       var clonehtml = '';
      $(".addmorepicture").click(function(e){ 
          e.preventDefault();
        if(intialval < max_fields){ //max input box allowed
            intialval++; //text box increment
            
            if(clonehtml=='') {
                clonehtml = $(".clone").html();
            }
            
            $(".image-list").append(clonehtml); //add input box
        }

      });   
            rangeSlider();

            $(".close").click(function() {
                var imghide = this;
                var prodid =  0;
                @if (count($product->Offerimage()->get())>0)
                    prodid = {{$product->Offerimage()->get()[0]->id }}
                @endif   
                
                $.ajax({
                    url:      '/admin/product/updateimage',
                    type:     'post',
                    dataType: 'json',
                    data:     {"_token": "{{ csrf_token() }}",'imgid':prodid,'dataid':$(this).parent().attr('data-id')},
                    success: function(data) {
                        
                            $(imghide).parent().hide();
                    },
                    error: function(xhr, textStatus, errorThrown) {
                        console('AJAX ERROR ! Check the console !');                    
                    }
                });
            });
        });
    
         $('input[name=toggle_option]').change(function() {
                if($(this).val() == 2) {
                    $('.timeperiod').hide()
                }
                else {
      
                    $('.timeperiod').show()
                   
                }
            });

             $(document).on('change', '.custom-file-input', function(e) {
            $(this).next('.custom-file-label').html(e.target.files[0].name);
});
      
       $('#datepickerfrom').datetimepicker({
            icons: {
                time: 'far fa-clock'
            },
            format: 'DD/MM/YYYY',
            defaultDate: '{{$product->Offertype[0]->datefrom}}'
            
            
        });
        $('#datepickerto').datetimepicker({
            
            icons: {
                time: 'far fa-clock'
            },
            format: 'DD/MM/YYYY',
            defaultDate:'{{$product->Offertype[0]->dateto}}'
           
        });
        
        $("#datepickerfrom").on("dp.change", function (e) {
            
            $('#datepickerto').data("DateTimePicker").minDate(e.date);
        });
    
    </script>
     <script src="{{ URL::asset('js/clientvalidation.js') }}"></script>
        <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\Backend\UpdateProductRequest', 'form'); !!}
    
@endpush    
