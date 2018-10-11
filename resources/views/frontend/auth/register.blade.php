@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.frontend.auth.register_box_title'))

@section('content')
    <div class="row justify-content-center align-items-center">
        <div class="col col-sm-8 align-self-center">
            <div class="card">
                <div class="card-header">
                    <strong>
                        @lang('labels.frontend.auth.register_box_title')
                    </strong>
                </div><!--card-header-->

                <div class="card-body">
                    {{ html()->form('POST', route('frontend.auth.register.post'))->attribute('enctype', 'multipart/form-data')->open() }}
                    
                    <div class="row">
        <div class="col">

            <div class="form-group">
                {{ html()->label(__('validation.attributes.frontend.accounttype'))->for('accounttype') }}

                <div class="radio-toggle">
                    <input type="radio" name="registration_type"  checked {{ old('registration_type')==1 ? 'checked' : ''}} value="1" id="reg_private" />
                    <label for="reg_private">Private</label>
                    
                    <input type="radio" name="registration_type" value="2" {{ old('registration_type')==2 ? 'checked' : ''}} id="reg_business" />
                    <label for="reg_business">Business</label>
                </div>
            </div><!--form-group-->


            
        </div><!--col-->
    </div><!--row-->
                        <div class="row">
                            
                            <div class="col-12 col-md-6"> 
                                <div class="form-group">
                                    {{ html()->label(__('validation.attributes.frontend.first_name'))->for('first_name') }}

                                    {{ html()->text('first_name')
                                        ->class('form-control')
                                        ->required()
                                        ->placeholder(__('validation.attributes.frontend.first_name'))
                                        ->attribute('maxlength', 191) }}
                                </div><!--col-->
                                
                            </div><!--row-->
                            
                           

                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    {{ html()->label(__('validation.attributes.frontend.last_name'))->for('last_name') }}

                                    {{ html()->text('last_name')
                                        ->class('form-control')
                                        ->required()
                                        ->placeholder(__('validation.attributes.frontend.last_name'))
                                        ->attribute('maxlength', 191) }}
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->
                        
                         <div class="row">
                                <div class="col-12 col-md-12">
                                <div class="form-group">
                                    {{ html()->label(__('validation.attributes.frontend.address'))->for('address') }}

                                    {{ html()->textarea('address')
                                        ->class('form-control')
                                        ->placeholder(__('validation.attributes.frontend.address'))
                                         }}
                                         </div>
                                </div><!--col-->
                            </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    {{ html()->label(__('validation.attributes.frontend.email'))->for('email') }}

                                    {{ html()->email('email')
                                        ->class('form-control')
                                        ->placeholder(__('validation.attributes.frontend.email'))
                                        ->attribute('maxlength', 191)
                                        ->required() }}
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->
                        
                        <div class="row">
                            
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    {{ html()->label(__('validation.attributes.frontend.latitude'))->for('latitude') }}

                                    {{ html()->text('latitude')
                                        ->class('form-control')
                                        ->placeholder(__('validation.attributes.frontend.latitude'))
                                        ->attribute('maxlength', 82) }}
                                </div><!--col-->
                                
                            </div><!--row-->
                            
                           

                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    {{ html()->label(__('validation.attributes.frontend.longitude'))->for('longitude') }}

                                    {{ html()->text('longitude')
                                        ->class('form-control')
                                        ->placeholder(__('validation.attributes.frontend.longitude'))
                                        ->attribute('maxlength', 82) }}
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->
                        
                        <div class="row">
                            
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    {{ html()->label(__('validation.attributes.frontend.phone'))->for('phone') }}

                                    {{ html()->text('phone')
                                        ->class('form-control')
                                        ->placeholder(__('validation.attributes.frontend.phone'))
                                        ->attribute('maxlength', 14) }}
                                </div><!--col-->
                                
                            </div><!--row-->
                            
                           

                            <div class="col-12 col-md-6" id="web_site">
                                <div class="form-group">
                                    {{ html()->label(__('validation.attributes.frontend.web_site'))->for('web_site') }}

                                    {{ html()->text('web_site')
                                        ->class('form-control')
                                        ->placeholder(__('validation.attributes.frontend.web_site'))
                                        ->attribute('maxlength', 191) }}
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->
                        
                        <div class="row" id = "bussiness_description">
                                <div class="col-12 col-md-12">
                                <div class="form-group">
                                    {{ html()->label(__('validation.attributes.frontend.bussiness_description'))->for('bussiness_description') }}

                                    {{ html()->textarea('bussiness_description')
                                        ->class('form-control')
                                        ->placeholder(__('validation.attributes.frontend.bussiness_description'))
                                         }}
                                         </div>
                                </div><!--col-->
                            </div>
                        
                            <div id="avatar_location">
                                <div class="image-list">
                                    <div class="row increment">                            
                                        <div class="col-12 col-md-6">
                                            
                                            {{ html()->label(__('validation.attributes.frontend.business_registration_papers'))->for('business_registration_papers') }}
                                            <div class="input-group control-group imagelist form-group">
                                                <input type="file" name="bussinesskyc[]" class="custom-file-input">
                                                <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                            </div>
                                        </div><!--row-->

                                    </div>
                                </div>

                                <div class="clone d-none">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-group control-group imagelist form-group">
                                                <input type="file" name="bussinesskyc[]" class="custom-file-input">
                                                <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
        
                                <div class="row">
                                    <div class="col-md-12 input-group-btn form-group"> 
                                        <button class="btn btn-primary addmorepicture" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                                    </div>
                                </div>
                            </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    {{ html()->label(__('validation.attributes.frontend.password'))->for('password') }}

                                    {{ html()->password('password')
                                        ->class('form-control')
                                        ->placeholder(__('validation.attributes.frontend.password'))
                                        ->required() }}
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    {{ html()->label(__('validation.attributes.frontend.password_confirmation'))->for('password_confirmation') }}

                                    {{ html()->password('password_confirmation')
                                        ->class('form-control')
                                        ->placeholder(__('validation.attributes.frontend.password_confirmation'))
                                        ->required() }}
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        @if(config('access.captcha.registration'))
                            <div class="row">
                                <div class="col">
                                    {!! Captcha::display() !!}
                                    {{ html()->hidden('captcha_status', 'true') }}
                                </div><!--col-->
                            </div><!--row-->
                        @endif

                        <div class="row">
                            <div class="col">
                                <div class="form-group mb-0 clearfix">
                                    {{ form_submit(__('labels.frontend.auth.register_button')) }}
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->
                    {{ html()->form()->close() }}

                    <div class="row">
                        <div class="col">
                            <div class="text-center">
                                {!! $socialiteLinks !!}
                            </div>
                        </div><!--/ .col -->
                    </div><!-- / .row -->

                </div><!-- card-body -->
            </div><!-- card -->
        </div><!-- col-md-8 -->
    </div><!-- row -->
