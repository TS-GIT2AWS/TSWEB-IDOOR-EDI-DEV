<?php

class Utility {
    public static function doMessage($number) {
        $message = 'Hello';
        
        $number =$number +5;
        //return $message;
        
        return $number;
    }
    
    public static function get_file_info($file){
    
    	$file_ext =$file->getClientOriginalExtension();
    
    	//$file_ext   = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    	//$file_name  = pathinfo($file, PATHINFO_FILENAME);
    	//$file_dir	= pathinfo($file, PATHINFO_DIRNAME);
    		
    	$image_ext 	= explode(',', Lang::get('upload.WE_ALLOWED_IMG_EXT'));
    	$video_ext 	= explode(',', Lang::get('upload.WE_ALLOWED_VIDEO_EXT'));
    	$doc_ext 	= explode(',', Lang::get('upload.WE_ALLOWED_DOC_EXT'));
    
    	if (in_array($file_ext,$image_ext)){
    		$type 		= Lang::get('upload.WE_RESOURCE_IMAGE');
    		$type_id	= 1;
    	}else if (in_array($file_ext, $video_ext)){
    		$type 		= Lang::get('upload.WE_RESOURCE_VIDEO');
    		$type_id	= 2;
    	}else if(in_array($file_ext, $doc_ext)){
    		$type 		= Lang::get('upload.WE_RESOURCE_DOC');
    		$type_id	= 3;
    	}else{
    		$type 		= Lang::get('upload.WE_RESOURCE_XML');
    		$type_id	= 4;
    	}
    		
    	//return array('file_ext' => $file_ext, 'file_name' => $file_name, 'file_dir' => $file_dir, 'file_type' => $type, 'file_type_id' => $type_id);
    	return array('file_ext' => $file_ext, 'file_type' => $type, 'file_type_id' => $type_id);
    }
    
    public static function url_to_directory()
    {
    	 
    	/*
    	 // get the directory name
    	$dirname = dirname($url);
    
    	// get the filename
    	$filename = basename($url);
    
    	if ($_SERVER['SERVER_PORT'] == '443'){
    
    	// remove document server name from dirname
    	$http = $_SERVER['HTTPS'] ?' https://' : 'http://';
    	$replace = $http.$_SERVER['SERVER_NAME'];
    	 
    	}else {
    	 
    	$http = $_SERVER['https'] ?' https://' : 'http://';
    	$replace = $http.$_SERVER['SERVER_NAME'];
    	}
    
    	$dirname = str_ireplace(trim($http.$_SERVER['SERVER_NAME']), "", $dirname);
    	//$dirname = str_replace($http.$_SERVER['SERVER_NAME'], "", $dirname);
    
    	// now add root
    	$dirname =  $_SERVER['DOCUMENT_ROOT'] . $dirname;
    
    	$a =  \util_url::abspath_to_url($dirname.'/'.$filename);
    
    	return $dirname.'/'.$filename;
    	 
    	*/
    	 
    	return 'connect to url_to_directory';
    }
}