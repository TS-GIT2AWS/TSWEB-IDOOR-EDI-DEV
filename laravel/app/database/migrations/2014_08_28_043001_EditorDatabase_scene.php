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
        	$table->integer('canvas_id')->unsigned()->index()->nullable();
        	$table->foreign('canvas_id')->references('id')->on('canvas')->onDelete('cascade');
        	$table->integer('floor_plan_id')->unsigned()->index()->nullable();
        	$table->foreign('floor_plan_id')->references('id')->on('floor_plans')->onDelete('cascade');
        	$table->timestamps();
        });

        
      /*  
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
        	
       */
        
        Schema::connection('editor_mysql')->create('assets', function($table) {
        	$table->engine = 'InnoDB';
        	$table->increments('id');
        	$table->string('asset_name');
        	$table->string('asset_description',500);
        	$table->string('asset_url');
        	$table->integer('floor_plan_id')->unsigned()->index();
        	$table->foreign('floor_plan_id')->references('id')->on('floor_plans')->onDelete('cascade'); 
        	$table->timestamps();
        });
        
        Schema::connection('editor_mysql')->create('assets_media', function($table) {
        	$table->engine = 'InnoDB';
        	$table->increments('id');
        	$table->integer('asset_id')->unsigned()->index();
        	$table->foreign('asset_id')->references('id')->on('assets')->onDelete('cascade');
        	
        	$table->integer('media_id')->unsigned()->index();
        	$table->foreign('media_id')->references('id')->on('medias')->onDelete('cascade');
        	$table->timestamps();
        });
        
        Schema::connection('editor_mysql')->create('floor_plans_media', function($table) {
        	$table->engine = 'InnoDB';
        	$table->increments('id');
        	$table->integer('floor_plan_id')->unsigned()->index();
        	$table->foreign('floor_plan_id')->references('id')->on('floor_plans')->onDelete('cascade');
        		 
        	$table->integer('media_id')->unsigned()->index();
        	$table->foreign('media_id')->references('id')->on('medias')->onDelete('cascade');
        	$table->timestamps();
        });
        
        Schema::connection('editor_mysql')->create('waypoints_media', function($table) {
        	$table->engine = 'InnoDB';
        	$table->increments('id');
        	$table->integer('waypoint_id')->unsigned()->index();
        	$table->foreign('waypoint_id')->references('id')->on('waypoints')->onDelete('cascade');
        		 
        	$table->integer('media_id')->unsigned()->index();
        	$table->foreign('media_id')->references('id')->on('medias')->onDelete('cascade');
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
    	Schema::drop('assets');
    	Schema::drop('assets_media');
    	Schema::drop('floor_plans_media');
    	Schema::drop('waypoints_media');
    	
    }

}
