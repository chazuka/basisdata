<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PesananBarang extends Model {

	protected $table = 'pesanan_barang';

	public function pesanan()
	{
		return $this->belongsTo('App\Pesanan', 'pesanan_id');
	}

}
