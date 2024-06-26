<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TempatWisata;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class TempatWisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataTempatWisata = TempatWisata::with('Destinasi')->get();
        return response()->json([
            'data' => $dataTempatWisata
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
            'destinasi_id' => 'required',
            'deskripsi' => 'required',
            'images' => 'required|image',
            'lokasi' => 'required',
            'harga' => 'required',
            'fasilitas' => 'required',
            'maps' => 'required',
        ]);

        $images = $request->file('images');
        $images->storeAs('public/images', $images->hashName());


        $tempatWisata = new TempatWisata();
        $tempatWisata->nama_destinasi = $request->nama_destinasi;
        $tempatWisata->destinasi_id = $request->destinasi_id;
        $tempatWisata->deskripsi = $request->deskripsi;
        $tempatWisata->images = $images->hashName();
        $tempatWisata->lokasi = $request->lokasi;
        $tempatWisata->harga = $request->harga;
        $tempatWisata->fasilitas = $request->fasilitas;
        $tempatWisata->maps = $request->maps;

        $tempatWisata->save();

        return response()->json([
            'data' => $tempatWisata
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tempatWisata = TempatWisata::with('Destinasi')->find($id);

        return response()->json([
            'data' => $tempatWisata
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'nama_destinasi' => 'required',
            'destinasi_id' => 'required',
            'deskripsi' => 'required',
            'lokasi' => 'required',
            'harga' => 'required',
            'fasilitas' => 'required',
            'maps' => 'required',
            'images' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $tempatWisata = TempatWisata::find($id);
        $tempatWisata->nama_destinasi = $request->nama_destinasi;
        $tempatWisata->destinasi_id = $request->destinasi_id;
        $tempatWisata->deskripsi = $request->deskripsi;
        $tempatWisata->lokasi = $request->lokasi;
        $tempatWisata->harga = $request->harga;
        $tempatWisata->fasilitas = $request->fasilitas;
        $tempatWisata->maps = $request->maps;

        if ($request->hasFile('images')) {
            $image = $request->file('images');
            $fileName = $image->hashName(); // Generate unique file name
            $image->storeAs('public/images', $fileName); // Store the file
            $tempatWisata->images = $fileName; // Save file name to database
        }

        $tempatWisata->save();

        return response()->json([
            'data' => $tempatWisata
        ]);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tempatWisata = TempatWisata::find($id);
        $tempatWisata->delete();

        return response()->json([
            'message' => 'data berhasil di delete'
        ]);
    }

    public function alam()
    {
        $tempatWisata = TempatWisata::where('destinasi_id', 2)->get();
        return response()->json([
            'data' => $tempatWisata
        ]);
    }

    public function religi()
    {
        $tempatWisata = TempatWisata::where('destinasi_id', 1)->get();
        return response()->json([
            'data' => $tempatWisata
        ]);
    }

    // public function umkm()
    // {
    //     $tempatWisata = TempatWisata::where('destinasi_id', 3)->get();
    //     return response()->json([
    //         'data' => $tempatWisata
    //     ]);
    // }

    // public function toggleFavorite(Request $request)
    // {
    //     $user = Auth::user();
    //     $wisata = TempatWisata::findOrFail($request->id);
    // public function toggleFavorite(Request $request)
    // {
    //     $user = Auth::user();
    //     $wisata = TempatWisata::findOrFail($request->id);

    //     if ($user->favoritWisata()->where('wisata_id', $wisata->id)->exists()) {
    //         $user->favoritWisata()->detach($wisata->id);
    //         $isFavorit = false;
    //     } else {
    //         $user->favoritWisata()->attach($wisata->id);
    //         $isFavorit = true;
    //     }
    //     if ($user->favoritWisata()->where('wisata_id', $wisata->id)->exists()) {
    //         $user->favoritWisata()->detach($wisata->id);
    //         $isFavorit = false;
    //     } else {
    //         $user->favoritWisata()->attach($wisata->id);
    //         $isFavorit = true;
    //     }

    //     return response()->json(['is_favorit' => $isFavorit]);
    // }
    //     return response()->json(['is_favorit' => $isFavorit]);
    // }
}