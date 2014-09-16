@extends('editor.layouts.modal')

{{-- Content --}}
@section('content')
	<!-- Tabs -->
		<ul class="nav nav-tabs">
			<li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
			<li><a href="#tab-upload" data-toggle="tab">Upload Media (OPTIONAL)</a></li>
			<li><a href="#tab-resource" data-toggle="tab">View uploaded Media (OPTIONAL)</a></li>
		</ul>
	<!-- ./ tabs -->

		<!-- Tabs Content -->
		<div class="tab-content">
			<!-- General tab -->
			<div class="tab-pane active" id="tab-general">
					{{-- Edit Canvas Form --}}
					<form class="form-horizontal" method="post" action="" autocomplete="off">
					<!-- CSRF Token -->
					<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
					<!-- ./ csrf token -->
					
				<!-- Canvas Name -->
				<div class="form-group {{{ $errors->has('canvas_name') ? 'error' : '' }}}">
					<label class="col-md-2 control-label" for="canvas_name">Canvas Name</label>
					<div class="col-md-10">
						<input class="form-control" type="text" name="canvas_name" id="canvas_name" value="{{{ Input::old('canvas_name', $canvas->canvas_name) }}}" />
						{{ $errors->first('canvas_name', '<span class="help-inline">:message</span>') }}
					</div>
				</div>
				<!-- ./ Canvas name -->
				<!--  Canvas reference -->
				<div class="form-group {{{ $errors->has('canvas_reference') ? 'error' : '' }}}">
					<label class="col-md-2 control-label" for="canvas_reference">Canvas Reference</label>
					<div class="col-md-10">
						<input class="form-control" type="text" name="canvas_reference" id="canvas_reference" value="{{{ Input::old('canvas_reference', $canvas->canvas_reference) }}}" />
						{{ $errors->first('canvas_reference', '<span class="help-inline">:message</span>') }}
					</div>
				</div>
				<!-- ./ Canvas reference -->
				<!-- Canvas Description -->
				<div class="form-group {{{ $errors->has('canvas_description') ? 'error' : '' }}}">
					<label class="col-md-2 control-label" for="canvas_description">Canvas Description</label>
					<div class="col-md-10">
						<input class="form-control" type="text" name="canvas_description" id="canvas_description" value="{{{ Input::old('canvas_description', $canvas->canvas_description) }}}" />
						{{ $errors->first('canvas_description', '<span class="help-inline">:message</span>') }}
					</div>
				</div>
				<!-- ./ Canvas Description -->
				<!-- Form Actions -->
					<div class="form-group">
						<div class="col-md-7">
							<button type="reset" class="btn btn-default">Reset</button>
							<button type="submit" class="btn btn-success">Update Canvas</button>
						</div>
					</div>
					<!-- ./ form actions -->
	</form>
				
			</div>
			<!-- ./ general tab -->
			
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
                    </label> 
                </div>
	        </div>
	        <!-- ./ resource tab -->
	        
		</div>
		<!-- ./ tabs content -->

		
@stop
