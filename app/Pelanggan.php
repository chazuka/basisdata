<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model {

	protected $table = 'pelanggan';

	protected $fillable = ['kota_id', 'email', 'nama', 'alamat', 'no_telp', 'no_hp'];

	public function kota()
	{
		return $this->belongsTo('App\Kota', 'kota_id');
	}

	public function pesanan()
	{
		return $this->belongsTo('App\Pesanan', 'pelanggan_id');
	}
}
