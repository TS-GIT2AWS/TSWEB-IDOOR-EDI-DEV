<?php

class AdminScenesController extends AdminController {

	/**
	 * User Model
	 * @var User
	 */
	protected $user;
	
	/**
	 * Scene Model
	 * @var Scene
	 */
	protected $scene;
	
	/**
	 * Resource Model
	 * @var Resource
	 */
	protected $resource;
	
	
	
	public function __construct(User $user, Scene $scene, Resource $resource)
	{
		parent::__construct();
		$this->user = $user;
		$this->scene = $scene;
		$this->resource = $resource;
	}
	
	public function getIndex() {
		
		
		$title = 'Scene Management';
		
		$id = Auth::user()->id;

		$scenes = Scene::where('user_id', '=', $id)->first();
		
		return View::make('admin/scenes/index', compact('scenes', 'title'));
		
		/*
		 * 
		 * Grab all the scene from DB
		 * 
		return View::make('admin.scenes.index')
		->with('title', 'Scene Management')
		->with('scenes', Scene::all());
		
		*/
	}
	
	/**
	 * Show the form for creating a new scene.
	 *
	 * @return Response
	 */
	public function getCreate()
	{
	
		// Title
		$title = 'Create A New Scene';
	
		// Show the page
		return View::make('admin/scenes/create', compact('title'));
	}
	
	public function postCreate()
	{
		
		$id = Auth::user()->id;
	
		// Declare the rules for the form validation
		$rules = array(
				'scene_name' => 'required',
				'scene_reference' => 'required',
				'scene_description' => 'required'
		);
	
		// Validate the inputs
		$validator = Validator::make(Input::all(), $rules);
		// Check if the form validates with success
		if ($validator->passes())
		{
			// Get the inputs, with some exceptions
			$inputs = Input::except('csrf_token');
			
			$this->scene->user_id = $id;
			$this->scene->scene_name = $inputs['scene_name'];
			$this->scene->scene_reference = $inputs['scene_reference'];
			$this->scene->scene_description = $inputs['scene_description'];
			$this->scene->save();
	
			// Save permissions
			//$this->role->perms()->sync($this->permission->preparePermissionsForSave($inputs['permissions']));
	
			// Was the scene created?
			if ($this->scene->id)
			{
				// Redirect to the new scene page
				return Redirect::to('admin/scenes/' . $this->scene->id . '/edit')->with('success', Lang::get('admin/scenes/messages.create.success'));
			}
	
			// Redirect to the new scene page
			return Redirect::to('admin/scenes/create')->with('error', Lang::get('admin/scenes/messages.create.error'));
	
			// Redirect to the scene create page
			return Redirect::to('admin/scenes/create')->withInput()->with('error', Lang::get('admin/scenes/messages.' . $error));
		}
	
		// Form validation failed
		return Redirect::to('admin/scenes/create')->withInput()->withErrors($validator);
	}
	
	/**
	 * Display the specified resource.
	 *
	 * @param $user
	 * @return Response
	 */
	public function getShow($scene)
	{
		// redirect to the frontend
		
		
	}
	
	/**
     * Show the form for editing the specified scene.
     *
     * @param $scene
     * @return Response
     */
    public function getEdit($scene)
    {
        if(! empty($scene))
        {
            //$permissions = $this->permission->preparePermissionsForDisplay($role->perms()->get());
        }
        else
        {
            // Redirect to the scene management page
            return Redirect::to('admin/scenes')->with('error', Lang::get('admin/scenes/messages.does_not_exist'));
        }

        // Title
        $title = Lang::get('admin/scenes/title.scene_update');

        // Show the page
        return View::make('admin/scenes/edit', compact('scene', 'title'));
    }
	
	/**
     * Update the specified scene in storage.
     *
     * @param $scene
     * @return Response
     */
    public function postEdit($scene)
    {
        // Declare the rules for the form validation
        $rules = array(
            'scene_name' => 'required',
			'scene_reference' => 'required',
			'scene_description' => 'required'
        );

        // Validate the inputs
        $validator = Validator::make(Input::all(), $rules);

        // Check if the form validates with success
        if ($validator->passes())
        {
            // Update the scene data
            $scene->scene_name        = Input::get('scene_name');
            $scene->scene_reference        = Input::get('scene_reference');
            $scene->scene_description        = Input::get('scene_description');
            
            //$role->perms()->sync($this->permission->preparePermissionsForSave(Input::get('permissions')));

            // Was the role updated?
            if ($scene->save())
            {
                // Redirect to the role page
                return Redirect::to('admin/scenes/' . $scene->id . '/edit')->with('success', Lang::get('admin/roles/messages.update.success'));
            }
            else
            {
                // Redirect to the role page
                return Redirect::to('admin/scenes/' . $scene->id . '/edit')->with('error', Lang::get('admin/roles/messages.update.error'));
            }
        }

        // Form validation failed
        return Redirect::to('admin/scenes/' . $scene->id . '/edit')->withInput()->withErrors($validator);
    }
	
	/**
     * Remove scene page.
     *
     * @param $scene
     * @return Response
     */
    public function getDelete($scene)
    {
        // Title
        $title = Lang::get('admin/scenes/title.role_delete');

        // Show the page
        return View::make('admin/scenes/delete', compact('scene', 'title'));
    }

    /**
     * Remove the specified scene from storage.
     *
     * @param $scene
     * @internal param $id
     * @return Response
     */
    public function postDelete($scene)
    {
            // Was the scene deleted?
            if($scene->delete()) {
                // Redirect to the scene management page
                return Redirect::to('admin/scenes')->with('success', Lang::get('admin/scenes/messages.delete.success'));
            }

            // There was a problem deleting the scene
            return Redirect::to('admin/scenes')->with('error', Lang::get('admin/scenes/messages.delete.error'));
    }
	
