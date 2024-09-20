<?php
  session_start();
	require '../../config/connect_db.php';

	// proses tambah
	$nisn = htmlspecialchars($_POST['nisn']);
  $siswa = htmlspecialchars($_POST['nama_siswa']);
  $jk = htmlspecialchars($_POST['jenis_kelamin']);
  $kelas = htmlspecialchars($_POST['kelas']);
  $univ = htmlspecialchars($_POST['universitas']);

  $query = mysqli_query($koneksi_db, "SELECT Nama_Siswa FROM data_alternatif WHERE Nama_Siswa = '$siswa'");
  $nisnSiswa = mysqli_num_rows($query);

  // validasi input alternatif sudah ada atau belum
  if ($nisnSiswa > 0) {
    $_SESSION['pesan'] = 'Nama Jurusan sudah ada!';
    $_SESSION['status'] = 'warning';
		header('Location: ../../index.php?page=tambah_alter');
    exit;
  } else {
    $sql = "INSERT INTO data_alternatif VALUES ('', '$siswa', '$univ')";
    $send = mysqli_query($koneksi_db, $sql);

    if ($send) {
      $_SESSION['pesan'] = 'Jurusan berhasil tersimpan!';
      $_SESSION['status'] = 'success';
      header('Location: ../../index.php?page=data_siswa');
      exit;
    } else {
      $_SESSION['pesan'] = 'Jurusan gagal tersimpan!';
      $_SESSION['status'] = 'danger';
      header('Location: ../../index.php?page=data_siswa');
    }
  }
?>