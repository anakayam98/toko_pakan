<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PelangganController extends Controller
{

   

    public function index()
    {
        $pelanggans = Pelanggan::orderBy('created_at', 'desc')->get();
        return view('admin.pelanggan.index', compact('pelanggans'));
    }

    public function add()
    {
        $newKodePelanggan = 'KP' . substr(Str::uuid()->toString(), 0, 5);
        return view('admin.pelanggan.add', compact('newKodePelanggan'));
    }
    public function store(Request $request)
{
    $rules = [
        'kd_pelanggans' => 'required', 
        'nama_pelanggan' => 'required',
        'no_telepon' => 'required|unique:pelanggans|digits_between:10,12' 
    ];
    
    $messages = [
        'kd_pelanggans.required' => '*Kode Pelanggan harus diisi',
        'nama_pelanggan.required' => '*Nama harus diisi',
        'no_telepon.required' => '*Nomor Telphone harus diisi',
        'no_telepon.unique' => '*Nomor Telphone sudah digunakan',
        'no_telepon.digits_between' => '*Nomor Telphone harus terdiri dari 10 hingga 12 digit Angka',
    ];
// tes github
    $this->validate($request, $rules, $messages);

    $pelanggan = new Pelanggan();
    $pelanggan->kd_pelanggans = $request->input('kd_pelanggans'); 
    $pelanggan->nama_pelanggan = $request->input('nama_pelanggan');
    $pelanggan->no_telepon = $request->input('no_telepon');

    $pelanggan->save();
    return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil ditambahkan');
}

    public function edit(Request $request, $kd_pelanggans){

    $editData = Pelanggan::findOrFail($kd_pelanggans);
     return view('admin.pelanggan.edit', compact('editData'));

}

public function update(Request $request, $kd_pelanggans){
    $rules = [
        'nama_pelanggan' => 'required',
        'no_telepon' => 'required|digits_between:10,12|unique:pelanggans,no_telepon,'.$kd_pelanggans.',kd_pelanggans'
    ];

    $messages = [
        'nama_pelanggan.required' => '*Nama harus diisi',
        'no_telepon.required' => '*Nomor Telepon harus diisi',
        'no_telepon.digits_between' => '*Nomor Telepon harus terdiri dari 10 hingga 12 digit',
        'no_telepon.unique' => '*Nomor Telepon sudah digunakan'
    ];

    $this->validate($request, $rules, $messages);
    $pelanggan = Pelanggan::findOrFail($kd_pelanggans);
    $pelanggan->nama_pelanggan = $request->input('nama_pelanggan');
    $pelanggan->no_telepon = $request->input('no_telepon');
    $pelanggan->save();
    return redirect()->route('pelanggan.index')->with('success', 'Data pelanggan berhasil diperbarui');
}

    public function delete($kd_pelanggans){
    $pelanggan=Pelanggan::find($kd_pelanggans);
    $pelanggan->delete();
   return  redirect()->route('pelanggan.index')->with('success', 'data berhasil di hapus');

}

}
