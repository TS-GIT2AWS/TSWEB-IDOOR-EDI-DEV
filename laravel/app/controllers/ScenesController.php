<?php

class ScenesController extends BaseController {
	
	public $restful = true;
	
	public function get_index() {
		
		return View::make('admin.scene.index')
			->with('title', 'Scene')
			->with('scene', Scenes::all());
		
	}
}
