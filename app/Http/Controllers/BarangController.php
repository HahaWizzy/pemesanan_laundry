<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pembelian_Barang;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang = Barang::all();
        return view('barang.index', compact('barang')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pembelian_barang = Pembelian_Barang::all();
        return view('barang.create', compact('pembelian_barang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:150|unique:barang,nama_barang',
            'kode_barang' => 'required|exists:pembelian_barang,id_pembelian',
            'harga' => 'required|integer|min:0',
        ]);

        Barang::create($request->all());

        Alert::success('Sukses', 'Barang Berhasil Ditambahkan');
        return redirect()->route('barang.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        $pembelian_barang = Pembelian_Barang::all();
        return view('barang.edit', compact('barang', 'pembelian_barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:150|unique:barang,nama_barang,' . $barang->nama_barang . ',nama_barang',
            'kode_barang' => 'required|exists:pembelian_barang,id_pembelian',
            'harga' => 'required|integer|min:0',
        ]);

        $barang->update($request->all());

        Alert::success('Sukses', 'Barang Berhasil Diubah');
        return redirect()->route('barang.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($barang)
    {
        $barang = Barang::findOrFail($barang);
        $barang->delete();

        Alert::success('Sukses', 'Barang Berhasil Dihapus');
        return redirect()->route('barang.index');
    }
}
