@extends('editor.layouts.default')

{{-- Web site Title --}}
@section('title')
	{{{ $title }}} :: @parent
@stop

{{-- Content --}}
@section('content')
	<div class="page-header">
		<h3>{{{ $title }}}
			<div class="pull-right">
				<a href="{{{ URL::to('editor/canvas/create') }}}" class="btn btn-small btn-info iframe"><span class="glyphicon glyphicon-plus-sign"></span> Create</a>
			</div>
		</h3>
	</div>
	

	
<div class="count">
	@foreach ($canvas as $can)
		<div><p>User id: {{ $can->username }}</p></div>
		
    <div class="row">
    	@foreach ($can->user_canvas as $c)
    	
			<div class="col-sm-4" style="background: white; height: auto; width: 390px; margin-bottom:10px;">
		 		<div><p> {{ $c->canvas_name }} </p></div>
				<div><img class="img-responsive" alt="Responsive image" src="http://www.metalcuttingtools.eu/sites/default/files/default_images/thumbnail-default.jpg" /></div>
				
				<div class="navbar navbar-default">
					<div><p>Reference {{ $c->canvas_reference }}</p></div>
					<div><p>
					<input type="text" name="canvas_description" value="{{{ $c->canvas_description }}}" disabled="disabled" /></p></div>
					<div><p align="center"><a href="{{{ URL::to('editor/canvas/' . $c->id . '/edit' ) }}}" class="iframe btn btn-xs btn-default">{{{ Lang::get('button.edit') }}}</a>
					 <a href="{{{ URL::to('editor/canvas/' . $c->id . '/delete' ) }}}" class="iframe btn btn-xs btn-danger">{{{ Lang::get('button.delete') }}}</a></p>
					</div>	
				</div>
    		</div>
    		
		@endforeach
		<br />
	</div>
	@endforeach
</div>
<br/><br/><br/><br/>


<!-- 
	<table id="canvas" class="table table-striped table-hover">
		<thead>
			<tr>
				<th class="col-md-2">{{{ Lang::get('admin/scenes/table.scene_name') }}}</th>
				<th class="col-md-2">{{{ Lang::get('admin/scenes/table.user') }}}</th>
				<th class="col-md-2">{{{ Lang::get('admin/scenes/table.scene_ref') }}}</th>
				<th class="col-md-2">{{{ Lang::get('admin/scenes/table.scene_desc') }}}</th>
				<th class="col-md-2">{{{ Lang::get('admin/scenes/table.created_at') }}}</th>
				<th class="col-md-2">{{{ Lang::get('table.actions') }}}</th>	
			</tr>
		</thead>
		<tbody>
		</tbody>
	</table>
-->
	
	
	

	
@stop

{{-- Scripts --}}
@section('scripts')
	<script type="text/javascript">
		var oTable;
		$(document).ready(function() {
				//oTable = $('#canvas').dataTable( {
				//"sDom": "<'row'<'col-md-6'l><'col-md-6'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
				//"sPaginationType": "bootstrap",
				//"oLanguage": {
					//"sLengthMenu": "_MENU_ records per page"
				//},
				//"bProcessing": true,
		       // "bServerSide": true,
		       //	"sAjaxSource": "{{ URL::to('editor/canvas/data') }}",
		       // "fnDrawCallback": function ( oSettings ) {
	           	$(".iframe").colorbox({iframe:true, width:"60%", height:"60%"});
	           	
	     		//}
			//});
		});

	</script>
@stop