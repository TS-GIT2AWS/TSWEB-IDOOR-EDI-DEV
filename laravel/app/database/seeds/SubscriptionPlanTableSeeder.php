<?php

class SubscriptionPlanTableSeeder extends Seeder {

    public function run()
    {
        DB::table('subscription_plans')->delete();


        $subscription_plans = array(
            array(
                'username'      => 'admin',
                'email'      => 'admin@example.org',
                'password'   => Hash::make('admin'),
                'confirmed'   => 1,
                'confirmation_code' => md5(microtime().Config::get('app.key')),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'username'      => 'user',
                'email'      => 'user@example.org',
                'password'   => Hash::make('user'),
                'confirmed'   => 1,
                'confirmation_code' => md5(microtime().Config::get('app.key')),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            )
        );

        DB::table('subscription_plans')->insert( $subscription_plans );
    }

}
