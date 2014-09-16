<?php

class EditorCanvasController extends EditorController {

	//public $restful = true;
	
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
	
	/**
	 * EditorInformation Model
	 * @var EditorInformation
	 */
	protected $editorinformation;
	

	public function __construct(User $user, Canvas $canvas, EditorInformation $editorinformation)
	{
		parent::__construct();
		$this->user = $user;
		$this->canvas = $canvas;
		$this->editorinformation = $editorinformation;
	}
	
	public function getIndex() {
	
		$title = 'Editor Management';
		
		$id = Auth::user()->id;
		//echo $id;
		
		$u = EditorInformation::whereUser_id($id)->first();
		$editor_information_id = $u->id;
		//echo $u->email.'<br>';
		//echo $u->id.'<br>';
		
		$canvas = EditorInformation::with('user_canvas')->where('id', '=', $editor_information_id)->get();
		//echo $canvas;
		
		//$this->user->checkAuthAndRedirect('user');
	
		return View::make('editor/canvas/index', compact('canvas', 'title'));
		//return View::make('editor/canvas/index', compact('title'));
	
		/**
		 * Grab all the scene from DB
		 */
		/*
		return View::make('admin.scenes.index')
		->with('title', 'Scene Management')
		->with('scenes', Scene::all());
		*/
	}
	
	/**
	 * Show the form for creating a new canvas.
	 *
	 * @return Response
	 */
	public function getCreate()
	{
	
		// Title
		$title = 'Create A New Canvas';
	
		// Show the page
		return View::make('editor/canvas/create', compact('title'));
	}
	
	public function postCreate()
	{
		$id = Auth::user()->id; //get user ID
		
		$u = EditorInformation::whereUser_id($id)->first(); //get editor_information_id from tabel EditorInformation
		$editor_information_id = $u->id;
	
		// Declare the rules for the form validation
		$rules = array(
				'canvas_name' => 'required',
				'canvas_reference' => 'required',
				'canvas_description' => 'required'
		);
		
		
		//$template_file = Input::file('template');

	
		// Validate the inputs
		$validator = Validator::make(Input::all(), $rules);
		// Check if the form validates with success
		if ($validator->passes())
		{
			// Get the inputs, with some exceptions
			$inputs = Input::except('csrf_token');
				
			$this->canvas->editor_information_id = $editor_information_id;
			$this->canvas->canvas_name = $inputs['canvas_name'];
			$this->canvas->canvas_reference = $inputs['canvas_reference'];
			$this->canvas->canvas_description = $inputs['canvas_description'];
			$this->canvas->save();
	
			// Save permissions
			//$this->role->perms()->sync($this->permission->preparePermissionsForSave($inputs['permissions']));
	
			// Was the canvas created?
			if ($this->canvas->id)
			{
				// Redirect to the new canvas page
				return Redirect::to('editor/canvas/' . $this->canvas->id . '/edit')->with('success', Lang::get('editor/canvas/messages.create.success'));
			}
	
			// Redirect to the new canvas page
			return Redirect::to('editor/canvas/create')->with('error', Lang::get('editor/canvas/messages.create.error'));
	
			// Redirect to the canvas create page
			return Redirect::to('editor/canvas/create')->withInput()->with('error', Lang::get('editor/canvas/messages.' . $error));
		}
	
		// Form validation failed
		return Redirect::to('editor/canvas/create')->withInput()->withErrors($validator);
	}
	
	/**
	 * Show the form for editing the specified canvas.
	 *
	 * @param $canvas
	 * @return Response
	 */
	public function getEdit($canvas)
	{
		if(! empty($canvas))
		{
			//$permissions = $this->permission->preparePermissionsForDisplay($role->perms()->get());
		}
		else
		{
			// Redirect to the editor management page
			return Redirect::to('editor/canvas')->with('error', Lang::get('editor/canvas/messages.does_not_exist'));
		}
	
		// Title
		$title = Lang::get('editor/canvas/title.canvas_update');
	
		// Show the page
		return View::make('editor/canvas/edit', compact('canvas', 'title'));
	}
	
	/**
	 * Update the specified canvas in storage.
	 *
	 * @param $canvas
	 * @return Response
	 */
	public function postEdit($canvas)
	{
		// Declare the rules for the form validation
		$rules = array(
				'canvas_name' => 'required',
				'canvas_reference' => 'required',
				'canvas_description' => 'required'
		);
	
		// Validate the inputs
		$validator = Validator::make(Input::all(), $rules);
	
		// Check if the form validates with success
		if ($validator->passes())
		{
			// Update the canvas data
			$canvas->canvas_name        = Input::get('canvas_name');
			$canvas->canvas_reference        = Input::get('canvas_reference');
			$canvas->canvas_description        = Input::get('canvas_description');
	
			//$role->perms()->sync($this->permission->preparePermissionsForSave(Input::get('permissions')));
	
			// Was the canvas updated?
			if ($canvas->save())
			{
				// Redirect to the canvas page
				return Redirect::to('editor/canvas/' . $canvas->id . '/edit')->with('success', Lang::get('editor/canvas/messages.update.success'));
			}
			else
			{
				// Redirect to the canvas page
				return Redirect::to('editor/canvas/' . $canvas->id . '/edit')->with('error', Lang::get('editor/canvas/messages.update.error'));
			}
		}
	
		// Form validation failed
		return Redirect::to('editor/canvas/' . $canvas->id . '/edit')->withInput()->withErrors($validator);
	}
	
	/**
	 * Remove canvas page.
	 *
	 * @param $canvas
	 * @return Response
	 */
	public function getDelete($canvas)
	{
		// Title
		$title = Lang::get('editor/canvas/title.canvas_delete');
	
		// Show the page
		return View::make('editor/canvas/delete', compact('canvas', 'title'));
	}
	
	/**
	 * Remove the specified canvas from storage.
	 *
	 * @param $canvas
	 * @internal param $id
	 * @return Response
	 */
	public function postDelete($canvas)
	{
		// Was the canvas deleted?
		if($canvas->delete()) {
			// Redirect to the canvas management page
			return Redirect::to('editor/canvas')->with('success', Lang::get('editor/canvas/messages.delete.success'));
		}
	
		// There was a problem deleting the canvas
		return Redirect::to('editor/canvas')->with('error', Lang::get('editor/canvas/messages.delete.error'));
	}
	
	/**
	 * Show a list of all the roles formatted for Datatables.
	 *
	 * @return Datatables JSON
	 */
	
	/*
	public function getData()
	{
		$canvas = Canvas::select(array('canvas.id', 'canvas.canvas_name', 'canvas.editor_information_id as users', 'canvas.canvas_reference', 'canvas.canvas_description', 'publish_status', 'canvas.created_at'));
	
		return Datatables::of($canvas)
		// ->edit_column('created_at','{{{ Carbon::now()->diffForHumans(Carbon::createFromFormat(\'Y-m-d H\', $test)) }}}')
	
		//->edit_column('users', '{{{ DB::table(\'assigned_roles\')->where(\'role_id\', \'=\', $id)->count()  }}}')
	
	
		->add_column('actions', '<a href="{{{ URL::to(\'editor/canvas/\' . $id . \'/edit\' ) }}}" class="iframe btn btn-xs btn-default">{{{ Lang::get(\'button.edit\') }}}</a>
                                <a href="{{{ URL::to(\'editor/canvas/\' . $id . \'/delete\' ) }}}" class="iframe btn btn-xs btn-danger">{{{ Lang::get(\'button.delete\') }}}</a>
                    ')
	
	    ->remove_column('id', 'users')
	
	    ->make();
	}
	
	*/
	
}