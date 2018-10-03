@extends('backend.layouts.app')

@section('title', __('labels.backend.access.category.offerservicemanagement') . ' | ' . __('labels.backend.access.category.create'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
    {{ html()->form('POST', route('admin.category.update'))->class('form-horizontal')->attribute('enctype', 'multipart/form-data')->open() }}
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-5">
                        <h4 class="card-title mb-0">
                            @lang('labels.backend.access.category.offerservicemanagement')
                            <small class="text-muted">@lang('labels.backend.access.category.create')</small>
                        </h4>
                    </div><!--col-->
                </div><!--row-->

                <hr>

                <div class="row mt-4 mb-4">
                    <div class="col">
                        <div class="form-group row">
                            {{ html()->label(__('validation.attributes.backend.access.category.name'))->class('col-md-2 form-control-label')->for('name') }}

                            <div class="col-md-10">
                                {{ html()->text('name')
                                    ->class('form-control')
                                    ->placeholder(__('validation.attributes.backend.access.category.nameplaceholder'))
                                    ->attribute('maxlength', 191)
                                    ->required()
                                    ->autofocus() }}
                            </div><!--col-->
                        </div><!--form-group-->

                     

                      <div class="form-group row">
                          {{ html()->label(__('validation.attributes.backend.access.category.description'))->for('description') }}
                                
                                <div class="col-md-10">
                                    {{ html()->textarea('description')
                                        ->class('form-control')
                                        ->placeholder(__('validation.attributes.backend.access.category.descriptionplaceholder'))
                                         }}
                                         </div>
                            </div>
                        
                          <div class="form-group row">
                            {{ html()->label(__('validation.attributes.backend.access.category.seo'))->class('col-md-2 form-control-label')->for('seo') }}

                            <div class="col-md-10">
                                {{ html()->text('seo')
                                    ->class('form-control')
                                    ->placeholder(__('validation.attributes.backend.access.category.seoplaceholder'))
                                    ->attribute('maxlength', 191)
                                    ->required()
                                    ->autofocus() }}
                            </div><!--col-->
                        </div><!--form-group-->
                        
                         <div class="form-group row">
                            {{ html()->label(__('validation.attributes.backend.access.category.image'))->class('col-md-2 form-control-label')->for('image') }}

                            <div class="col-md-10">
                                 <input type="file" class= "form-control"  name="avatar" >
                                    
                            </div><!--col-->
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
