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
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Karyawan</a></li>
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
                                {{ Form::open(['route'=>'karyawan.add' ,'method' => 'post', 'class'=>'form-horizontal mt-3  animated bounceIn','enctype'=>'multipart/form-data']) }} 
						        {{ Form::token() }}
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label text-right">Nama Lengkap</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" id="example-text-input" name="nama_karyawan" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-tel-input" class="col-sm-2 col-form-label text-right">No.Telepon</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="number" id="example-tel-input" name="no_telepon" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-password-input" class="col-sm-2 col-form-label text-right">Alamat</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" rows="5" name="alamat" required></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-right">Tgl. Lahir</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control mdate" name="tgl_lahir" required>
                                            </div>
                                        </div> 
                                        <div class="form-group row">
                                            <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-right">Tgl. Masuk</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control mdate" name="tgl_masuk" required>
                                            </div>
                                        </div> 
                                        <div class="form-group row">
                                            <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-right">Tgl. Keluar</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control mdate" name="tgl_keluar">
                                            </div>
                                        </div>  
                                        <div class="form-group row">
                                            <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-right">Gaji</label>
                                            <div class="col-sm-10">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Rp.</span>
                                                    </div>
                                                    <input type="text" class="form-control" id="gaji"  name="gaji" required>
                                                </div>
                                            </div>
                                        </div>  
                                        <div class="form-group row">
                                            <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-right">Uang Makan Harian</label>
                                            <div class="col-sm-10">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Rp.</span>
                                                    </div>
                                                    <input type="text" class="form-control" id="uang_makan"  name="uang_makan" required>
                                                </div>
                                            </div>
                                        </div>  
                                        <div class="form-group row">
                                            <label for="example-password-input" class="col-sm-2 col-form-label text-right">Keterangan</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" rows="5" name="keterangan" required></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row-fluid" align="right">
                                            <a href="{{ route('karyawan') }}" type="button" class="btn btn-info waves-effect waves-light">Kembali</a>
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