<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserDatabase extends Migration {

 /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

    	// Creates company table
    	Schema::connection('user_mysql')->create('companys', function($table)
    	{
    		$table->engine = 'InnoDB';
    		$table->increments('id');
    		$table->string('company_name')->unique();
    		$table->string('company_address');
    		$table->string('company_contact');
    		$table->timestamps();
    	});
    	
        // Creates the users table
        Schema::connection('user_mysql')->create('users', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('company_id')->unsigned()->nullable();
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('confirmation_code');
            $table->string('remember_token')->nullable();
            $table->boolean('confirmed')->default(false);
            $table->foreign('company_id')->references('id')->on('companys');
            $table->timestamps();
        });
        
        
        
        // Creates password reminders table
        Schema::connection('user_mysql')->create('password_reminders', function($table)
        {
        	$table->engine = 'InnoDB';
        	$table->string('email');
        	$table->string('token');
        	$table->timestamp('created_at');
        });
        
        


        
        
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('password_reminders');
        Schema::drop('users');
        Schema::drop('companys');
        
        //drop foreign key
        //$table->dropForeign('users_company_id_foreign');
        
    }
}
