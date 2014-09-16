<?php

class ScenesTableSeeder extends Seeder {

	public function run()
	{
		DB::table('scenes')->delete();


		$users = array(
				array(
						'id'      => '1',
						'user_id'      => '1',
						'created_at' => new DateTime,
						'updated_at' => new DateTime,
				),
				array(
						'id'      => '2',
						'user_id'      => '2',
						'created_at' => new DateTime,
						'updated_at' => new DateTime,
				),
				
		);

		DB::table('scenes')->insert( $scenes );
	}

}