@endsection

@push('after-scripts')
    @if(config('access.captcha.registration'))
        {!! Captcha::script() !!}
    @endif
    
     <script>
        $(function() {
            var avatar_location = $("#avatar_location");
            var bussiness_description = $("#bussiness_description");
            var web_site = $('#web_site');
            
            if($('input[name=registration_type]:checked').val()==1) {
            avatar_location.hide();
            bussiness_description.hide();
            web_site.hide();
        }

            $('input[name=registration_type]').change(function() {
                
                if ($(this).val() == 1) {
                    avatar_location.hide();
                    bussiness_description.hide();
                    web_site.hide();
                } else {
                    avatar_location.show();
                    bussiness_description.show();
                    web_site.show();
                }
            });

            var max_fields = 5;
            var intialval = $('.increment:visible').length; 
            var clonehtml = '';
            $(".addmorepicture").click(function(e) {
                e.preventDefault();
                if(intialval < max_fields){ //max input box allowed
                    intialval++; //text box increment
                    if(clonehtml=='') {
                        clonehtml = $(".clone").html();
                    }
                    $(".image-list").append(clonehtml); //add input box
                }
            });

            $(document).on('change', '.custom-file-input', function(e) {
                $(this).next('.custom-file-label').html(e.target.files[0].name);
            });
        });
    </script>
    
@endpush
