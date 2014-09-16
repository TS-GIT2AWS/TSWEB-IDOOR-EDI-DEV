@extends('editor.layouts.modal')

{{-- Content --}}
@section('content')
    <!-- Tabs -->
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
        </ul>
    <!-- ./ tabs -->

    {{-- Delete canvas Form --}}
    <form id="deleteForm" class="form-horizontal" method="post" action="@if (isset($canvas)){{ URL::to('editor/canvas/' . $canvas->id . '/delete') }}@endif" autocomplete="off">
        <!-- CSRF Token -->
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <input type="hidden" name="id" value="{{ $canvas->id }}" />
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
							<div><label class="col-md-12" for="name">Are you sure you want to delete {{ $canvas->canvas_name }} ?</label></div>
							<br /><br /><div class="col-md-12"><element class="btn-cancel close_popup">Cancel</element>
                			<button type="submit" class="btn btn-danger">Delete</button></div>
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