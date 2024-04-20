<?php   

require_once './db_koneksi.php';

$sql = 'SELECT * FROM pasien';
$getpasien = $dbh->query($sql);


include_once './layout/top.php';
include_once './layout/navbar.php';
include_once './layout/sidebar.php';

?>
<!-- Content Wrapper. Contains page content -->
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

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data Pasien</h3>
        </div>
        <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Kode</th>
                            <th>Nama Pasien</th>
                            <th>Alamat</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($getpasien as $key => $pasien) : ?>
                        <tr>
                            <td><?= ++$key?></td>
                            <td><?=$pasien['kode']?></td>
                            <td><?=$pasien['nama']?></td>
                            <td><?=$pasien['alamat']?></td>
                            <td><?=$pasien['email']?></td>
                            <td>
                              <a href="./form_pasien.php?id<?= $pasien['id'] ?>" class="btn btn-sm btn-warning">Ubah</a>
                            </td>
                        </tr>
                        <?php endforeach  ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
        </div>
        <!-- /.card-body -->    
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
 
</div>
  <!-- /.content-wrapper -->

<?php include_once './layout/bottom.php' ?>