<!DOCTYPE html>
<html lang="en">
    @include("backend.include.head")
    <body>
    @include("backend.include.topbar")

        <div class="page-wrapper">
            

            <!-- Page Content-->
            <div class="page-content">

                <div class="container-fluid">
                    <!-- Page-Title -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-title-box">
                                <div class="float-right">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Masterisasi</a></li>
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Frame</a></li>
                                        <li class="breadcrumb-item active">{{ @$indexPage }}</li>
                                    </ol><!--end breadcrumb-->
                                </div><!--end /div-->
                                <h4 class="page-title">{{ @$indexPage }}</h4>
                            </div><!--end page-title-box-->
                        </div><!--end col-->
                    </div><!--end row-->
                    <!-- end page title end breadcrumb -->

                    @include("backend.include.session")

                
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row-fluid animated bounceInRight" align="right">    
                                        <a href="{{ route('frame') }}" type="button" class="btn btn-primary waves-effect waves-light">Kembali</a>
                                    </div>
                                    <hr>
                                    <div class="row animated bounceInUp">
                                        <div class="col-md-3">
                                            <div class="">
                                                <h6 class="mb-0"><b>No. Faktur :</b> {{ @$rs->no_faktur }}</h6>
                                                <h6 class="mb-0"><b>Tgl. Jatuh Tempo :</b> {{ @$rs->tgl_jatuh_tempo }}</h6>
                                            </div>
                                        </div><!--end col-->
                                        <div class="col-md-6">   
                                                <h6 class="mb-0"><b>Nama Supplier :</b> {{ @$rs->nama_supplier }}</h6>
                                                <h6 class="mb-0"><b>Nama PIC :</b> {{ @$rs->nama_pic }}</h6>
                                                <h6 class="mb-0"><b>Contact Person :</b> {{ @$rs->contact_person }}</h6>
                                                <h6 class="mb-0"><b>Alamat :</b> {{ @$rs->alamat }}</h6>
                                                <h6 class="mb-0"><b>No. Rekening :</b> {{ @$rs->no_rek }} / A.N {{ @$rs->atas_nama }} / {{ @$rs->nama_bank }}</h6>
                                        </div><!--end col-->
                                        <div class="col-md-3">
                                            <div class="text-center bg-light p-3 mb-3">
                                                <h5 class="bg-info mt-0 p-2 text-white d-sm-inline-block">{{ @$rs->status_pembelian }}</h5>
                                                <h6 class="font-13">Tanggal Pelunasan :</h6>
                                                <p class="mb-0 text-muted">@if(@$rs->tgl_pelunasan == null) - @else {{ @$rs->tgl_pelunasan }} @endif</p>
                                            </div>                                              
                                        </div> <!--end col-->                                           
                                    </div>
                                    
                                    <br>
                                    <div class="row animated bounceInUp">
                                        <div class="col-lg-12">
                                            <div class="table-responsive project-invoice">
                                                <table class="table table-bordered mb-0">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>Kode</th>
                                                            <th>Merek Frame</th>
                                                            <th>Jenis</th> 
                                                            <th>Bahan</th>
                                                            <th>Warna</th>
                                                            <th>Keterangan</th>
                                                        </tr><!--end tr-->
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>{{ @$rs->kode }}</td>
                                                            <td>{{ @$rs->merek_frame }}</td>
                                                            <td>{{ @$rs->jenis }}</td>
                                                            <td>{{ @$rs->bahan }}</td>
                                                            <td>{{ @$rs->warna }}</td>
                                                            <td>{{ @$rs->keterangan }}</td>
                                                        </tr>
                                                        <tr>                                                        
                                                            <td colspan="4" class="border-0"></td>
                                                            <td class="border-0 font-14"><b>Harga Beli</b></td>
                                                            <td class="border-0 font-14"><b>Rp. {{ number_format(@$rs->harga_beli,0,',','.') }}</b></td>
                                                        </tr>
                                                        <tr>                                                        
                                                            <td colspan="4" class="border-0"></td>
                                                            <td class="border-0 font-14"><b>Harga Jual</b></td>
                                                            <td class="border-0 font-14"><b>Rp. {{ number_format(@$rs->harga_jual,0,',','.') }}</b></td>
                                                        </tr>
                                                        <tr>                                                        
                                                            <td colspan="4" class="border-0"></td>
                                                            <td class="border-0 font-14"><b>Jumlah Barang</b></td>
                                                            <td class="border-0 font-14"><b>{{ @$rs->jumlah_barang }}</b></td>
                                                        </tr>
                                                        <tr>                                                        
                                                            <td colspan="4" class="border-0"></td>
                                                            <td class="border-0 font-14"><b>Total</b></td>
                                                            <td class="border-0 font-14"><b>Rp. {{ number_format(@$rs->total,0,',','.') }}</b></td>
                                                        </tr>
                                                    </tbody>
                                                </table><!--end table-->
                                            </div>  <!--end /div-->                                          
                                        </div>  <!--end col-->                                      
                                    </div>
                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div><!--end col-->

                    </div><!--end row-->   

                </div><!-- container -->
            </div>
            <!-- end page content -->

            @include("backend.include.footer")
        </div>
        <!-- end page-wrapper -->

        @include("backend.include.script")
       
    </body>
</html>