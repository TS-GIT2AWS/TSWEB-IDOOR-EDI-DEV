@extends('site.layouts.default')

{{-- Web site Title --}}
@section('title')
{{{ Lang::get('user/user.settings') }}} ::
@parent
@stop

{{-- New Laravel 4 Feature in use --}}
@section('styles')
@parent
body {
	background: #f2f2f2;
}
@stop

{{-- Content --}}
@section('content')


<div class="row">
  <div class="col-sm-3">
    <div class="sidebar-nav">
      <div class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <span class="visible-xs navbar-brand">Sidebar menu</span>
        </div>
        <div class="navbar-collapse collapse sidebar-navbar-collapse">
        
		  <!-- Tabs -->
          <ul class="nav navbar-nav nav-tabs">
            <li class="active"><a href="#tab-profile" data-toggle="tab"> Profile Account </a></li>
            <li><a href="#"></a></li>
            @if (Auth::user()->hasRole('editor'))      
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Editor Management <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#tab-editor" data-toggle="tab">Another action </a></li>
                
                <li class="divider"></li>
                <li class="dropdown-header">Nav header </li>
                <li><a href="#" data-toggle="tab">Separated link </a></li>
              </ul>
            </li>
            @endif
             @if (Auth::user()->hasRole('editor_merchant'))      
            <li><a href="tab-merchant" data-toggle="tab">Merchant Management </a></li>
            @endif
            <li><a href="#tab7" data-toggle="tab">Reviews <span class="badge">1,118</span></a></li>
          </ul><!-- ./ tabs -->
        </div><!--/.nav-collapse -->
      </div>
    </div>
</div>


 
 
<!-- Tabs Content -->
<div class="tab-content">
	
<!-- Profile tab -->
<div class="tab-pane active" id="tab-profile">
<div class="col-sm-9">
<div class="navbar navbar-default" role="navigation">
<h3 align="center">Edit your settings</h3>
<form class="form-horizontal" method="post" action="{{ URL::to('user/' . $user->id . '/edit') }}"  autocomplete="off">
    <!-- CSRF Token -->
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    <!-- ./ csrf token -->

        <!-- username -->
        <div class="form-group {{{ $errors->has('username') ? 'error' : '' }}}">
            <label class="col-md-2 control-label" for="username">Username</label>
            <div class="col-md-10">
                <input class="form-control" type="text" name="username" id="username" value="{{{ Input::old('username', $user->username) }}}" />
                {{ $errors->first('username', '<span class="help-inline">:message</span>') }}
            </div>
        </div>
        <!-- ./ username -->

        <!-- Email -->
        <div class="form-group {{{ $errors->has('email') ? 'error' : '' }}}">
            <label class="col-md-2 control-label" for="email">Email</label>
            <div class="col-md-10">
                <input class="form-control" type="text" name="email" id="email" value="{{{ Input::old('email', $user->email) }}}" />
                {{ $errors->first('email', '<span class="help-inline">:message</span>') }}
            </div>
        </div>
        <!-- ./ email -->

        <!-- Password -->
        <div class="form-group {{{ $errors->has('password') ? 'error' : '' }}}">
            <label class="col-md-2 control-label" for="password">Password</label>
            <div class="col-md-10">
                <input class="form-control" type="password" name="password" id="password" value="" />
                {{ $errors->first('password', '<span class="help-inline">:message</span>') }}
            </div>
        </div>
        <!-- ./ password -->

        <!-- Password Confirm -->
        <div class="form-group {{{ $errors->has('password_confirmation') ? 'error' : '' }}}">
            <label class="col-md-2 control-label" for="password_confirmation">Password Confirm</label>
            <div class="col-md-10">
                <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" value="" />
                {{ $errors->first('password_confirmation', '<span class="help-inline">:message</span>') }}
            </div>
        </div>
        <!-- ./ password confirm -->


    <!-- Form Actions -->
    <div class="form-group">
        <div class="col-md-offset-2 col-md-10">
            <button type="submit" class="btn btn-success">Update</button>
        </div>
    </div>
    <!-- ./ form actions -->
</form>
</div>
</div>
</div>

<!-- ./ profile tab -->

<!-- Editor Management tab -->
	        <div class="tab-pane" id="tab-editor">
	        <div class="col-sm-9">
	        <div class="navbar navbar-default" role="navigation">
                <div class="form-group">
                  	  <h3 align="center">Editor Management</h3>
                  	  

                 		TESTING
                  	  
                </div>
	        </div>
	        </div>
			</div>
<!-- ./ Editor Management tab -->

<!-- Merchant Management tab -->
	        <div class="tab-pane" id="tab-merchant">
	        <div class="col-sm-9">
	        <div class="navbar navbar-default" role="navigation">
                <div class="form-group">
                      <h3 align="center">Merchant Management</h3>
                </div>
	        </div>
	        </div>
			</div>
<!-- ./ Merchant Management tab -->

</div>
</div>







@stop
