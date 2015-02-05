<?php namespace App\Http\Controllers;

use App\Http\Requests\KotaRequest;
use App\Kota;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class KotaController extends Controller {

    public function index()
    {
        $paginated = Kota::paginate(10);

        return view('kota.index', ['kota' => $paginated]);
    }

    public function create()
    {
        $kota = new Kota();
        $action = route('kota.store');

        return view('kota.create')->with(compact('kota', 'action'));
    }

    public function store(KotaRequest $request)
    {

        $kota = new Kota($request->only('nama', 'ongkos_kirim'));
        $kota->save();

        return redirect(route('kota.index'))->with('success', 'Kota baru ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id, Request $request)
    {
        if (strtolower($request->query('_method')) == 'delete') {
            return $this->destroy($id);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $kota = Kota::find($id);
        if ( ! $kota)
        {
            return redirect(route('kota.index'))->with('error', "Kota #{$id} tidak ditemukan");
        }

        $action = route('kota.update', ['id' => $id, '_method' => 'PUT']);

        return view('kota.edit')->with(compact('kota', 'action'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id, KotaRequest $request)
    {
        $kota = Kota::find($id);
        if ( ! $kota)
        {
            return redirect(route('kota.index'))->with('error', "Kota #{$id} tidak ditemukan");
        }

        $kota->fill($request->only('nama', 'ongkos_kirim'));
        $kota->save();

        return redirect(route('kota.index'))->with('success', "Kota #{$id} diupdate");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $kota = Kota::find($id);
        if ( ! $kota)
        {
            return redirect(route('kota.index'))->with('error', "Kota #{$id} tidak ditemukan");
        }

        $kota->delete();

        return redirect(route('kota.index'))->with('success', "Kota #{$id} dihapus");
    }

}
