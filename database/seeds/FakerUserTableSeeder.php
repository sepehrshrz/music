<?php

use Illuminate\Database\Seeder;

class FakerUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=new \App\Models\User\User();
        $user->name='sepehr';
        $user->email='sepehr@yahoo.com';
		$user->email_verified_at  = now();
		$user->password=bcrypt('12345678');
		$user->save();

    }
}
