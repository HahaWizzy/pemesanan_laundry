<?php

namespace App\Http\Controllers;

use App\Models\Data_Laundry_Non_Member;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DataLaundryNonMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_laundry_non_member = Data_Laundry_Non_Member::with(['pegawai'])->get();
        return view('nonmember.index', compact('data_laundry_non_member'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pegawai = Pegawai::all();
        return view('nonmember.create', compact('pegawai'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'no_transaksi',
        'tgl_transaksi',
        'nama_customer',
        'alamat',
        'no_telp',
        'id_pegawai',
        'keterangan',
        'status_laundry',
        'status_pembayaran',
        'lokasi',
    ]);
    Data_Laundry_Non_Member::create($request->all());

    Alert::success('Sukses', 'Member Berhasil Ditambahkan');
    return redirect()->route('nonmember.index');
}

    /**
     * Display the specified resource.
     */
    public function show(Data_Laundry_Non_Member $data_Laundry_Non_Member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Data_Laundry_Non_Member $data_laundry_non_member)
    {
        $pegawai = Pegawai::all();
        return view('nonmember.edit', compact('data_laundry_non_member', 'pegawai'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Data_Laundry_Non_Member $data_laundry_non_member)
    {
        $request->validate([
            'no_transaksi',
            'tgl_transaksi',
            'nama_customer',
            'alamat',
            'no_telp',
            'id_pegawai',
            'keterangan',
            'status_laundry',
            'status_pembayaran',
            'lokasi',
        ]);
        // $data_laundry_non_member = Data_Laundry_Non_Member::findOrFail($no_transaksi);
        $data_laundry_non_member->update($request->all());

        Alert::success('Sukses', 'Member Berhasil Diubah');
        return redirect()->route('nonmember.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($no_transaksi)
    {
        $data_laundry_non_member = Data_Laundry_Non_Member::findOrFail($no_transaksi);
        $data_laundry_non_member->delete();

        Alert::success('Sukses', 'Member Berhasil Dihapus');
        return redirect()->route('nonmember.index');
    }
}
