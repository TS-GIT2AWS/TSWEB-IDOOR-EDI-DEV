@extends('editor.layouts.modal')

{{-- Content --}}
@section('content')
	<!-- Tabs -->
		<ul class="nav nav-tabs">
			<li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
			<li><a href="#tab-upload" data-toggle="tab">Upload Media (OPTIONAL)</a></li>
			
		</ul>
	<!-- ./ tabs -->

	{{-- Create Canvas Form --}}
	<form class="form-horizontal" method="post" action="" autocomplete="off" enctype="multipart/form-data">
		<!-- CSRF Token -->
		<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
		<!-- ./ csrf token -->

		<!-- Tabs Content -->
		<div class="tab-content">
			<!-- Tab General -->
			<div class="tab-pane active" id="tab-general">
				<!-- Canvas Name -->
				<div class="form-group {{{ $errors->has('canvas_name') ? 'error' : '' }}}">
					<label class="col-md-2 control-label" for="canvas_name">Canvas Name</label>
                    <div class="col-md-10">
    					<input class="form-control" type="text" name="canvas_name" id="canvas_name" value="{{{ Input::old('canvas_name') }}}" />
    					{{ $errors->first('canvas_name', '<span class="help-inline">:message</span>') }}
                    </div>
				</div>
				<!-- ./  Canvas name -->
				<!-- Canvas reference -->
				<div class="form-group {{{ $errors->has('canvas_reference') ? 'error' : '' }}}">
					<label class="col-md-2 control-label" for="canvas_reference">Canvas Reference</label>
                    <div class="col-md-10">
    					<input class="form-control" type="text" name="canvas_reference" id="canvas_reference" value="{{{ Input::old('canvas_reference') }}}" />
    					{{ $errors->first('canvas_reference', '<span class="help-inline">:message</span>') }}
                    </div>
				</div>
				<!-- ./ Canvas reference -->
				<!-- Canvas Description -->
				<div class="form-group {{{ $errors->has('canvas_description') ? 'error' : '' }}}">
					<label class="col-md-2 control-label" for="canvas_description">Canvas Description</label>
                    <div class="col-md-10">
    					<input class="form-control" type="text" name="canvas_description" id="canvas_description" value="{{{ Input::old('canvas_description') }}}" />
    					{{ $errors->first('canvas_description', '<span class="help-inline">:message</span>') }}
                    </div>
				</div>
				<!-- ./ Canvas Description -->
				
				<!-- ./ Canvas reference -->
				
				
				
				<!-- Form Actions -->
				<div class="form-group">
		            <div class="col-md-7">
						<button type="reset" class="btn btn-default">Reset</button>
						<button type="submit" class="btn btn-success">Create Canvas</button>
		            </div>
				</div>
				<!-- ./ form actions -->
				</form>
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
	        
	        
	        
		</div>
		<!-- ./ tabs content -->

		
@stop
