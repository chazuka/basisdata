<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model {

	protected $table = 'barang';

	public function kategori()
	{
		return $this->belongsTo('App\Kategori', 'kategori_id');
	}

}
