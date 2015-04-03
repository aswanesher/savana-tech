<?php 
/**
* 
*/
class OstypesTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('ostypes')->delete();

		Ostypes::create(array(
			'ostype' => 'Android'
		));
		Ostypes::create(array(
			'ostype' => 'iOS'
		));
		Ostypes::create(array(
			'ostype' => 'Symbian'
		));
		Ostypes::create(array(
			'ostype' => 'Windows Phone'
		));

	}

}