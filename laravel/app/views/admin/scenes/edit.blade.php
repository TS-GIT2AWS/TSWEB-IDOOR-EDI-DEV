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

	

		<!-- Tabs Content -->
		<div class="tab-content">
			<!-- General tab -->
			<div class="tab-pane active" id="tab-general">
					{{-- Edit Scene Form --}}
					<form class="form-horizontal" method="post" action="" autocomplete="off">
					<!-- CSRF Token -->
					<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
					<!-- ./ csrf token -->
					
				<!-- Name -->
				<div class="form-group {{{ $errors->has('scene_name') ? 'error' : '' }}}">
					<label class="col-md-2 control-label" for="name">Scene Name</label>
					<div class="col-md-10">
						<input class="form-control" type="text" name="scene_name" id="name" value="{{{ Input::old('scene_name', $scene->scene_name) }}}" />
						{{ $errors->first('scene_name', '<span class="help-inline">:message</span>') }}
					</div>
				</div>
				<!-- ./ name -->
				<!-- Name -->
				<div class="form-group {{{ $errors->has('scene_reference') ? 'error' : '' }}}">
					<label class="col-md-2 control-label" for="name">Scene Reference</label>
					<div class="col-md-10">
						<input class="form-control" type="text" name="scene_reference" id="ref" value="{{{ Input::old('scene_reference', $scene->scene_reference) }}}" />
						{{ $errors->first('scene_reference', '<span class="help-inline">:message</span>') }}
					</div>
				</div>
				<!-- ./ name -->
				<!-- Name -->
				<div class="form-group {{{ $errors->has('scene_description') ? 'error' : '' }}}">
					<label class="col-md-2 control-label" for="name">Scene Description</label>
					<div class="col-md-10">
						<input class="form-control" type="text" name="scene_description" id="desc" value="{{{ Input::old('scene_description', $scene->scene_description) }}}" />
						{{ $errors->first('scene_description', '<span class="help-inline">:message</span>') }}
					</div>
				</div>
				<!-- ./ name -->
				<!-- Form Actions -->
					<div class="form-group">
						<div class="col-md-offset-2 col-md-10">
							<element class="btn-cancel close_popup">Cancel</element>
							<button type="reset" class="btn btn-default">Reset</button>
							<button type="submit" class="btn btn-success">Update Role</button>
						</div>
					</div>
					<!-- ./ form actions -->
	</form>
				
			</div>
			<!-- ./ general tab -->

			  <!-- upload tab -->
	        <div class="tab-pane" id="tab-upload">
                <div class="form-group">
                      
                    
                    <div class='help'>
						<span>* Support File Type of <u>{{ Lang::get('upload.WE_RESOURCE_IMAGE') }}</u> ( {{ Lang::get('upload.WE_ALLOWED_IMG_EXT')}} ) and <u>{{Lang::get('upload.WE_RESOURCE_VIDEO')}}</u> ( {{Lang::get('upload.WE_ALLOWED_VIDEO_EXT')}} ) and <u>{{Lang::get('upload.WE_RESOURCE_DOC')}}</u> ( {{Lang::get('upload.WE_ALLOWED_DOC_EXT')}} ). </span><br />
						<span>* Support up to <u>20MB</u> per file.</span>
					</div>
                    <br/>
                     <label>
                   	<form id="upload_file_form" method="post" action="@if (isset($scene)){{ URL::to('admin/scenes/' . $scene->id . '/upload') }}@endif" enctype="multipart/form-data">
						<div id="drop">
						<!-- CSRF Token -->
							<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
							<input type="hidden" name="scene_id" value="{{{ $scene->id }}}" />
							
						<!-- ./ csrf token -->
							Drop Here<br/>
							<a>Browse</a>
								<input type="file" name="upl" multiple />
						</div>
						<ul>
								<!-- The file uploads will be shown here -->
						</ul>
                    </form>
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
