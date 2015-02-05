<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBarang extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('barang', function(Blueprint $table)
		{
			$table->increments('id');
			$table->unsignedInteger('kategori_id');
			$table->char('kode', 5)->unique();
			$table->string('nama');
			$table->text('deskripsi');
			$table->integer('harga', false, true);
			$table->double('berat', 10, 2);
			$table->integer('stok', false, true);
			$table->timestamps();

			$table->index('harga');
			$table->index('stok');
			$table->index('nama');
			$table->foreign('kategori_id')->references('id')->on('kategori');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('barang');
	}

}
