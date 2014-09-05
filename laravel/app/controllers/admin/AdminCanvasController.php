<?php

class AdminScenesController extends AdminController {

	/**
	 * User Model
	 * @var User
	 */
	protected $user;
	
	/**
	 * Canvas Model
	 * @var Canvas
	 */
	protected $canvas;
	
	public function __construct(User $user, Canvas $canvas)
	{
		parent::__construct();
		$this->user = $user;
		$this->canvas = $canvas;
	}
	
}	