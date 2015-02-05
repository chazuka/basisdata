<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Kota extends Model {

	protected $table = 'kota';

	protected $fillable = ['nama', 'ongkos_kirim'];

	public function pesanan()
	{
		return $this->hasMany('App\Pesanan', 'kota_id');
	}

	public function pelanggan()
	{
		return $this->hasMany('App\Pelanggan', 'kota_id');
	}
}
