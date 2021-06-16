<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use Yajra\Datatables\Datatables;

class CustomerController extends Controller
{
    protected $base = 'backend.masterisasi.customer.';

    public function __construct()
    {
        view()->share('base', $this->base);
    }
  
    public function index()
    {
        $customer=DB::table('customer')->orderBy('nama_customer','ASC')->get();

		$data = array(  
            'indexPage' => "Customer",
            'customer' => $customer
		);
        return view($this->base.'index')->with($data);
    }
    
    public function tambah()
    {
		$data = array(  
            'indexPage' => "Tambah Data Customer",
		);
        return view($this->base.'tambah')->with($data);
    }
  
    public function add(Request $request)
    {
        $pre_nama_customer=$request->input('pre_nama_customer');
        $nama_customer=$request->input('nama_customer');
        $tgl_lahir=$request->input('tgl_lahir');
        $no_telepon=$request->input('no_telepon');
        $alamat=$request->input('alamat');

		$insert = DB::table('customer')->insert(
            [
                'pre_nama_customer' => $pre_nama_customer,
                'nama_customer' => $nama_customer,
                'tgl_lahir' => $tgl_lahir,
                'no_telepon' => $no_telepon,
                'alamat' => $alamat,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        );

        return redirect()->route('customer')->with(['success' => 'Data customer ditambahkan.']); 
    }
  
    public function edit($id)
    {
        $rs=DB::table('customer')->where('id',$id)->first();

		$data = array(  
            'indexPage' => "Edit Data Customer",
            'rs' => $rs
		);
        return view($this->base.'edit')->with($data);
    }
  
    public function update(Request $request)
    {
        $id=$request->input('id');
        $pre_nama_customer=$request->input('pre_nama_customer');
        $nama_customer=$request->input('nama_customer');
        $tgl_lahir=$request->input('tgl_lahir');
        $no_telepon=$request->input('no_telepon');
        $alamat=$request->input('alamat');

		$update = DB::table('customer')->where('id',$id)->update(
            [
                'pre_nama_customer' => $pre_nama_customer,
                'nama_customer' => $nama_customer,
                'tgl_lahir' => $tgl_lahir,
                'no_telepon' => $no_telepon,
                'alamat' => $alamat,
                'updated_at' => date('Y-m-d H:i:s')
            ]
        );

        return redirect()->route('customer')->with(['success' => 'Data customer diupdate.']); 
    }

    public function hapus($id)
    {
        $insert = DB::table('customer')->where('id',$id)->delete();
            
        return redirect()->route('customer')->with(['success' => 'Data customer dihapus.']);
    }
	
}
