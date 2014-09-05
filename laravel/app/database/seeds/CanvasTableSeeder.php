<?php

class CanvasTableSeeder extends Seeder {

	public function run()
	{
		DB::table('canvas')->delete();
		
		
		//NO working
		//$role_id_admin = Role::where('name', '=', 'admin')->first()->id;


		$canvas = array(
				array(
						'user_id' 				=> 1,
						'canvas_name'      		=> 'scene 1',
						'canvas_reference'      => 's1',
						'canvas_description'    => 'this is s1',
						'created_at' 			=> new DateTime,
						'updated_at' 			=> new DateTime,
						
				),
				array(
						'user_id' 				=> 2,
						'canvas_name'      		=> 'scene 2',
						'canvas_reference'      => 's2',
						'canvas_description'    => 'this is s2',
						'created_at' 			=> new DateTime,
						'updated_at' 			=> new DateTime,
				),
				
		);

		DB::table('canvas')->insert( $canvas );
	}

}