	/**
	 * Show a list of all the roles formatted for Datatables.
	 *
	 * @return Datatables JSON
	 */
	public function getData()
	{
		$scenes = Scene::select(array('scenes.id', 'scenes.scene_name', 'scenes.user_id as users', 'scenes.scene_reference', 'scenes.scene_description', 'scenes.created_at'));
	
		return Datatables::of($scenes)
		// ->edit_column('created_at','{{{ Carbon::now()->diffForHumans(Carbon::createFromFormat(\'Y-m-d H\', $test)) }}}')
		
		//->edit_column('users', '{{{ DB::table(\'assigned_roles\')->where(\'role_id\', \'=\', $id)->count()  }}}')
	
	
		->add_column('actions', '<a href="{{{ URL::to(\'admin/scenes/\' . $id . \'/edit\' ) }}}" class="iframe btn btn-xs btn-default">{{{ Lang::get(\'button.edit\') }}}</a>
                                <a href="{{{ URL::to(\'admin/scenes/\' . $id . \'/delete\' ) }}}" class="iframe btn btn-xs btn-danger">{{{ Lang::get(\'button.delete\') }}}</a>
                    ')
	
	    ->remove_column('id')
	
	    ->make();
	}
	
	/**
	 * Upload file function
	 *
	 * @return Response
	 */
	public function postUpload($scene)
	{
		$file = Input::file('upl');
		$scene->scene_id       = Input::get('scene_id'); //get scene ID
		$dest = public_path().'/uploads/'.$scene->scene_id;
		
		if(!is_dir($dest)){
			mkdir($dest, 0777);
		}
		
		$size = Input::file('upl')->getSize();
		$filename = $file->getClientOriginalName(); //file name 
		$extension =$file->getClientOriginalExtension(); //file extension
		//$path = Input::file('upl')->getRealPath();
		$maxsize 	 = 20971520;// 20MB //1048576; // 1MB
		
		if($size >= $maxsize)
		{
            // The size of the file is excess the maximun file limit
            return Redirect::to('admin/scenes/' . $scene->id . '/upload')->with('modal_message_error', Lang::get('admin/scenes/messages.error_exceedSize'));
            exit;
		}else {
		
		$image_ext = explode(',', Lang::get('upload.WE_ALLOWED_IMG_EXT'));
		$video_ext = explode(',', Lang::get('upload.WE_ALLOWED_VIDEO_EXT'));
		$doc_ext = explode(',', Lang::get('upload.WE_ALLOWED_DOC_EXT'));
		$xml_ext = explode(',', Lang::get('upload.WE_ALLOWED_XML_EXT'));
		
		$allowed_ext = array_merge($image_ext, $video_ext, $doc_ext, $xml_ext);
		
		//dd($image_ext); //output array
		//echo '<pre>'.print_r($allowed_ext,1).'</pre>';
		
		if(!in_array(strtolower($extension), $allowed_ext)){
			return Redirect::back()->with('modal_message_error', Lang::get('admin/scenes/messages.error_extension'));
			exit;
		}else{
			
			/* -- get file type ID  -- */
			//$file_info = $this->get_file_info( $file );
			
			$file_info = Utility::get_file_info( $file );
			$type_id   = $file_info['file_type_id'];
			$type	   = $file_info['file_type'];
			
			/* -- ./get file type ID  -- */
			
			/* -- call outside function -- */
			//$number =2;

			//echo Utility::doMessage($number);  
			//echo Utility::url_to_directory();
			
			/* -- ./call outside function -- */
			
			$url = Request::url(); //http://localhost:8888/laravel/public/admin/scenes/1/upload
			$host = Request::server('HTTP_HOST'); //localhost:8888
			$server = Request::server('SERVER_NAME'); //localhost
			$dirname = Request::server('DOCUMENT_ROOT'); //C:/xampp/htdocs
			$server_port = Request::server('SERVER_PORT'); // 8888 
					
			
			// replace \\ to /
			$abspath = str_replace('\\', '/', $dest);
		
			// replace C:/xampp/htdocs to 'nothing' in order to get path(/laravel/public/uploads/1) 
			$path    = str_ireplace($dirname, '', $abspath);
			
			$file_url= $host.$path.'/'.$filename; //correct File URL
			
			//from --localhost:8888C:\xampp\htdocs\laravel\public/uploads/1/
			
			//to  -- (action path/URL)
			// 
			// http://localhost:8888/laravel/public/uploads/1/Desert.jpg (file URL)
			

		
				$this->resource->location_id = $scene->scene_id;
				$this->resource->location_resource_name = $filename;
				$this->resource->location_resource_url = $file_url;
				$this->resource->location_resource_type = $type_id;
				$this->resource->location_resource_index = 1;
				
				$this->resource->save();
		
				$upload_success = Input::file('upl')->move($dest, $filename);
			
		 	if ($this->resource->id)
            {
                // Redirect to the role page
                
            	echo 'success 1';
                //return Redirect::to('admin/scenes/' . $scene->id . '/edit')->with('success', Lang::get('admin/roles/messages.update.success'));
            }
            else
            {
                // Redirect to the role page
            	echo 'error 1';
                //return Redirect::to('admin/scenes/' . $scene->id . '/edit')->with('error', Lang::get('admin/roles/messages.update.error'));
            }

			
		
		
				if( $upload_success ) {
				   return Response::json('success', 200);
				} else {
				   return Response::json('error', 400);
				}
		
			}
		}
		
	}
	
	
	
	
	
}