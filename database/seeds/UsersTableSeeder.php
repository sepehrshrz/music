<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$user = new App\Models\User\User();

		$user->name = 'Mohammad';


		$user->email  = 'mo121ntazerii@gmail.com';



		$user->email_verified_at  = now();

		$user->password = '12345678';

		$user->save();
    }
}
