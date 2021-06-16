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
                                        <a href="{{ route('customer.tambah') }}" type="button" class="btn btn-primary waves-effect waves-light">+ Tambah</a>
                                    </div>
                                    <hr>
                                    <div class="table-responsive animated bounceInUp">
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama</th>
                                                <th>No. Telepon</th>
                                                <th>Alamat</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                            <?php $no=0; ?>
                                            <?php
                                            function hitung_umur($tanggal_lahir){
                                                $birthDate = new DateTime($tanggal_lahir);
                                                $today = new DateTime("today");
                                                if ($birthDate > $today) { 
                                                    exit("0 tahun 0 bulan 0 hari");
                                                }
                                                $y = $today->diff($birthDate)->y;
                                                $m = $today->diff($birthDate)->m;
                                                $d = $today->diff($birthDate)->d;
                                                return $y." tahun";
                                            }
                                            ?>
                                            @foreach(@$customer as $rs)
                                            <?php $no++; ?>
                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td>
                                                    <!-- <img src="#" alt="" height="52"> -->
                                                    <p class="d-inline-block align-middle mb-0">
                                                        <a href="" class="d-inline-block align-middle mb-0 product-name">{{ @$rs->pre_nama_customer }} {{ @$rs->nama_customer }}</a> 
                                                        <br>
                                                        <span class="text-muted font-13"><span class="badge badge-soft-primary">{{ @$rs->tgl_lahir }}</span> - <span class="badge badge-soft-danger"><?php echo hitung_umur($rs->tgl_lahir); ?></span></span> 
                                                    </p>
                                                </td>
                                                <td>{{ @$rs->no_telepon }}</td>
                                                <td>{{ @$rs->alamat }}</td>
                                                <td>
                                                    <a href="{{ route('customer.edit',@$rs->id) }}"><i class="far fa-edit text-info mr-1"></i></a>
                                                    <a href="{{ route('customer.hapus',@$rs->id) }}"><i class="far fa-trash-alt text-danger"></i></a>
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