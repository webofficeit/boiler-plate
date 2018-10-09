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
                            <small class="text-muted">@lang('labels.backend.access.product.create')</small>
                        </h4>
                    </div><!--col-->
                </div><!--row-->

                <hr>

                <div class="row mt-4 mb-4">
                    <div class="col">
                        <input type='hidden' id="prodid" name="prodid" value="{{$product->id}}">
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
                 
                        @foreach ($product->picture as $keypicture => $picture)
                            <div class="form-group row">                              
                                {{ html()->label(__('validation.attributes.backend.access.product.image'))->class('col-md-2 form-control-label')->for('image') }}
                                <div class="col-md-6">
                                    <div class="input-group control-group">
                                        <input type="file" name="imagelist[]" class="custom-file-input">
                                        <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="img-wrap" data-id = {{$keypicture}}>
                                        <span class="close">&times;</span>
                                        <img src="{{ url('storage/category/product/'.$picture) }}" class="img-fluid" >
                                    </div>
                                </div>
                            </div><!--form-group-->
                        @endforeach
                        
                        <div class="form-group row increment clone hide">
                              
                            {{ html()->label(__('validation.attributes.backend.access.product.image'))->class('col-md-2 form-control-label')->for('image') }}

                            <div class="input-group control-group">
                                <input type="file" name="imagelist[]" class="custom-file-input">
                                <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
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
                                <input class="range-slider__range" name="rangeslider" type="range" value="{{$product->girapercentage}}" min="20" max="100">
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
                                <a href="{{ URL::to( 'storage/' . $product->pricelistdocument)  }}" target="_blank"> {{ str_after(str_replace_last('/','#',$product->pricelistdocument, '/'),'#') }} </a>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            {{ html()->label(__('validation.attributes.backend.access.product.offervalid'))->class('col-md-2 form-control-label')->for('offervalid') }}
                            <div class="col-md-10" >
                                <div class="radio-toggle">
                                    <input type="radio" name="toggle_option" value="1" id="forever" checked="checked" />
                                    <label for="forever">Forever</label>
                                    <input type="radio" name="toggle_option" value="2" id="timeperiod" />
                                    <label for="timeperiod">Timeperiod</label>
                                </div>
                            </div>
                        </div>
                                    
                        <div class="form-group row timeperiod ">
                            {{ html()->label(__('validation.attributes.backend.access.product.timefrom'))->class('col-md-2 form-control-label')->for('timefrom') }}
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

                        <div class="form-group row">
                            {{ html()->label(__('validation.attributes.backend.access.product.confirmation'))->class('col-md-2 form-control-label')->for('offervalid') }}
                            <div class="col-md-10" >
                                <div class="radio-toggle">
                                    <input type="radio" name="toggle_option_confirm" value="1" id="yes" checked="checked" />
                                    <label for="yes">Yes</label>
                                    <input type="radio" name="toggle_option_confirm" value="2" id="no" />
                                    <label for="no">No</label>
                                </div>
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
                        {{ form_submit(__('buttons.general.crud.edit')) }}
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
            $(".hide").hide();
            $(".addmorepicture").click(function(){ 
                $("this .hide").show();
                var html = $(".clone").html();
                $(".increment").after(html);
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
                        alert('AJAX ERROR ! Check the console !');                    
                    }
                });
            });
        });
    
        $('input[name=toggle_option]').change(function() {
            alert($(this).val());
        });

        $('.custom-file-input').change(function (e) {
            $(this).next('.custom-file-label').html(e.target.files[0].name);
        });

        $('#datepickerfrom').datetimepicker({
            icons: {
                time: 'far fa-clock'
            },
            format: 'DD/MM/YYYY'
        });
        $('#datepickerto').datetimepicker({
            icons: {
                time: 'far fa-clock'
            },
            format: 'DD/MM/YYYY'
        });
    
    </script>
    
@endpush    
