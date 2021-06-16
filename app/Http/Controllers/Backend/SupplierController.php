<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use Yajra\Datatables\Datatables;

class SupplierController extends Controller
{
    protected $base = 'backend.masterisasi.supplier.';

    public function __construct()
    {
        view()->share('base', $this->base);
    }
  
    public function index()
    {
        $supplier=DB::table('supplier')->orderBy('nama_supplier','ASC')->get();

		$data = array(  
            'indexPage' => "Supplier",
            'supplier' => $supplier
		);
        return view($this->base.'index')->with($data);
    }
  
    public function tambah()
    {
		$data = array(  
            'indexPage' => "Tambah Data Supplier",
		);
        return view($this->base.'tambah')->with($data);
    }
  
    public function add(Request $request)
    {
        $nama_supplier=$request->input('nama_supplier');
        $nama_pic=$request->input('nama_pic');
        $contact_person=$request->input('contact_person');
        $alamat=$request->input('alamat');
        $no_rek=$request->input('no_rek');
        $nama_bank=$request->input('nama_bank');
        $atas_nama=$request->input('atas_nama');

		$insert = DB::table('supplier')->insert(
            [
                'nama_supplier' => $nama_supplier,
                'nama_pic' => $nama_pic,
                'contact_person' => $contact_person,
                'alamat' => $alamat,
                'no_rek' => $no_rek,
                'nama_bank' => $nama_bank,
                'atas_nama' => $atas_nama,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        );

        return redirect()->route('supplier')->with(['success' => 'Data supplier ditambahkan.']); 
    }
  
    public function edit($id)
    {
        $rs=DB::table('supplier')->where('id',$id)->first();

		$data = array(  
            'indexPage' => "Edit Data Supplier",
            'rs' => $rs
		);
        return view($this->base.'edit')->with($data);
    }
  
    public function update(Request $request)
    {
        $id=$request->input('id');
        $nama_supplier=$request->input('nama_supplier');
        $nama_pic=$request->input('nama_pic');
        $contact_person=$request->input('contact_person');
        $alamat=$request->input('alamat');
        $no_rek=$request->input('no_rek');
        $nama_bank=$request->input('nama_bank');
        $atas_nama=$request->input('atas_nama');

		$update = DB::table('supplier')->where('id',$id)->update(
            [
                'nama_supplier' => $nama_supplier,
                'nama_pic' => $nama_pic,
                'contact_person' => $contact_person,
                'alamat' => $alamat,
                'no_rek' => $no_rek,
                'nama_bank' => $nama_bank,
                'atas_nama' => $atas_nama,
                'updated_at' => date('Y-m-d H:i:s')
            ]
        );

        return redirect()->route('supplier')->with(['success' => 'Data supplier diupdate.']); 
    }

    public function hapus($id)
    {
        $insert = DB::table('supplier')->where('id',$id)->delete();
            
        return redirect()->route('supplier')->with(['success' => 'Data supplier dihapus.']);
    }
	
}
