<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePesananDetail extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pesanan_detail', function(Blueprint $table)
		{
			$table->increments('id');
			$table->unsignedInteger('pesanan_id');
			$table->unsignedInteger('barang_id');
			$table->string('kode_barang');
			$table->string('nama_barang');
			$table->string('berat_barang');
			$table->integer('harga_barang', false, true);
			$table->string('quantity');
			$table->integer('total_harga', false, true);
			$table->double('total_berat', 10, 2);
			$table->timestamps();

			$table->foreign('barang_id')->references('id')->on('barang');
			$table->foreign('pesanan_id')->references('id')->on('pesanan');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pesanan_detail');
	}

}
