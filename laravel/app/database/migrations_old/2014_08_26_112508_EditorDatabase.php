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
        Schema::connection('editor_mysql')->create('canvas', function($table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('canvas_name');
            $table->string('canvas_reference');
            $table->string('canvas_description',500);
            $table->boolean('publish_status')->default(false);
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on(new Expression('user.users'))->onDelete('cascade');
            $table->timestamps();
        });
        
        Schema::connection('editor_mysql')->create('estates', function($table) {
        	$table->engine = 'InnoDB';
        	$table->increments('id');
            $table->string('estate_name');
            $table->string('estate_reference');
            $table->string('estate_description',500);
            $table->integer('canvas_id')->unsigned()->index();
            $table->foreign('canvas_id')->references('id')->on('canvas')->onDelete('cascade');
        	$table->timestamps();
        });
        
       	Schema::connection('editor_mysql')->create('floor_plans', function($table) {
        	$table->engine = 'InnoDB';
        	$table->increments('id');
            $table->string('floor_plan_name');
            $table->string('floor_plan_reference');
            $table->string('floor_plan_description',500);
            $table->integer('estate_id')->unsigned()->index();
            $table->foreign('estate_id')->references('id')->on('estates')->onDelete('cascade');
        	$table->timestamps();
        });
       	

    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('canvas');
        Schema::drop('estates');
        Schema::drop('floor_plans');
    }

}
