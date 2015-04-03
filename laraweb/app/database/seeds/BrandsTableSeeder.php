<?php 
/**
* 
*/
class BrandsTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('brands')->delete();

		Brands::create(array(
   			'brand' =>'Apple'
		));
		Brands::create(array(
   			'brand' =>'Samsung'
		));
		Brands::create(array(
   			'brand' =>'Nokia'
		));
		Brands::create(array(
   			'brand' =>'Lenovo'
		));
	}
}