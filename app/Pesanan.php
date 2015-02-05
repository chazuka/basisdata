<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model {

	protected $table = 'pesanan';

	public function barang()
	{
		return $this->hasMany('App\PesananBarang', 'pesanan_id');
	}

	public function pelanggan()
	{
		return $this->belongsTo('App\Pelanggan', 'pelanggan_id');
	}

	public function kota()
	{
		return $this->belongsTo('App\Kota', 'kota_id');
	}

}
