<?php

class EditorDashboardController extends EditorController {

	/**
	 * Editor dashboard
	 *
	 */
	public function getIndex()
	{
        return View::make('editor/dashboard');
	}

}