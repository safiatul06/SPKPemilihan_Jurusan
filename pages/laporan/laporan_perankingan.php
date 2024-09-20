<?php  
	$pref = mysqli_query($koneksi_db, "SELECT hasil_preferensi.ID_Pref, hasil_preferensi.ID_Alter,
	data_alternatif.Nama_Siswa,data_alternatif.Univ, hasil_preferensi.hasil_pref FROM hasil_preferensi INNER JOIN 
	data_alternatif ON hasil_preferensi.ID_Alter = data_alternatif.ID_Alter ORDER BY hasil_pref DESC");

?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h5 class="mb-3 text-gray-800 my-sm-auto">Cetak Hasil Perankingan</h5>
  <a href="assets/report/report_perankingan.php" class="d-inline-block btn btn-sm btn-success rounded-0" target="_blank">
  	<i class="fas fa-file-pdf fa-sm"></i> Cetak Laporan
	</a>
</div>

<div class="d-sm-flex align-items-left justify-content-between mb-4">
<a href="assets/report/laporan_excel.php" class="d-inline-block btn btn-sm btn-success rounded-0" target="_blank">
  	<i class="fas fa-file-excel fa-sm"></i> Ekspor CSV
	</a>
</div>

<!-- DataTales Example -->
<div class="card mb-4 rounded-0">
	<div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" width="100%" cellspacing="0">
        <thead>
          <tr>
          	<th class="text-nowrap">No</th>
            <th class="text-nowrap">Nama Jurusan</th>
            <th class="text-nowrap">Universitas</th>
            <th class="text-nowrap">Nilai Akhir</th>
            <th class="text-nowrap">Hasil Rekomendasi</th>
          </tr>
        </thead>
        <tbody>
      		<?php
      			$no = 0;  
      			while ($res = mysqli_fetch_assoc($pref)) :
      			$no++;	
      		?>
            <tr>
            	<td class="text-nowrap"><?= $no; ?></td>
              <td class="text-nowrap"><?= $res['Nama_Siswa']; ?></td>
              <td class="text-nowrap"><?= $res['Univ']; ?></td>
              <td class="text-nowrap"><?= $res['hasil_pref']; ?></td>
              <td class="text-nowrap"><?= $no; ?></td>  
            </tr>
        	<?php endwhile; ?>
        </tbody>
      </table>
    </div>
	</div>
</div>