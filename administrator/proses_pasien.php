<?php 

require_once './db_koneksi.php';

//Tangkap data form yang dikirim
$kode = $_POST['kode']; //1
$nama = $_POST['nama']; //2
$tmp_lahir = $_POST['tmp_lahir']; //3       
$tgl_lahir = $_POST['tgl_lahir']; //4
$gender = $_POST['gender']; //5
$kelurahan_id = $_POST['kelurahan'];//6
$email = $_POST['email']; //7
$alamat = $_POST['alamat']; //8

//Simpan data ke dalam array
$data = [$kode, $nama, $tmp_lahir, $tgl_lahir, $gender, $kelurahan_id, $email, $alamat]; 

//Check nilai PROSES 
if ($_POST['proses']== 'simpan'){
    //Membuat sql
    $insertPasienSQL = "INSERT INTO pasien (kode, nama, tmp_lahir ,tgl_lahir ,gender ,kelurahan_id ,email ,alamat) VALUES(?,?,?,?,?,?,?,?)";
    //Mendefinisikan preapare statement
    $stmt = $dbh->prepare($insertPasienSQL);    
    //eksekusi statament sql
    $stmt->execute($data);
}

//redirect ke halaman data pasien
header('location:  ./data_pasien.php');
?>