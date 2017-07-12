@extends('templates.owner.layout')

@section('content')
<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Create Menu<a href="{{route('menus.index')}}" class="btn btn-info btn-xs"><i class="fa fa-chevron-left"></i> @lang('general.nav.back') </a></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form method="post" action="{{ route('menus.store') }}" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="brand">Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="{{ Request::old('name') ?: '' }}" id="name" name="name" class="form-control col-md-7 col-xs-12">
                                @if ($errors->has('name'))
                                <span class="help-block">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('images') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Images
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="file"  class="col-md-7 col-xs-12" name="images" upload_max_filesize/>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Price<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="" id="price" name="price" class="form-control" required>
                                @if ($errors->has('price'))
                                <span class="help-block">{{ $errors->first('price') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Category<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="category" name = "category" class="form-control" required>
                                    <option value="">Choose..</option>
                                    <option value="Kategory 1">Kategory 1</option>
                                    <option value="Kategory 2">Kategory 2</option>
                                    <option value="Kategory 3">Kategory 3</option>
                                </select>
                                @if ($errors->has('category'))
                                <span class="help-block">{{ $errors->first('category') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('desc') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Description<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                 <textarea class="form-control" rows="3" value="{{ Request::old('desc') ?: '' }}" id="desc" name="desc" class="form-control col-md-7 col-xs-12" ></textarea>
                                @if ($errors->has('desc'))
                                <span class="help-block">{{ $errors->first('desc') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                        	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Tags</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
	                          	<input id="tags_1" type="text" class="tags form-control" value="social, adverts, sales" name="tags" data-name="add a tag'/>
	                          	<div id="suggestions-container" style="position: relative; float: left; width: 250px; margin: 10px;"></div>
	                        </div>
                        </div>

                        <div class="ln_solid"></div>

                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                                <button type="submit" class="btn btn-success">@lang('general.form.create_record')</button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop


@section('css')
    
    
@stop

@section('js')
     <script src="{{asset('gantella/vendors/jquery.tagsinput/src/jquery.tagsinput.js')}}"></script>
@stop