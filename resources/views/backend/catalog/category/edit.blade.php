@extends('backend.layouts.app')

@section('title', __('labels.backend.access.category.offerservicemanagement') . ' | ' . __('labels.backend.access.category.create'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')
    {{ html()->form('POST', route('admin.category.editupdate'))->class('form-horizontal')->attribute('enctype', 'multipart/form-data')->open() }}
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-5">
                        <h4 class="card-title mb-0">
                            @lang('labels.backend.access.category.offerservicemanagement')
                            <small class="text-muted">@lang('labels.backend.access.category.edit')</small>
                        </h4>
                    </div><!--col-->
                </div><!--row-->

                <hr>

                <div class="row mt-4 mb-4">
                    <div class="col">
                        <input type='hidden' id="catgid" name="catgid" value="{{$category->id}}">
                        <div class="form-group row">
                            {{ html()->label(__('validation.attributes.backend.access.category.name'))->class('col-md-2 form-control-label')->for('name') }}

                            <div class="col-md-10">
                                {{ html()->text('name')
                                    ->class('form-control')
                                    ->placeholder(__('validation.attributes.backend.access.category.nameplaceholder'))
                                    ->attribute('maxlength', 191)
                                    ->value($category->name)
                                    ->required()
                                    ->autofocus() }}
                            </div><!--col-->
                        </div><!--form-group-->

                     

                        <div class="form-group row">
                            {{ html()->label(__('validation.attributes.backend.access.category.description'))->class('col-md-2 form-control-label')->for('description') }}
                                
                            <div class="col-md-6">
                                {{ html()->textarea('description')
                                    ->class('form-control')
                                    ->value($category->description)
                                    ->placeholder(__('validation.attributes.backend.access.category.descriptionplaceholder'))
                                        }}
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            {{ html()->label(__('validation.attributes.backend.access.category.seo'))->class('col-md-2 form-control-label')->for('seo') }}

                            <div class="col-md-6">
                                {{ html()->text('seo')
                                    ->class('form-control')
                                    ->placeholder(__('validation.attributes.backend.access.category.seoplaceholder'))
                                    ->attribute('maxlength', 191)
                                    ->value($category->seo)
                                    ->required()
                                    ->autofocus() }}
                            </div><!--col-->
                        </div><!--form-group-->
                        
                        <div class="form-group row">
                            {{ html()->label(__('validation.attributes.backend.access.category.image'))->class('col-md-2 form-control-label')->for('image') }}


                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="file" class= "form-control custom-file-input"  name="avatar" >
                                    <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                </div>
                            </div><!--col-->
                            @if($category->picture)
                                <div class="col-md-2">
                                    <div class="img-wrap">
                                        <span class="close">&times;</span>

                                        <img src="{{ url('storage/category/'.$category->user_id.'/'.$category->picture)  }}"  >
                                    </div>   
                                 @endif                                 
                            </div><!--col-->

                        </div>
                        
                    </div><!--col-->
                </div><!--row-->
            </div><!--card-body-->

            <div class="card-footer clearfix">
                <div class="row">
                    <div class="col">
                        {{ form_cancel(route('admin.category'), __('buttons.general.cancel')) }}
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
    <script>
        $(function() {
                
            $(".close").click(function() {
                var imghide = this;
                $.ajax({
                    url:      '/admin/category/updateimage',
                    type:     'post',
                    dataType: 'json',
                    data:     {"_token": "{{ csrf_token() }}",'imgid':"{{ $category->id }}"},
                    success: function(data) {                        
                        $(imghide).parent().hide();
                    },
                    error: function(xhr, textStatus, errorThrown) {
                        console.log('AJAX ERROR ! Check the console !');
                        
                    }
                });   
            });

            $('.custom-file-input').change(function (e) {
                $(this).next('.custom-file-label').html(e.target.files[0].name);
            });
            
        });
    </script>
@endpush
