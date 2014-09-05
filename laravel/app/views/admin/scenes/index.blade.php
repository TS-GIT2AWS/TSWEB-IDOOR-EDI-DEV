@extends('admin.layouts.default')

{{-- Web site Title --}}
@section('title')
	{{{ $title }}} :: @parent
@stop


{{-- Content --}}
@section('content')
	<div class="page-header">
		<h3>
			{{{ $title }}}

			<div class="pull-right">
				<a href="{{{ URL::to('admin/scenes/create') }}}" class="btn btn-small btn-info iframe"><span class="glyphicon glyphicon-plus-sign"></span> Create</a>
			</div>
		</h3>
	</div>
	{{--
	<div>
		<ul>
		@foreach( $scenes as $scene)
			<li> {{ $scene->id }} {{ $scene->user_id}} {{ $scene->scene_description }}</li>
		@endforeach
		</ul>
	</div>
	--}}
	
	<div>
		<ul>
			<li> {{ $scenes->id }}</li>
			<li> {{ $scenes->user_id}}</li>
			<li> {{ $scenes->scene_description }}</li>
		</ul>
	</div>
	<div class="container">
	<div class="row">
        <div class="col-md-3 col-sm-4 col-xs-6"><img class="img-responsive" src="http://blog.arborday.org/wp-content/uploads/2013/02/NEC1-300x200.jpg" /></div>
        	
    </div>
</div>

	<table id="scenes" class="table table-striped table-hover">
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
@stop

{{-- Scripts --}}
@section('scripts')
	<script type="text/javascript">
		var oTable;
		$(document).ready(function() {
				oTable = $('#scenes').dataTable( {
				"sDom": "<'row'<'col-md-6'l><'col-md-6'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
				"sPaginationType": "bootstrap",
				"oLanguage": {
					"sLengthMenu": "_MENU_ records per page"
				},
				"bProcessing": true,
		        "bServerSide": true,
		        "sAjaxSource": "{{ URL::to('admin/scenes/data') }}",
		        "fnDrawCallback": function ( oSettings ) {
	           		$(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
	     		}
			});
		});
	</script>
@stop