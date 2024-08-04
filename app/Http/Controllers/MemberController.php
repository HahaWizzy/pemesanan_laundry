<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MemberController extends Controller
{
    //Tampilan
    public function index()
    {
        $member = Member::all();
        return view('member.index', compact('member'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('member.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'member_id',
            'no_identitas',
            'nama_member',
            'password',
            'alamat',
            'no_hp',
            'tgl_join',
        ]);
        Member::create($request->all());
        Alert::success('Sukses', 'Member Berhasil Ditambahkan');
        return redirect()->route('member.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        return view('member.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $member_id)
    {
        $request->validate([
            'member_id',
            'no_identitas',
            'nama_member',
            'password',
            'alamat',
            'no_hp',
            'tgl_join',
        ]);
        $member = Member::findOrFail($member_id);
        $member->update($request->all());

        Alert::success('Sukses', 'Member Berhasil Diubah');
        return redirect()->route('member.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($member_id)
    {
        $member = Member::findOrFail($member_id);
        $member->delete();
        Alert::success('Sukses', 'Member Berhasil Dihapus');
        return redirect()->route('member.index');
    }
}
