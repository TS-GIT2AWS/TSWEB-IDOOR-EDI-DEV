<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Query\Expression;

class EditorDatabaseScene extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
    	
        Schema::connection('editor_mysql')->create('waypoints', function($table) {
        	$table->engine = 'InnoDB';
        	$table->increments('id');
        	$table->string('waypoint_name');
        	$table->string('waypoint_reference');
        	$table->string('waypoint_description',500);
        	
        	// check with daniel (link to three tables to check scene type)
        	$table->integer('scene_id')->unsigned()->index(); //equal to canvas,estate,floor_plan ID
        	$table->timestamps();
        });
        
        Schema::connection('editor_mysql')->create('media', function($table) {
        	$table->engine = 'InnoDB';
        	$table->increments('id');
        	$table->string('media_name');
        	$table->string('media_url');
        	$table->integer('media_type_id');
        	$table->timestamps();
        });
        
        Schema::connection('editor_mysql')->create('scene_media', function($table) {
        	$table->engine = 'InnoDB';
        	$table->increments('id');

        	// check with daniel (link to three tables to check scene type)
        	$table->integer('scene_id')->unsigned()->index(); //equal to canvas,estate,floor_plan ID
        	//$table->string('scene_type'); //equal to canvas,estate,floor_plan Type

        	$table->integer('media_id')->unsigned()->index();
        	$table->foreign('media_id')->references('id')->on('media')->onDelete('cascade');
        	$table->timestamps();
        	});
        
        Schema::connection('editor_mysql')->create('assets', function($table) {
        	$table->engine = 'InnoDB';
        	$table->increments('id');
        	$table->string('asset_name');
        	$table->string('asset_description',500);
        	$table->integer('media_id')->unsigned()->index();
        	$table->foreign('media_id')->references('id')->on('media')->onDelete('cascade');

        	//check with daniel
        	//$table->integer('floor_plan_id')->unsigned()->index();
        	//$table->foreign('floor_plan_id')->references('id')->on('floor_plans')->onDelete('cascade');	 
        	$table->timestamps();
        });
       	
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
    	//
    	Schema::drop('waypoints');
    	Schema::drop('media');
    	Schema::drop('scene_media');
    	Schema::drop('assets');
    	
    }

}
