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
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Supplier</a></li>
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
                                    {{ Form::open(['route'=>'supplier.update' ,'method' => 'post', 'class'=>'form-horizontal mt-3  animated bounceIn','enctype'=>'multipart/form-data']) }} 
                                    {{ Form::token() }}
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label text-right">Nama Lengkap</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" id="example-text-input" name="nama_supplier"  value="{{ @$rs->nama_supplier }}" required>
                                                <input type="hidden" name="id" value="{{ @$rs->id }}" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-tel-input" class="col-sm-2 col-form-label text-right">Nama PIC</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" id="example-tel-input" name="nama_pic"  value="{{ @$rs->nama_pic }}" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-tel-input" class="col-sm-2 col-form-label text-right">Contact Person</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" id="example-tel-input" name="contact_person"  value="{{ @$rs->contact_person }}" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-password-input" class="col-sm-2 col-form-label text-right">Alamat</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" rows="5" name="alamat"  required>{{ @$rs->alamat }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-right">No. Rekening</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="no_rek"  value="{{ @$rs->no_rek }}" required>
                                            </div>
                                        </div> 
                                        <div class="form-group row">
                                            <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-right">Atas Nama</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="atas_nama"  value="{{ @$rs->atas_nama }}" required>
                                            </div>
                                        </div> 
                                        <div class="form-group row">
                                            <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-right">Nama Bank</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="nama_bank"  value="{{ @$rs->nama_bank }}" required>
                                            </div>
                                        </div>
                                        <div class="form-group row-fluid" align="right">
                                            <a href="{{ route('supplier') }}" type="button" class="btn btn-info waves-effect waves-light">Kembali</a>
                                            <button type="submit" class="btn btn-success waves-effect waves-light">Simpan</button>
                                        </div>
                                    {{ Form::close() }}
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