<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserDatabaseRoles extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        
        // Creates the roles table
        Schema::connection('user_mysql')->create('roles', function($table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name')->unique();
            $table->timestamps();
        });

        // Creates the assigned_roles (Many-to-Many relation) table
        Schema::connection('user_mysql')->create('assigned_roles', function($table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('role_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
        
        // Creates subscription_plan table
        Schema::connection('user_mysql')->create('subscription_plans', function($table)
        {
        	$table->engine = 'InnoDB';
        	$table->increments('id');
        	$table->integer('role_id')->unsigned()->index();
        	$table->string('subscription_name')->unique();
        	$table->string('value');
        	$table->string('period');
        	$table->dateTime('started_at');
        	$table->dateTime('ended_at');
        	$table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        	$table->timestamps();
        });
        
        // Creates users_plan table
        Schema::connection('user_mysql')->create('user_plans', function($table)
        {
        	$table->engine = 'InnoDB';
        	$table->increments('id');
        	$table->integer('plan_id')->unsigned()->index();
        	$table->integer('user_id')->unsigned()->index();
        	$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        	$table->foreign('plan_id')->references('id')->on('subscription_plans')->onDelete('cascade');
        	$table->timestamps();
        });
        
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('roles');
        Schema::drop('assigned_roles');
        Schema::drop('subscription_plans');
        Schema::drop('user_plans');
    }

}
