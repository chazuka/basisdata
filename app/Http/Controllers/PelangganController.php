<?php namespace App\Http\Controllers;

use App\Http\Requests\PelangganRequest;
use App\Kota;
use App\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller {

	public function index()
	{
		return view('pelanggan.index', ['pelanggan' => Pelanggan::paginate(10)]);
	}

	public function create()
	{
		$pelanggan = new Pelanggan();
		$action = route('pelanggan.store');

		$kota = [];
		Kota::all(['id', 'nama'])->map(function ($item) use (&$kota)
		{
			$kota[$item->id] = $item->nama;
		});

		return view('pelanggan.create')->with(compact('pelanggan', 'action', 'kota'));
	}

	public function store(PelangganRequest $request)
	{
		$pelanggan = new Pelanggan($request->only('kota_id', 'email', 'nama', 'alamat', 'no_telp', 'no_hp'));
		$pelanggan->save();

		return redirect(route('pelanggan.index'))->with('success', 'Pelanggan baru ditambahkan');
	}

	public function show($id, Request $request)
	{
		if (strtolower($request->query('_method')) == 'delete') {
			return $this->destroy($id);
		}
	}

	public function edit($id)
	{
		$pelanggan = Pelanggan::find($id);
		if (!$pelanggan) {
			return redirect(route('pelanggan.index'))->with('error', "Pelanggan #{$id} tidak ditemukan");
		}

		$action = route('pelanggan.update', ['id' => $id, '_method' => 'PUT']);
		$kota = [];
		Kota::all(['id', 'nama'])->map(function ($item) use (&$kota)
		{
			$kota[$item->id] = $item->nama;
		});
		return view('pelanggan.edit')->with(compact('pelanggan', 'action', 'kota'));
	}

	public function update($id, PelangganRequest $request)
	{
		$pelanggan = Pelanggan::find($id);
		if ( ! $pelanggan)
		{
			return redirect(route('pelanggan.index'))->with('error', "Pelanggan #{$id} tidak ditemukan");
		}

		$pelanggan->fill($request->only('kota_id', 'email', 'nama', 'alamat', 'no_telp', 'no_hp'));
		$pelanggan->save();

		return redirect(route('pelanggan.index'))->with('success', 'Pelanggan terupdate');
	}

	public function destroy($id)
	{
		$pelanggan = Pelanggan::find($id);
		if ( ! $pelanggan)
		{
			return redirect(route('pelanggan.index'))->with('error', "Pelanggan #{$id} tidak ditemukan");
		}

		$pelanggan->delete();

		return redirect(route('pelanggan.index'))->with('success', 'Pelanggan terhapus');
	}

}
