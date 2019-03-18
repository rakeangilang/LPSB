@extends('templates.default')

@section('content')
<section class="content-header">
    <h1>
        Pesanan
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Pesanan</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab">Belum Divalidasi</a></li>
                    <li><a href="#tab_2" data-toggle="tab">Tervalidasi</a></li>
                    <li><a href="#tab_3" data-toggle="tab">Dianalisis</a></li>
                    <li><a href="#tab_4" data-toggle="tab">Selesai</a></li>
                    <li><a href="#tab_5" data-toggle="tab">Batal</a></li>
                </ul>
                <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No Pesanan</th>
                                            <th>Pelanggan</th>
                                            <th>Waktu Dibuat</th>
                                            <th>Total Harga</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>1/II/19</td>
                                            <td>M Gofar</td>
                                            <td>22 Mar 2019 12:21</td>
                                            <td>180.000</td>
                                            <td>Lihat</td>
                                        </tr>
        
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>No Pesanan</th>
                                            <th>Pelanggan</th>
                                            <th>Waktu Dibuat</th>
                                            <th>Total Harga</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                </table>
        
                            </div>
                            <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_2">
                        <table id="example3" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Pesanan</th>
                                    <th>Pelanggan</th>
                                    <th>Waktu Terbaru</th>
                                    <th>Total Harga</th>
                                    <th>Pembayaran</th>
                                    <th>Pengiriman Sampel</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>1/II/19</td>
                                    <td>M Gofar</td>
                                    <td>22 Mar 2019 12:21</td>
                                    <td>180.000</td>
                                    <td>Belum Dibayar</td>
                                    <td>Diterima</td>
                                    <td>Lihat</td>
                                </tr>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>No Pesanan</th>
                                    <th>Pelanggan</th>
                                    <th>Waktu Terbaru</th>
                                    <th>Total Harga</th>
                                    <th>Pembayaran</th>
                                    <th>Pengiriman Sampel</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_3">
                            <table id="example5" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No Pesanan</th>
                                            <th>Pelanggan</th>
                                            <th>Waktu Terbaru</th>
                                            <th>Total Harga</th>
                                            <th>Status Analisis</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>1/II/19</td>
                                            <td>M Gofar</td>
                                            <td>22 Mar 2019 12:21</td>
                                            <td>180.000</td>
                                            <td>Dikaji Ulang</td>
                                            <td>Lihat</td>
                                        </tr>
        
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>No Pesanan</th>
                                            <th>Pelanggan</th>
                                            <th>Waktu Terbaru</th>
                                            <th>Total Harga</th>
                                            <th>Status Analisis</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                </table>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_4">
                            <table id="example7" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No Pesanan</th>
                                            <th>Pelanggan</th>
                                            <th>Waktu Terbaru</th>
                                            <th>Total Harga</th>
                                            <th>Sisa Sampel</th>
                                            <th>Sertifikat</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>1/II/19</td>
                                            <td>M Gofar</td>
                                            <td>22 Mar 2019 12:21</td>
                                            <td>180.000</td>
                                            <td>Belum Dikirim</td>
                                            <td>Tidak Dikirim</td>
                                            <td>Lihat</td>
                                        </tr>
        
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>No Pesanan</th>
                                            <th>Pelanggan</th>
                                            <th>Waktu Terbaru</th>
                                            <th>Total Harga</th>
                                            <th>Sisa Sampel</th>
                                            <th>Sertifikat</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                </table>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_5">
                            <table id="example9" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No Pesanan</th>
                                            <th>Pelanggan</th>
                                            <th>Waktu Dibuat</th>
                                            <th>Total Harga</th>
                                            <th>Waktu Dibatalkan</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>1/II/19</td>
                                            <td>M Gofar</td>
                                            <td>22 Mar 2019 12:21</td>
                                            <td>180.000</td>
                                            <td>23 Mar 2019 12:21</td>
                                            <td>Lihat</td>
                                        </tr>
        
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>No Pesanan</th>
                                            <th>Pelanggan</th>
                                            <th>Waktu Terbaru</th>
                                            <th>Total Harga</th>
                                            <th>Waktu Dibatalkan</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                </table>
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
@endsection
