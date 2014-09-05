@extends('admin.layouts.modal')

{{-- Content --}}
@section('content')
    <!-- Tabs -->
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
        </ul>
    <!-- ./ tabs -->

    {{-- Delete Scene Form --}}
    <form id="deleteForm" class="form-horizontal" method="post" action="@if (isset($scene)){{ URL::to('admin/scenes/' . $scene->id . '/delete') }}@endif" autocomplete="off">
        <!-- CSRF Token -->
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <input type="hidden" name="id" value="{{ $scene->id }}" />
        <!-- ./ csrf token -->

        <!-- Form Actions -->
        <div class="form-group">
            <div class="controls">
            
            
            <!-- Tabs Content -->
				<div class="tab-content">
				
					<!-- General tab -->
					<div class="tab-pane active" id="tab-general">
					
					<!-- Name -->
						<div class="form-group">
							<label class="col-md-2 control-label" for="name">{{ $scene->scene_name }}</label>
							<element class="btn-cancel close_popup">Cancel</element>
                			<button type="submit" class="btn btn-danger">Delete</button>
						</div>
					<!-- ./ name -->
					</div>
					<!-- ./ general tab -->
            	</div>
       		</div>
        </div>
        <!-- ./ form actions -->
    </form>
@stop