@extends('admin.layouts.modal')

{{-- Content --}}
@section('content')
	<!-- Tabs -->
		<ul class="nav nav-tabs">
			<li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
			<li><a href="#tab-upload" data-toggle="tab">Upload Media (OPTIONAL)</a></li>
			<li><a href="#tab-resource" data-toggle="tab">View uploaded Media (OPTIONAL)</a></li>
		</ul>
	<!-- ./ tabs -->

	{{-- Create Scene Form --}}
	<form class="form-horizontal" method="post" action="" autocomplete="off">
		<!-- CSRF Token -->
		<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
		<!-- ./ csrf token -->

		<!-- Tabs Content -->
		<div class="tab-content">
			<!-- Tab General -->
			<div class="tab-pane active" id="tab-general">
				<!-- Scene Name -->
				<div class="form-group {{{ $errors->has('scene_name') ? 'error' : '' }}}">
					<label class="col-md-2 control-label" for="name">Scene Name</label>
                    <div class="col-md-10">
    					<input class="form-control" type="text" name="scene_name" id="name" value="{{{ Input::old('scene_name') }}}" />
    					{{ $errors->first('scene_name', '<span class="help-inline">:message</span>') }}
                    </div>
				</div>
				<!-- ./ name -->
				<!-- Scene reference -->
				<div class="form-group {{{ $errors->has('scene_reference') ? 'error' : '' }}}">
					<label class="col-md-2 control-label" for="ref">Scene Reference</label>
                    <div class="col-md-10">
    					<input class="form-control" type="text" name="scene_reference" id="ref" value="{{{ Input::old('scene_reference') }}}" />
    					{{ $errors->first('scene_reference', '<span class="help-inline">:message</span>') }}
                    </div>
				</div>
				<!-- ./ Scene reference -->
				<!-- Scene Description -->
				<div class="form-group {{{ $errors->has('scene_description') ? 'error' : '' }}}">
					<label class="col-md-2 control-label" for="desc">Scene Description</label>
                    <div class="col-md-10">
    					<input class="form-control" type="text" name="scene_description" id="desc" value="{{{ Input::old('scene_description') }}}" />
    					{{ $errors->first('scene_description', '<span class="help-inline">:message</span>') }}
                    </div>
				</div>
				<!-- ./ name -->
			</div>
			<!-- ./ tab general -->

	        <!-- upload tab -->
	        <div class="tab-pane" id="tab-upload">
                <div class="form-group">
                    <label>
                    
                    Upload Media
                        <input class="control-label" type="hidden" id="" name="" value="0" />
                        <input class="form-control" type="checkbox" id="" name="" value="1"/>
                    </label> 
                </div>
	        </div>
	        <!-- ./ upload tab -->
	        
	        <!-- resource tab -->
	        <div class="tab-pane" id="tab-resource">
                <div class="form-group">
                    <label>
                    
                    	View Uploaded Media
                        <input class="control-label" type="hidden" id="" name="" value="0" />
                        <input class="form-control" type="checkbox" id="" name="" value="1"/>
                    </label> 
                </div>
	        </div>
	        <!-- ./ resource tab -->
	        
		</div>
		<!-- ./ tabs content -->

		<!-- Form Actions -->
		<div class="form-group">
            <div class="col-md-offset-2 col-md-10">
				<element class="btn-cancel close_popup">Cancel</element>
				<button type="reset" class="btn btn-default">Reset</button>
				<button type="submit" class="btn btn-success">Create Scene</button>
            </div>
		</div>
		<!-- ./ form actions -->
	</form>
@stop
