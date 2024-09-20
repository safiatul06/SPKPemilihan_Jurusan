<?php  
	require '../../config/connect_db.php';

	require_once __DIR__ . '../../../vendor/autoload.php';

	
	// format tgl indonesia
	setlocale(LC_ALL, 'id-ID', 'id_ID');
	$tgl1 = strftime("%A, %d %B %Y | %T");
	$tgl2 = strftime("%d %B %Y");

	$pref = mysqli_query($koneksi_db, "SELECT hasil_preferensi.ID_Pref, hasil_preferensi.ID_Alter,
	data_alternatif.Nama_Siswa,data_alternatif.Univ, hasil_preferensi.hasil_pref FROM hasil_preferensi INNER JOIN 
	data_alternatif ON hasil_preferensi.ID_Alter = data_alternatif.ID_Alter ORDER BY hasil_pref DESC");

	$pref1 = mysqli_query($koneksi_db, "SELECT data_siswa1.No_ID, data_siswa1.nama_siswa,
	data_siswa1.kelas FROM data_siswa1");

	$ambildata = mysqli_query($koneksi_db, "SELECT * from data_siswa1");
	while ($tampil = mysqli_fetch_array($ambildata));

	$mpdf = new \Mpdf\Mpdf();
	$mpdf->debug = false;
	

	$profil = '<style>
	table, th, td {
		padding: 5px;
	}

	</style>

	<img src="sma1.png" style="float: left; height: 60px">

	<div style="margin-left: 15px">
		<div style="font-size: 18px"> Laporan Hasil Perangkingan </div>
		<div style="font-size: 20px"> SPK Pemilihan jurusan SMAN 1 Bangsal </div>
	</div>

	<hr style="border: 0.5px solid black; margin:10px 5px 10px 5px;">';


	  

	/*$header = '<div class="head" style="border-bottom: 5px double black; font-family: sans-serif;">	
							<img src="assets/img/sma1.png" alt="sma1" class="img-profile w-100;">
							<h3 style="float: center; padding-top: 15px;">Laporan Hasil Perangkingan<br>SPK Pemilihan jurusan SMAN 1 Bangsal</h3>
						</div>';*/



	$subhead = '<div style="font-family: sans-serif;">
								<p style="font-weight: bold;">Hasil Perankingan Siswa</p>
								<p style="font-weight: italic;">Kelas 		: 12  </p>
								<p style="font-size: 12px;">'. $tgl1 .'</p>
							</div>';

	$tabel1 = '<table border="1" width="100%" cellspacing="0" cellpadding="5" style="font-size: 12px; font-family: sans-serif;">
							<thead>
								<tr>
										<th>No</th>
									<th>Nama Siswa</th>
									<th>Kelas</th>
								</tr>
							</thead>
							<tbody>';
									$no = 0;  
									while ($res = mysqli_fetch_assoc($pref1)) :
									$no++;	
						 $tabel1 .= '<tr>
												 <td>'. $no .'</td>
								  <td>'. $res['nama_siswa'] .'</td>
								  <td>'. $res['kelas'] .'</td>
								  </tr>';
									endwhile;
				$tabel1 .= '</tbody>
					  </table>';

	 $subhead1 = '<div style="font-family: sans-serif;">
					  <p style="font-weight: bold;">Hasil Perankingan Nilai Siswa</p>
				  </div>';


	$tabel = '<table border="1" width="100%" cellspacing="0" cellpadding="5" style="font-size: 12px; font-family: sans-serif;">
	            <thead>
	                <tr>
	                		<th>No</th>
	                    <th>Nama Jurusan</th>
						<th>Universitas</th>
	                    <th>Nilai Akhir</th>
	                    <th>Hasil Rekomendasi</th>
	                </tr>
	            </thead>
	            <tbody>';
            			$no = 0;  
            			while ($res = mysqli_fetch_assoc($pref)) :
            			$no++;	
         	$tabel .= '<tr>
         							<td>'. $no .'</td>
                      <td>'. $res['Nama_Siswa'] .'</td>
					  <td>'. $res['Univ'] .'</td>
                      <td>'. $res['hasil_pref'] .'</td>
                      <td>'. $no .'</td>  
	                  </tr>';
            			endwhile;
	$tabel .= '</tbody>
	      </table>';

  $date = '<div style="text-align: right; margin-top:50px; font-family: sans-serif;">
					 	<p>Kabupaten Mojokerto, '. $tgl2 .'</p>
					 	<p style="margin-right: 60px;">Admin</p>
					 	<br><br>
					 	<p style="margin-right: 12px;">..................................</p>
					</div>';

	$mpdf->SetTitle('Laporan Perankingan');	
	$mpdf->WriteHTML($profil);						
	/*$mpdf->WriteHTML($header);*/
	$mpdf->WriteHTML($subhead);
	$mpdf->WriteHTML($tabel1);
	$mpdf->WriteHTML($subhead1);
	$mpdf->WriteHTML($tabel);
	$mpdf->WriteHTML($date);
	$mpdf->SetFooter('SPK Pemilihan Jurusan|{PAGENO}|Hasil Perankingan');
	$mpdf->Output('Laporan Perankingan.pdf', \Mpdf\Output\Destination::INLINE);

?>
