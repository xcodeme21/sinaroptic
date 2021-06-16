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
                                    {{ Form::open(['route'=>'frame.add' ,'method' => 'post', 'class'=>'form-horizontal mt-3  animated bounceIn','enctype'=>'multipart/form-data']) }} 
                                    {{ Form::token() }}
                                        <div class="form-group row">
                                            <label for="example-tel-input" class="col-sm-2 col-form-label text-right">Kode</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" id="example-tel-input" name="kode" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-tel-input" class="col-sm-2 col-form-label text-right">Merek Frame</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" id="example-tel-input" name="merek_frame" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-tel-input" class="col-sm-2 col-form-label text-right">Jenis</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="jenis" required>
                                                    <option value="">-- Pilih Jenis --</option>
                                                    <option value="Full Frame">Full Frame</option>
                                                    <option value="Semi Full Frame">Semi Full Frame</option>
                                                    <option value="Frameless">Frameless</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-tel-input" class="col-sm-2 col-form-label text-right">Bahan</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="bahan" required>
                                                    <option value="">-- Pilih Bahan --</option>
                                                    <option value="Plastik">Plastik</option>
                                                    <option value="Metal">Metal</option>
                                                    <option value="Kombinasi">Kombinasi</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-tel-input" class="col-sm-2 col-form-label text-right">Warna</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" id="example-tel-input" name="warna" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-tel-input" class="col-sm-2 col-form-label text-right">Keterangan</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" name="keterangan" required></textarea>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label text-right">Supplier</label>
                                            <div class="col-sm-10">
                                                <select class="select2 form-control mb-3 custom-select select2-hidden-accessible" name="id_supplier" id="id_supplier" style="width: 100%; height:36px;background-color: #1c233f;" tabindex="-1" aria-hidden="true" required>
                                                    <option value="">-- Pilih Supplier --</option>
                                                    @foreach(@$supplier as $sup)
                                                    <option value="{{ @$sup->id }}">{{ @$sup->nama_supplier }}</option>
                                                    @endforeach
                                                </select>
                                                <hr>
                                                <div class="input-group">
                                                    <input class="form-control" type="text" id="nama_pic" placeholder="PIC" readonly>
                                                    <input class="form-control" type="text" id="contact_person" placeholder="Contact Person" readonly>
                                                </div>
                                                <hr>
                                                <div class="input-group">
                                                    <textarea class="form-control" id="alamat" placeholder="Alamat" readonly></textarea>
                                                </div>

                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group row">
                                            <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-right">Tgl. Pembelian</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control mdate" name="tgl_pembelian" required>
                                            </div>
                                        </div> 
                                        <div class="form-group row">
                                            <label for="example-tel-input" class="col-sm-2 col-form-label text-right">Status Pembelian</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="status_pembelian" required>
                                                    <option value="Tunai">Tunai</option>
                                                    <option value="Tempo">Tempo</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-tel-input" class="col-sm-2 col-form-label text-right">No. Faktur</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="text" id="example-tel-input" name="no_faktur" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-right">Tgl. Jatuh Tempo</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control mdate" name="tgl_jatuh_tempo" required>
                                            </div>
                                        </div> 
                                        <div class="form-group row">
                                            <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-right">Tgl. Pelunasan</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control mdate" name="tgl_pelunasan">
                                            </div>
                                        </div> 
                                        <hr>
                                        <div class="form-group row">
                                            <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-right">Harga Beli</label>
                                            <div class="col-sm-10">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Rp.</span>
                                                    </div>
                                                    <input type="text" class="form-control" id="gaji"  name="harga_beli" required>
                                                </div>
                                            </div>
                                        </div>  
                                        <div class="form-group row">
                                            <label for="example-datetime-local-input" class="col-sm-2 col-form-label text-right">Harga Jual</label>
                                            <div class="col-sm-10">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Rp.</span>
                                                    </div>
                                                    <input type="text" class="form-control" id="uang_makan"  name="harga_jual" required>
                                                </div>
                                            </div>
                                        </div>  
                                        <div class="form-group row">
                                            <label for="example-tel-input" class="col-sm-2 col-form-label text-right">Jumlah Barang</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" type="number" id="example-tel-input" name="jumlah_barang" required>
                                            </div>
                                        </div>
                                        <div class="form-group row-fluid" align="right">
                                            <a href="{{ route('frame') }}" type="button" class="btn btn-info waves-effect waves-light">Kembali</a>
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

        <script>
            $('#id_supplier').change(function(){
                var id = $(this).val();
                var url = '{{ route("frame.detail", ":id") }}';
                url = url.replace(':id', id);

                $.ajax({
                    url: url,
                    type: 'get',
                    dataType: 'json',
                    success: function(response){
                        if(response != null){
                            $('#nama_pic').val(response.nama_pic);
                            $('#contact_person').val(response.contact_person);
                            $('#alamat').val(response.alamat);
                        }
                    },
                    error: function (error) {
                        if(error != null){
                            $('#nama_pic').val('');
                            $('#contact_person').val('');
                            $('#alamat').val('');
                        }
                    }
                });
            });
        </script>
       
    </body>
</html>