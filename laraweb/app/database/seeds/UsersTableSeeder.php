<?php 
/**
* 
*/
class UsersTableSeeder extends Seeder
{
	
	public function run()
	{
		DB::table('users')->delete();

		Users::create(array(
			'username' => 'admin',
			'email' => 'admincrudsp@kiravlab.com',
			'password' => Hash::make('admin'),
			'level' => 'Administrator'
		));
		Users::create(array(
			'username' => 'user',
			'email' => 'usercrudsp@kiravlab.com',
			'password' => Hash::make('user'),
			'level' => 'User'
		));
	}

}