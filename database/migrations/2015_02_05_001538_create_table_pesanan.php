<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePesanan extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pesanan', function(Blueprint $table)
		{
			$table->increments('id');
			$table->unsignedInteger('pelanggan_id');

			$table->datetime('tgl');
			$table->string('status');
			$table->string('alamat_pengiriman');
			$table->unsignedInteger('kota_id');
			$table->integer('total_harga');
			$table->integer('total_transfer');
			$table->string('nama_bank');
			$table->string('no_resi');
			$table->timestamps();

			$table->index('tgl');
			$table->index('status');

			$table->foreign('pelanggan_id')->references('id')->on('pelanggan');
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
		Schema::drop('pesanan');
	}

}
