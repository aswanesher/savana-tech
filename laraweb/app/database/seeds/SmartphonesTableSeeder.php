<?php 
/**
* 
*/
class SmartphonesTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('smartphones')->delete();

		Smartphones::create(array(
   			'category_id'=>'3',
   			'brand_id'=>'1',
   			'ostype_id'=>'2',
   			'type' => 'iPhone 5',
   			'description' => 'sala satu produk apple',
   			'price' => '6000000',
   			'image' => 'sp_default.png'
		));
	}
}