
@extends('templates.default')

@section('content')
<section class="content-header">
        <h1>
          Tambah Katalog
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Katalog</a></li>
          <li class="active">Tambah Katalog</li>
        </ol>
      </section>
      <section class="content">
            <div class="row">
              <!-- left column -->
              <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-success">
                  <div class="box-header with-border">
                    <h3 class="box-title">Tambah Katalog Baru</h3>
                  </div>
                  <!-- /.box-header -->
                  <!-- form start -->
                  <form role="form" class="form-horizontal">
                    <div class="box-body">
                      
                          <div class="row">
                              <div class="col-md-6">
                                    <div class="form-group">
                                            <label for="jenisAnalisis" class="col-sm-4 control-label">Jenis Analisis</label>
                                            <div class="col-sm-8">
                                            <input type="text" class="form-control" id="jenisAnalisis" placeholder="Contoh: Fitokimia, Alkaloid">
                                            </div>  
                                        </div>
                    
                                          <div class="form-group">
                                            <label for="kategori" class="col-sm-4 control-label">Kategori</label>
                                            <div class="col-sm-8">
                                                    <select class="form-control" id="kategori">
                                                      <option>option 1</option>
                                                      <option>option 2</option>
                                                      <option>option 3</option>
                                                      <option>option 4</option>
                                                      <option>option 5</option>
                                                    </select>
                                            </div>  
                                        </div>

                                        <div class="form-group">
                                                <label for="metode" class="col-sm-4 control-label">Metode</label>
                                                <div class="col-sm-8">
                                                <input type="text" class="form-control" id="metode" placeholder=""">
                                                </div>  
                                            </div>  
                                            <div class="form-group">
                                                    <label for="keterangan" class="col-sm-4 control-label">Keterangan</label>
                                                    <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="keterangan" placeholder=""">
                                                    </div>  
                                                </div>                      
                    
                                                <div class="form-group">
                                                        <label for="bentuk" class="col-sm-4 control-label">Bentuk</label>
                                                        <div class="col-sm-8">
                                                        <div class="checkbox">
                                                          <label>
                                                            <input type="checkbox">
                                                            Simplisia
                                                          </label>
                                                        </div>
                                      
                                                        <div class="checkbox">
                                                          <label>
                                                            <input type="checkbox">
                                                            Ekstrak
                                                          </label>
                                                        </div>
                                      
                                                        <div class="checkbox">
                                                          <label>
                                                            <input type="checkbox">
                                                            Serbuk
                                                          </label>
                                                        </div>
                                                        <div class="checkbox">
                                                                <label>
                                                                  <input type="checkbox">
                                                                  Cairan
                                                                </label>
                                                              </div>
                                                            </div>
                                                        </div>
                              </div>
                              <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="hargaIPB" class="col-sm-4 control-label">Harga IPB</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                       Rp
                                                      </div>
                                        <input type="number" class="form-control" id="hargaIPB" placeholder=""">
                                        </div>  
                                    </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="hargaNONIPB" class="col-sm-4 control-label">Harga NON-IPB</label>
                                        <div class="col-sm-8">
                                                        <div class="input-group">
                                                            <div class="input-group-addon">
                                                                   Rp
                                                                  </div>
                                                    <input type="number" class="form-control" id="hargaNONIPB" placeholder=""">
                                                    </div>
                                        </div>  
                                    </div>  
                                    <div class="form-group">
                                            <label for="exampleInputFile" class="col-sm-4 control-label">Foto</label>
                                            <div class="col-sm-8">
                                            <input type="file" id="exampleInputFile">
                            
                                            <p class="help-block">Max. 2 MB</p>
                                            </div>
                                          </div>

                                          <div class="form-group">
                                                <label for="status" class="col-sm-4 control-label">Status Aktif</label>
                                                <div class="col-sm-8">
                                                        <select class="form-control" id="status">
                                                          <option>Aktif</option>
                                                          <option>Tidak Aktif</option>
                                                        </select>
                                                </div>  
                                            </div>
                                </div>
                          </div>
                          
                    </div>
                    <!-- /.box-body -->
      
                    <div class="box-footer">
                      <button type="submit" class="btn btn-primary pull-right">Simpan</button>
                    </div>
                  </form>
                </div>
                <!-- /.box -->
      
              </div>
              <!--/.col (right) -->
            </div>
            <!-- /.row -->
          </section>
@endsection