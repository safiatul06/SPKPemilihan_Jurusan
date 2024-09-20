<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-1">
  <h1 class="h3 text-gray-800">Tambah Data Siswa</h1>
</div>

<!-- popup status -->
<?php  
    if (isset($_SESSION['pesan']) && isset($_SESSION['status'])) :
?>
    <div class="alert alert-<?= $_SESSION['status']; ?> rounded-0" role="alert" id="notif">
      <?= $_SESSION['pesan']; ?>
    </div>
<?php  
    unset($_SESSION['pesan']);
    unset($_SESSION['status']);
    endif;
?>

<!-- DataTales Example -->
<div class="card mb-4 rounded-0">
    <div class="card-header bg-white py-3 d-flex">
        <h6 class="m-0 text-gray-800">Masukkan Data Siswa Baru</h6>
    </div>
    <div class="card-body">
        <form action="pages/data_siswa1/proses_tambah_siswa1.php" method="post">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nama Siswa</label>
                <input type="text" class="form-control rounded-0" id="exampleFormControlInput1" name="nama_siswa" placeholder="Masukkan Nama Siswa"required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Kelas</label>
                 <select class="form-control rounded-0" id="exampleFormControlInput1" name="kelas" placeholder="Pilih Kelas">
                 <option> IPA </option>
                 <option selected="selected"> IPS </option>
                </select>
            </div>
            <a href="index.php?page=data_siswa1" class="btn btn-secondary btn-square rounded-0">
                <i class="fas fa-chevron-left fa-sm"></i> Kembali
            </a>
            <button type="submit" class="btn btn-success btn-square rounded-0">
                <i class="fas fa-save fa-sm"></i> Simpan
            </button>
        </form>
    </div>
</div>