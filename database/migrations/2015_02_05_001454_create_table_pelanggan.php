<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePelanggan extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pelanggan', function(Blueprint $table)
		{
			$table->increments('id');
			$table->unsignedInteger('kota_id');
			$table->string('email')->unique();
			$table->string('nama', 100);
			$table->string('alamat');
			$table->string('no_telp', 20)->nullable();
			$table->string('no_hp', 20)->nullable();
			$table->timestamps();

			$table->foreign('kota_id')->references('id')->on('kota');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pelanggan');
	}

}
