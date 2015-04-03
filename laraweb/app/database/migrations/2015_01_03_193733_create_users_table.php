<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// Membuat tabel user buat authentikasi
		Schema::create('users', function($tbl){
			$tbl->increments('id',4);
			$tbl->string('username',25)->unique();
			$tbl->string('email',125)->unique();
			$tbl->string('password',125);
			$tbl->enum('level', array('Administrator','User'));
			$tbl->rememberToken();	
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
		// Menghapus tabel users
		Schema::dropIfExists('users');
	}

}
