<div class="ui-container ">
    <div class="placement title-ui">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">paperDoor Editor</a>
    </div>
    <div class="placement login-ui">
        <!--<form class="navbar-form navbar-right" role="form">
            <div class="form-group">
                <input type="text" placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
                <input type="password" placeholder="Password" class="form-control">
            </div>-->

        	<!-- 
            <button type="submit" class="btn btn-success form-control" onSubmit="{{{ URL::to('user/logout') }}}">Sign out</button>
             -->
            @if (Auth::check())
			
    			{{-- The user is logged in... --}}
    			<a type="submit" href="{{{ URL::to('user/logout') }}}" class="btn btn-success form-control">Sign out</a>
			@else
			
			<form class="navbar-form navbar-right" method="POST" action="{{ URL::to('user/login') }}" accept-charset="UTF-8">
    		<input type="hidden" name="_token" value="{{ csrf_token() }}">
   			<fieldset>
        		<div class="form-group">
                	<input class="form-control" tabindex="1" placeholder="{{ Lang::get('confide::confide.username_e_mail') }}" type="text" name="email" id="email" value="{{ Input::old('email') }}">
        		</div>
        		
        		<div class="form-group">
               		<input class="form-control" tabindex="2" placeholder="{{ Lang::get('confide::confide.password') }}" type="password" name="password" id="password">
        		</div>

       

        @if ( Session::get('error') )
        <div class="alert alert-danger">{{ Session::get('error') }}</div>
        @endif

        @if ( Session::get('notice') )
        <div class="alert">{{ Session::get('notice') }}</div>
        @endif

        <div class="form-group">
                <button tabindex="3" type="submit" class="btn btn-primary">{{ Lang::get('confide::confide.login.submit') }}</button>
        </div>
    </fieldset>
</form>
            
            
            
            @endif
			
            
            
        </form>
    </div><!--/.navbar-collapse -->
</div>