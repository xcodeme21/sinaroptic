<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use Yajra\Datatables\Datatables;

class KaryawanController extends Controller
{
    protected $base = 'backend.masterisasi.karyawan.';

    public function __construct()
    {
        view()->share('base', $this->base);
    }
  
    public function index()
    {
        $karyawan=DB::table('karyawan')->orderBy('nama_karyawan','ASC')->get();

		$data = array(  
            'indexPage' => "Karyawan",
            'karyawan' => $karyawan
		);
        return view($this->base.'index')->with($data);
    }
    
    public function tambah()
    {
		$data = array(  
            'indexPage' => "Tambah Data Karyawan",
		);
        return view($this->base.'tambah')->with($data);
    }
  
    public function add(Request $request)
    {
        $nama_karyawan=$request->input('nama_karyawan');
        $tgl_lahir=$request->input('tgl_lahir');
        $no_telepon=$request->input('no_telepon');
        $alamat=$request->input('alamat');
        $tgl_masuk=$request->input('tgl_masuk');
        $tgl_keluar=$request->input('tgl_keluar');
        $gaji=$request->input('gaji');
        $uang_makan=$request->input('uang_makan');
        $keterangan=$request->input('keterangan');

		$insert = DB::table('karyawan')->insert(
            [
                'nama_karyawan' => $nama_karyawan,
                'tgl_lahir' => $tgl_lahir,
                'no_telepon' => $no_telepon,
                'alamat' => $alamat,
                'tgl_masuk' => $tgl_masuk,
                'tgl_keluar' => $tgl_keluar,
                'gaji' => $gaji,
                'uang_makan' => $uang_makan,
                'keterangan' => $keterangan,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        );

        return redirect()->route('karyawan')->with(['success' => 'Data karyawan ditambahkan.']); 
    }
  
    public function edit($id)
    {
        $rs=DB::table('karyawan')->where('id',$id)->first();

		$data = array(  
            'indexPage' => "Edit Data Karyawan",
            'rs' => $rs
		);
        return view($this->base.'edit')->with($data);
    }
  
    public function update(Request $request)
    {
        $id=$request->input('id');
        $nama_karyawan=$request->input('nama_karyawan');
        $tgl_lahir=$request->input('tgl_lahir');
        $no_telepon=$request->input('no_telepon');
        $alamat=$request->input('alamat');
        $tgl_masuk=$request->input('tgl_masuk');
        $tgl_keluar=$request->input('tgl_keluar');
        $gaji=$request->input('gaji');
        $uang_makan=$request->input('uang_makan');
        $keterangan=$request->input('keterangan');

		$update = DB::table('karyawan')->where('id',$id)->update(
            [
                'nama_karyawan' => $nama_karyawan,
                'tgl_lahir' => $tgl_lahir,
                'no_telepon' => $no_telepon,
                'alamat' => $alamat,
                'tgl_masuk' => $tgl_masuk,
                'tgl_keluar' => $tgl_keluar,
                'gaji' => $gaji,
                'uang_makan' => $uang_makan,
                'keterangan' => $keterangan,
                'updated_at' => date('Y-m-d H:i:s')
            ]
        );

        return redirect()->route('karyawan')->with(['success' => 'Data karyawan diupdate.']); 
    }

    public function hapus($id)
    {
        $insert = DB::table('karyawan')->where('id',$id)->delete();
            
        return redirect()->route('karyawan')->with(['success' => 'Data karyawan dihapus.']);
    }
	
}
