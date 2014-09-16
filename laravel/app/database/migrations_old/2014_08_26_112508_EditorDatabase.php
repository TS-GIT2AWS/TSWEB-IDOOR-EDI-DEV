<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Query\Expression;

class EditorDatabase extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
    	
    	Schema::connection('editor_mysql')->create('editor_informations', function($table) {
    		$table->engine = 'InnoDB';
    		$table->increments('id');
    		$table->integer('user_id')->unsigned()->index();
           	$table->foreign('user_id')->references('id')->on(new Expression('user.users'))->onDelete('cascade');
    		$table->string('username');
           	$table->foreign('username')->references('username')->on(new Expression('user.users'));
    		$table->string('password');
           	$table->foreign('password')->references('password')->on(new Expression('user.users'));
    		$table->string('email');
           	$table->foreign('email')->references('email')->on(new Expression('user.users'));
    		$table->timestamps('updated_at');
    	});
    	
        Schema::connection('editor_mysql')->create('canvas', function($table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('canvas_name');
            $table->string('canvas_reference');
            $table->string('canvas_description',500);
            $table->boolean('publish_status')->default(false);
            $table->integer('editor_information_id')->unsigned()->index();
            $table->foreign('editor_information_id')->references('id')->on('editor_informations')->onDelete('cascade');
            //$table->integer('user_id')->unsigned()->index();
           	//$table->foreign('user_id')->references('id')->on(new Expression('user.users'))->onDelete('cascade'); //foreign key with user database(users table)
            $table->timestamps();
        });
        
        Schema::connection('editor_mysql')->create('estates', function($table) {
        	$table->engine = 'InnoDB';
        	$table->increments('id');
            $table->string('estate_name');
            //$table->string('estate_reference');
            //$table->string('estate_description',500);
            $table->integer('canvas_id')->unsigned()->index();
            $table->foreign('canvas_id')->references('id')->on('canvas')->onDelete('cascade');
        	$table->timestamps();
        });
        
        Schema::connection('editor_mysql')->create('areas', function($table) {
        	$table->engine = 'InnoDB';
        	$table->increments('id');
        	$table->string('area_name');
        	
        	$table->integer('country_id')->unsigned()->index();
        	$table->foreign('country_id')->references('id')->on(new Expression('user.countries')); 
        	
        	$table->integer('area_id')->unsigned()->index()->nullable();
        	$table->foreign('area_id')->references('id')->on('areas');
        	$table->timestamps();
        });
        
        Schema::connection('editor_mysql')->create('projects', function($table) {
        	$table->engine = 'InnoDB';
        	$table->increments('id');
        	$table->string('project_name');
        	$table->integer('area_id')->unsigned()->index();
        	$table->foreign('area_id')->references('id')->on('areas');
        	$table->timestamps();
        });
        
        
        Schema::connection('editor_mysql')->create('media_types', function($table) {
        	$table->engine = 'InnoDB';
        	$table->increments('id');
        	$table->string('media_types_name');
        	$table->timestamps();
        });
        
        Schema::connection('editor_mysql')->create('medias', function($table) {
        	$table->engine = 'InnoDB';
        	$table->increments('id');
        	$table->string('media_name');
        	$table->string('media_url');
        	
        	$table->integer('media_type_id')->unsigned()->index();
        	$table->foreign('media_type_id')->references('id')->on('media_types');
        	
        	$table->integer('canvas_id')->unsigned()->index()->nullable();
        	$table->foreign('canvas_id')->references('id')->on('canvas')->onDelete('cascade');
        	$table->timestamps();
        });
        
       	Schema::connection('editor_mysql')->create('floor_plans', function($table) {
        	$table->engine = 'InnoDB';
        	$table->increments('id');
            $table->string('floor_plan_name');
            $table->string('floor_plan_reference');
            $table->string('floor_plan_description',500);
            $table->boolean('templated')->default(false);
            $table->integer('canvas_id')->unsigned()->index()->nullable();
            $table->foreign('canvas_id')->references('id')->on('canvas')->onDelete('cascade');
            
            $table->integer('floor_plan_id')->unsigned()->index()->nullable();
            $table->foreign('floor_plan_id')->references('id')->on('floor_plans');
            
            $table->integer('estate_id')->unsigned()->index()->nullable();
            $table->foreign('estate_id')->references('id')->on('estates');
            
            $table->integer('media_id')->unsigned()->index()->nullable();
            $table->foreign('media_id')->references('id')->on('medias');
            
            $table->integer('projects_id')->unsigned()->index()->nullable();
            $table->foreign('projects_id')->references('id')->on('projects');
        	$table->timestamps();
        });
       	

    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
    	
    	Schema::drop('editor_informations');
    	Schema::drop('canvas');
        Schema::drop('estates');
        Schema::drop('areas');
        Schema::drop('projects');
        Schema::drop('media_types');
        Schema::drop('medias');
        Schema::drop('floor_plans');
    }

}
