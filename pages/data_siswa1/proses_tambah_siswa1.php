<?php
  session_start();
	require '../../config/connect_db.php';

	// proses tambah
	$nisn = htmlspecialchars($_POST['nisn']);
  $siswa = htmlspecialchars($_POST['nama_siswa']);
  $jk = htmlspecialchars($_POST['jenis_kelamin']);
  $kelas = htmlspecialchars($_POST['kelas']);

  $query = mysqli_query($koneksi_db, "SELECT nama_siswa FROM data_siswa1 WHERE nama_siswa = '$siswa'");
  $nisnSiswa = mysqli_num_rows($query);

  // validasi input data siswa1 sudah ada atau belum
  if ($nisnSiswa > 0) {
    $_SESSION['pesan'] = 'Nama sudah ada!';
    $_SESSION['status'] = 'warning';
		header('Location: ../../index.php?page=tambah_siswa1');
    exit;
  } else {
    $sql = "INSERT INTO data_siswa1 VALUES ('', '$siswa' , '$kelas')";
    $send = mysqli_query($koneksi_db, $sql);

    if ($send) {
      $_SESSION['pesan'] = 'Data Siswaa berhasil tersimpan!';
      $_SESSION['status'] = 'success';
      header('Location: ../../index.php?page=data_siswa1');
      exit;
    } else {
      $_SESSION['pesan'] = 'Data Siswaa gagal tersimpan!';
      $_SESSION['status'] = 'danger';
      header('Location: ../../index.php?page=data_siswa1');
    }
  }
?>