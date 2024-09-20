<?php  

    require '../../config/connect_db.php';

	require_once __DIR__ . '../../../vendor/autoload.php';
	
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=laporan_excel.xls");

    $pref = mysqli_query($koneksi_db, "SELECT hasil_preferensi.ID_Pref, hasil_preferensi.ID_Alter,
	data_alternatif.Nama_Siswa,data_alternatif.Univ, hasil_preferensi.hasil_pref
  FROM hasil_preferensi 
  INNER JOIN data_alternatif ON hasil_preferensi.ID_Alter = data_alternatif.ID_Alter ORDER BY hasil_pref DESC");

  /*$pref1 = mysqli_query($koneksi_db, "SELECT data_siswa1.No_ID, data_siswa1.nama_siswa,
	data_siswa1.kelas FROM data_siswa1");*/

?>

/*<!-- DataTales Example -->*/
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
            <th class="text-nowrap">Nama Siswa</th>
            <th class="text-nowrap">Kelas</th>
            
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

              <?php  
                $pref1 = mysqli_query($koneksi_db, "SELECT nama_siswa, kelas FROM data_siswa1");

                while ($res = mysqli_fetch_assoc($pref1)) :
              ?>
                <td class="text-nowrap"><?= $res['nama_siswa']; ?></td>
                <td class="text-nowrap"><?= $res['kelas']; ?></td>
              <?php endwhile; ?>

            </tr>
        	<?php endwhile; ?>
        </tbody>
      </table>
    </div>
	</div>
</div>
