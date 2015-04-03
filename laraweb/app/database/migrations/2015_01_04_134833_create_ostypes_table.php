<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOstypesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Membuat tabel ostypes
		Schema::create('ostypes', function($tbl)
		{
			$tbl->increments('id_ostype',4);
			$tbl->string('ostype',25);
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
		// Menghapus tabel ostypes
		Schema::dropIfExists('ostypes');
	}

}
