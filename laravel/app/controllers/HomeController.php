<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	

	/**
     * Initializer.
     *
        * @return \HomeController
     */
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * Returns the Home page.
     *
     * @return View
     */
    public function getIndex()
    {
    	// Show the page
    	
    	return View::make('site/home/index');
    
    }
	
}
