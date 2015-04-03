<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Membuat tabel 'categories' .
		Schema::create('categories', function($tbl)
		{
			// Field-field nya
			$tbl->increments('id_category',4);
			$tbl->string('category',15);
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
		// Menghapus tabel categories
		Schema::dropIfExists('categories');
	}

}
