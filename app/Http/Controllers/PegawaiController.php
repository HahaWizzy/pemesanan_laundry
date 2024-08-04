<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PegawaiController extends Controller
{
    //tampilan
    public function index() {
        $pegawai = Pegawai::all();
        return view('pegawai.index', compact('pegawai'));
    }

    //untuk menambahkan
    public function create (){
        return view('pegawai.create');
    }

    public function store(Request $request) {
        $request->validate([
            'id_pegawai',
            'nama_pegawai',
            'password',
            'alamat',
            'no_hp',
            'jabatan',
        ]);
        Pegawai::create($request->all());

        // Alert Notification
        Alert::success('Sukses', 'Pegawai Berhasil Ditambahkan');
        return redirect()->route('pegawai.index');
    }

    //untuk mengedit

    public function edit (Pegawai $pegawai ){
        return view('pegawai.edit', compact('pegawai'));
    }

    public function update(Request $request, $id_pegawai) {
        $request->validate([
            'id_pegawai',
            'nama_pegawai',
            'password',
            'alamat',
            'no_hp',
            'jabatan',
        ]);
        
        $pegawai = Pegawai::findOrFail($id_pegawai);
        $pegawai->update($request->all());
        
        Alert::success('Sukses', 'Pegawai Berhasil Diupdate');
        return redirect()->route('pegawai.index');
    }
    
    // untuk menghapus
    public function destroy($id_pegawai) {
        $pegawai = Pegawai::findOrFail($id_pegawai);
        $pegawai->delete();
        
        Alert::success('Sukses', 'Pegawai Berhasil Dihapus');
        return redirect()->route('pegawai.index');
    }

}