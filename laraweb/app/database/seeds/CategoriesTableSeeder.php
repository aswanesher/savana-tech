<?php 
/**
* 
*/
class CategoriesTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('categories')->delete();

		Categories::create(array(
     		'category' => 'Low'
		));
		Categories::create(array(
     		'category' => 'Middle'
		));
		Categories::create(array(
     		'category' => 'High'
		));
	}
}