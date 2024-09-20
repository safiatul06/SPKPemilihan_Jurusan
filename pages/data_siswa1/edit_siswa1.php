<?php
    // menangkap data alternatif
    $idAlt = $_GET['edit'];
    $sqlSis = "SELECT * FROM data_siswa1 WHERE No_ID = '$idAlt'";
    $querySis = mysqli_query($koneksi_db, $sqlSis);
    $data = mysqli_fetch_assoc($querySis);
?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-1">
  <h1 class="h3 text-gray-800">Edit Siswa</h1>
</div>

<!-- DataTales Example -->
<div class="card mb-4 rounded-0">
    <div class="card-header bg-white py-3 d-flex">
        <h6 class="m-0 text-gray-800">Edit Data Siswa</h6>
    </div>
    <div class="card-body">
        <form action="pages/data_siswa1/proses_edit_siswa1.php?id=<?= $_GET['edit']; ?>" method="post">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nama Siswa</label>
                <input type="text" class="form-control rounded-0" id="exampleFormControlInput1" name="nama_siswa" 
                value="<?= $data['nama_siswa']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Kelas</label>
                <select class="form-control rounded-0" id="exampleFormControlInput1" name="kelas" value="<?= $data['kelas']; ?>" > 
                <option> IPA </option>
                <option selected="selected"> IPS </option>
                
                </select>
            </div>

            <a href="index.php?page=data_siswa1" class="btn btn-secondary btn-square rounded-0">
                <i class="fas fa-chevron-left fa-sm"></i> Kembali
            </a>
            <button type="submit" class="btn btn-success btn-square rounded-0">
                <i class="fas fa-edit fa-sm"></i> Edit
            </button>
        </form>
    </div>
</div>