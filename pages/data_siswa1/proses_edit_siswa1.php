<?php
  session_start();
	require '../../config/connect_db.php';

	// proses edit
	$id = $_GET['id'];  
	$nisn = htmlspecialchars($_POST['nisn']);
  $siswa = htmlspecialchars($_POST['nama_siswa']);
  $kelas = htmlspecialchars($_POST['kelas']);

  $sql = "UPDATE data_siswa1 SET nama_siswa = '$siswa', kelas = '$kelas'
  WHERE No_ID = '$id'";
  $send = mysqli_query($koneksi_db, $sql);

  if ($send) {
    $_SESSION['pesan'] = 'Data Siswaa berhasil terubah!';
    $_SESSION['status'] = 'success';
    header('Location: ../../index.php?page=data_siswa1');
    exit;
  } 
  else {
    $_SESSION['pesan'] = 'Data Siswaa gagal terubah!';
    $_SESSION['status'] = 'danger';
    header('Location: ../../index.php?page=data_siswa1');
    exit;
  }
  
?>