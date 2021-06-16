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
                                        <a href="{{ route('frame.tambah') }}" type="button" class="btn btn-primary waves-effect waves-light">+ Tambah</a>
                                    </div>
                                    <hr>
                                    <div class="table-responsive animated bounceInUp">
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Merek Frame</th>
                                                <th>Tgl. Pembelian</th>
                                                <th>Nama Supplier</th>
                                                <th>No. Faktur</th>
                                                <th>Status Pembelian</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                            <?php $no=0; ?>
                                            @foreach(@$frame as $rs)
                                            <?php $no++; ?>
                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td>
                                                    <p class="d-inline-block align-middle mb-0">
                                                        <a href="" class="d-inline-block align-middle mb-0 product-name">{{ @$rs->merek_frame }}</a> 
                                                        <br>
                                                        <span class="text-muted font-13"><span class="badge badge-soft-primary">{{ @$rs->kode }}</span> <span class="badge badge-soft-danger">{{ @$rs->jenis }}</span> <span class="badge badge-soft-info">{{ @$rs->bahan }}</span> <span class="badge badge-soft-success">{{ @$rs->warna }}</span></span> 
                                                    </p>
                                                </td>
                                                <td>{{ @$rs->tgl_pembelian }}</td>
                                                <td>{{ @$rs->nama_supplier }}</td>
                                                <td>
                                                    <p class="d-inline-block align-middle mb-0">
                                                        <a href="" class="d-inline-block align-middle mb-0 product-name">{{ @$rs->no_faktur }}</a> 
                                                        <br>
                                                        <span class="text-muted font-13"><span class="badge badge-soft-danger">{{ @$rs->tgl_jatuh_tempo }}</span> @if(@$rs->tgl_pelunasan != null) / <span class="text-muted font-13"><span class="badge badge-soft-success">LUNAS</span> @endif</span> 
                                                    </p>
                                                </td>
                                                <td>@if(@$rs->status_pembelian == "Tunai") <button class="btn btn-success btn-xs btn-block">Tunai</button> @else <button class="btn btn-info btn-xs btn-block">Tempo</button> @endif</td>
                                                <td>
                                                    <a href="{{ route('frame.view',@$rs->id) }}" class="btn btn-outline-primary waves-effect btn-xs btn-block" style="margin-bottom:5px;"><i class="far fa-eye text-info mr-1"></i> View</a><br />
                                                    
                                                    <a href="{{ route('frame.edit',@$rs->id) }}" class="btn btn-outline-secondary waves-effect waves-light btn-xs btn-block" style="margin-bottom:5px;"><i class="far fa-edit text-info mr-1"></i> Edit</a><br />

                                                    <button data-toggle="modal" data-target=".bd-example-modal-lg{{ @$rs->id }}" class="btn btn-outline-danger waves-effect btn-xs btn-block" style="margin-bottom:5px;"><i class="far fa-eye text-info mr-1"></i> Update Status</button>

                                                    <div class="modal fade bd-example-modal-lg{{ @$rs->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                {{ Form::open(['route'=>'frame.updatestatus' ,'method' => 'post', 'class'=>'form-horizontal mt-3  animated bounceIn','enctype'=>'multipart/form-data']) }} 
                                                                {{ Form::token() }}
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title mt-0" id="myModalLabel">Update Status Pembelian - {{ @$rs->merek_frame }}</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group row">
                                                                        <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-right">Tgl. Pelunasan</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" class="form-control mdate" name="tgl_pelunasan" value="{{ @$rs->tgl_pelunasan }}" required>
                                                                            <input type="hidden" name="id" value="{{ @$rs->id }}">
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-primary waves-effect">Update</button>
                                                                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Tutup</button>
                                                                </div>
                                                                {{ Form::close() }}
                                                            </div><!-- /.modal-content -->
                                                        </div><!-- /.modal-dialog -->
                                                    </div><!-- /.modal -->
                                                </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>    
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