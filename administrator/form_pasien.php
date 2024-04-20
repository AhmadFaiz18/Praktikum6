<?php 

require_once './db_koneksi.php';

$data_kelurahan = $dbh->query("SELECT * FROM kelurahan ORDER BY nama ASC");

$error =false;

$pasien_id = $_GET['id'] ?? 0;
if($pasien_id ){
  $findpasienSQL = "SELECT * FROM pasien WHERE id = $pasien_id LIMIT 1";
  $pasien = $dbh->query($findpasienSQL)->fetch();
  print_r($pasien);

  
} 

include_once './layout/top.php';
include_once './layout/navbar.php';
include_once './layout/sidebar.php';


?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pasien</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>  

    <!-- Main content --> 
    <section class="content">
        
    <?php if($error) :   ?>
      <div class="alert alert-denger"><?= $error ?></div>
    <?php endif ?>

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Form Tambah Pasien</h3>
        </div>
        <div class="card-body">
        <form method="post" action="proses_pasien.php">
  <div class="form-group row">
    <label for="kode" class="col-3 col-form-label">Kode</label> 
    <div class="col-9">
      <input id="kode" name="kode" type="text" class="form-control" >
    </div>
  </div>
  <div class="form-group row">
    <label for="nama" class="col-3 col-form-label">Nama</label> 
    <div class="col-9">
      <input id="nama" name="nama" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="tmp_lahir" class="col-3 col-form-label">Tempat Lahir</label> 
    <div class="col-9">
      <input id="tmp_lahir" name="tmp_lahir" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="tgl_lahir" class="col-3 col-form-label">Tanggal Lahir</label> 
    <div class="col-9">
      <input id="tgl_lahir" name="tgl_lahir" type="date" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-3">Jenis Kelamin</label> 
    <div class="col-9">
      <div class="custom-control custom-radio custom-control-inline">
        <input name="gender" id="gender_0" type="radio" class="custom-control-input" value="L" checked> 
        <label for="gender_0" class="custom-control-label">Laki-Laki</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="gender" id="gender_1" type="radio" class="custom-control-input" value="P"> 
        <label for="gender_1" class="custom-control-label">Perempuan</label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="kelurahan" class="col-3 col-form-label">Kelurahan</label> 
    <div class="col-9">
      <select id="kelurahan" name="kelurahan" class="custom-select">
        <option value="" disabled selected>Pilih Kelurahan</option>
        <?php foreach ($data_kelurahan as $key =>$kelurahan):?>
        <option value="<?=$kelurahan['id']?>"><?= $kelurahan['nama'] ?></option>
        <?php endforeach ?>
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="email" class="col-3 col-form-label">Email</label> 
    <div class="col-9">
      <input id="email" name="email" type="email    " class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="alamat" class="col-3 col-form-label">Alamat</label> 
    <div class="col-9">
      <textarea id="alamat" name="alamat" cols="40" rows="3" class="form-control"></textarea>
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-3 col-9">
        <input type="submit" name="proses" id="proses" class="btn btn-primary" value="simpan" >
        </div>
  </div>
</form>
        </div>
        <!-- /.card-body -->    
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
 
</div>
  <!-- /.content-wrapper -->

<?php include_once './layout/bottom.php'; ?>
