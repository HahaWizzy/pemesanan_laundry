<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Pembelian_Barang;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PembelianBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembelian_barang = Pembelian_Barang::with('pegawai')->get();
        return view('pembelianBarang.index', compact('pembelian_barang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pegawai = Pegawai::all();
        return view('pembelianBarang.create', compact('pegawai'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required|integer',
            'id_pegawai' => 'required|exists:pegawai,id_pegawai',
            'tanggal' => 'required|date',
            'jumlah' => 'required|integer|min:1',
        ]);

        Pembelian_Barang::create($request->all());

        Alert::success('Sukses', 'Pembelian Barang Berhasil Ditambahkan');
        return redirect()->route('pembelian_barang.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pembelian_Barang $pembelian_Barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pembelian_Barang $pembelian_Barang)
    {
        $pegawai = Pegawai::all();
        return view('pembelianBarang.edit', compact('pembelian_Barang', 'pegawai'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pembelian_Barang $pembelian_barang)
    {
        $request->validate([
            'kode_barang' => 'required|integer',
            'id_pegawai' => 'required|exists:pegawai,id_pegawai',
            'tanggal' => 'required|date',
            'jumlah' => 'required|integer|min:1',
        ]);

        $pembelian_barang->update($request->all());

        Alert::success('Sukses', 'Pembelian Barang Berhasil Diubah');
        return redirect()->route('pembelian_barang.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($pembelian_Barang)
    {
        $pembelian_Barang = Pembelian_Barang::findOrFail($pembelian_Barang);
        $pembelian_Barang->delete();

        Alert::success('Sukses', 'Pembelian Barang Berhasil Dihapus');
        return redirect()->route('pembelian_barang.index');
    }
}
