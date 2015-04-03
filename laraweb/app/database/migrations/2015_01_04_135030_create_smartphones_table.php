<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSmartphonesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Membuat table smartphones
		Schema::create('smartphones',function($tbl){
			$tbl->increments('id_smartphone');
			$tbl->integer('category_id')->unsigned();
			$tbl->integer('brand_id')->unsigned();
			$tbl->integer('ostype_id')->unsigned();
			$tbl->foreign('category_id')->references('id_category')->on('categories');
			$tbl->foreign('brand_id')->references('id_brand')->on('brands');
			$tbl->foreign('ostype_id')->references('id_ostype')->on('ostypes');
			$tbl->string('type',50);
			$tbl->text('description');
			$tbl->integer('price');
			$tbl->string('image',125);
			$tbl->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		// Menghapus tabel smartphones
		Schema::dropIfExists('smartphones');
	}

}
