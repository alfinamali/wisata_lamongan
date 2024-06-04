<?php

namespace App\Http\Controllers;

use App\Models\umkm;
use Illuminate\Http\Request;

class UmkmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataUmkm = umkm::all();
        return response()->json([
            'data' => $dataUmkm
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama_destinasi' => 'required',
            'deskripsi' => 'required',
            'images' => 'required|image',
            'kontak' => 'required',
            'maps' => 'required',
        ]);

        $images = $request->file('images');
        $images->storeAs('public/images', $images->hashName());


        $tempatUmkm = new umkm();
        $tempatUmkm->nama_destinasi = $request->nama_destinasi;
        $tempatUmkm->deskripsi = $request->deskripsi;
        $tempatUmkm->images = $images->hashName();
        $tempatUmkm->kontak = $request->kontak;
        $tempatUmkm->maps = $request->maps;

        $tempatUmkm->save();

        return response()->json([
            'data' => $tempatUmkm
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\umkm  $umkm
     * @return \Illuminate\Http\Response
     */
    public function show(umkm $umkm)
    {
        $tempatUmkm = umkm::all();

        return response()->json([
            'data' => $tempatUmkm
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\umkm  $umkm
     * @return \Illuminate\Http\Response
     */
    public function edit(umkm $umkm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\umkm  $umkm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'nama_destinasi' => 'required',
            'deskripsi' => 'required',
            'images' => 'required|image',
            'kontak' => 'required',
            'maps' => 'required',
        ]);

        $images = $request->file('images');
        $images->storeAs('public/images', $images->hashName());


        $tempatUmkm = umkm::find($id);
        $tempatUmkm->nama_destinasi = $request->nama_destinasi;
        $tempatUmkm->images = $images->hashName();
        $tempatUmkm->kontak = $request->kontak;
        $tempatUmkm->maps = $request->maps;

        $tempatUmkm->save();

        return response()->json([
            'data' => $tempatUmkm
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\umkm  $umkm
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tempatUmkm = umkm::find($id);
        $tempatUmkm->delete();

        return response()->json([
            'message' => 'data berhasil di delete'
        ]);
    }
}
