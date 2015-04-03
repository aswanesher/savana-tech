<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Membuat tabel brands
		Schema::create('brands', function($tbl)
		{
			$tbl->increments('id_brand',4);
			$tbl->string('brand',25);
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
		// Menghapus tabel brands
		Schema::dropIfExists('brands');
	}

}
