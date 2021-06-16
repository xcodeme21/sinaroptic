<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use Yajra\Datatables\Datatables;

class FrameController extends Controller
{
    protected $base = 'backend.barang.frame.';

    public function __construct()
    {
        view()->share('base', $this->base);
    }
  
    public function index()
    {
        $frame=DB::table('frame')
        ->leftJoin('supplier','frame.id_supplier','=','supplier.id')
        ->select('frame.*','supplier.nama_supplier','supplier.nama_pic','supplier.contact_person','supplier.alamat','supplier.no_rek','supplier.nama_bank','supplier.atas_nama')
        ->orderBy('frame.id','DESC')->get();

		$data = array(  
            'indexPage' => "Frame",
            'frame' => $frame
		);
        return view($this->base.'index')->with($data);
    }
  
    public function tambah()
    {
        $supplier=DB::table('supplier')->orderBy('nama_supplier','ASC')->get();

		$data = array(  
            'indexPage' => "Tambah Data Frame",
            'supplier' => $supplier
		);
        return view($this->base.'tambah')->with($data);
    }

    public function detail($id = 0)
    {
        $data=DB::table('supplier')->where('id',$id)->first();
        return response()->json($data);
    }
  
    public function add(Request $request)
    {
        $merek_frame=$request->input('merek_frame');
        $kode=$request->input('kode');
        $jenis=$request->input('jenis');
        $bahan=$request->input('bahan');
        $warna=$request->input('warna');
        $keterangan=$request->input('keterangan');
        $id_supplier=$request->input('id_supplier');
        $tgl_pembelian=$request->input('tgl_pembelian');
        $status_pembelian=$request->input('status_pembelian');
        $no_faktur=$request->input('no_faktur');
        $tgl_jatuh_tempo=$request->input('tgl_jatuh_tempo');
        $tgl_pelunasan=$request->input('tgl_pelunasan');
        $harga_beli=str_replace(".", "", $request->input('harga_beli'));
        $harga_jual=str_replace(".", "", $request->input('harga_jual'));
        $jumlah_barang=$request->input('jumlah_barang');
        $kode_barcode=date('Ymd')."/".$kode."/".$merek_frame;
        $total=$harga_beli*$jumlah_barang;

		$insert = DB::table('frame')->insert(
            [
                'merek_frame' => $merek_frame,
                'kode' => $kode,
                'jenis' => $jenis,
                'bahan' => $bahan,
                'warna' => $warna,
                'keterangan' => $keterangan,
                'id_supplier' => $id_supplier,
                'tgl_pembelian' => $tgl_pembelian,
                'status_pembelian' => $status_pembelian,
                'no_faktur' => $no_faktur,
                'tgl_jatuh_tempo' => $tgl_jatuh_tempo,
                'tgl_pelunasan' => $tgl_pelunasan,
                'harga_beli' => $harga_beli,
                'harga_jual' => $harga_jual,
                'jumlah_barang' => $jumlah_barang,
                'kode_barcode' => $kode_barcode,
                'total' => $total,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        );

        return redirect()->route('frame')->with(['success' => 'Data frame ditambahkan.']); 
    }
  
    public function edit($id)
    {
        $rs=DB::table('frame')->where('id',$id)->first();
        $supplier=DB::table('supplier')->orderBy('nama_supplier','ASC')->get();
        $rssup=DB::table('supplier')->where('id',$rs->id_supplier)->first();

		$data = array(  
            'indexPage' => "Edit Data Frame",
            'rs' => $rs,
            'supplier' => $supplier,
            'rssup' => $rssup
		);
        return view($this->base.'edit')->with($data);
    }
  
    public function update(Request $request)
    {
        $id=$request->input('id');
        $merek_frame=$request->input('merek_frame');
        $kode=$request->input('kode');
        $jenis=$request->input('jenis');
        $bahan=$request->input('bahan');
        $warna=$request->input('warna');
        $keterangan=$request->input('keterangan');
        $id_supplier=$request->input('id_supplier');
        $tgl_pembelian=$request->input('tgl_pembelian');
        $status_pembelian=$request->input('status_pembelian');
        $no_faktur=$request->input('no_faktur');
        $tgl_jatuh_tempo=$request->input('tgl_jatuh_tempo');
        $harga_beli=str_replace(".", "", $request->input('harga_beli'));
        $harga_jual=str_replace(".", "", $request->input('harga_jual'));
        $jumlah_barang=$request->input('jumlah_barang');
        $kode_barcode=date('Ymd')."/".$kode."/".$merek_frame;
        $total=$harga_beli*$jumlah_barang;

		$update = DB::table('frame')->where('id',$id)->update(
            [
                'merek_frame' => $merek_frame,
                'kode' => $kode,
                'jenis' => $jenis,
                'bahan' => $bahan,
                'warna' => $warna,
                'keterangan' => $keterangan,
                'id_supplier' => $id_supplier,
                'tgl_pembelian' => $tgl_pembelian,
                'status_pembelian' => $status_pembelian,
                'no_faktur' => $no_faktur,
                'tgl_jatuh_tempo' => $tgl_jatuh_tempo,
                'harga_beli' => $harga_beli,
                'harga_jual' => $harga_jual,
                'jumlah_barang' => $jumlah_barang,
                'kode_barcode' => $kode_barcode,
                'total' => $total,
                'updated_at' => date('Y-m-d H:i:s')
            ]
        );

        return redirect()->route('frame')->with(['success' => 'Data frame diupdate.']); 
    }
  
    public function view($id)
    {
        $rs=DB::table('frame')
        ->leftJoin('supplier','frame.id_supplier','=','supplier.id')
        ->select('frame.*','supplier.nama_supplier','supplier.nama_pic','supplier.contact_person','supplier.alamat','supplier.no_rek','supplier.nama_bank','supplier.atas_nama')
        ->where('frame.id',$id)->first();

		$data = array(  
            'indexPage' => "View Data Frame - ".$rs->merek_frame,
            'rs' => $rs
		);
        return view($this->base.'view')->with($data);
    }
  
    public function updatestatus(Request $request)
    {
        $id=$request->input('id');
        $tgl_pelunasan=$request->input('tgl_pelunasan');

		$update = DB::table('frame')->where('id',$id)->update(
            [
                'tgl_pelunasan' => $tgl_pelunasan,
                'updated_at' => date('Y-m-d H:i:s')
            ]
        );

        return redirect()->route('frame')->with(['success' => 'Pelunasan frame berhasil diupdate.']); 
    }
	
}
