<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\TComplaint;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PengaduanController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Category::all();

        return view('create-pengaduan', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'kategori_id'   => 'required',
            'name'          => 'required',
            'phone'         => 'required',
            'deskripsi'     => 'required',
        ]);

        $pengaduan = TComplaint::create([
            'kode_booking'  => Str::random(6),
            'kategori_id'   => $request->kategori_id,
            'name'          => $request->name,
            'phone'         => $request->phone,
            'deskripsi'     => $request->deskripsi
        ]);

        return redirect()->route('public-home')->with('success', 'Pengaduan Berhasil dibuat, Silahkan cek status pengaduan menggunakan kode pengaduan berikut: '.$pengaduan->kode_booking);
    }
}
