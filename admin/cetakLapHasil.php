<html>
<head>
<title>Cetak Laporan</title>
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
 <link rel="stylesheet" href="css/templatemo_main.css">
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>
<script type="text/javascript" src="js/jquery.printElement.js"></script>
<script type="text/javascript">
		$(document).ready(function(){
			$("#tabel1").printElement();
			});
</script>
</head>
<body>
<div class="container">
<table id="tabel1" class="table table-striped table-hover table-bordered">
                  <thead>
                    <tr>
                      <th colspan="6">Laporan Hasil Diagnosa Pengguna</th>
                    </tr>
                    <tr>
                      <th width="8%">#</th>
                      <th width="13%">Nama</th>
                      <th width="13%">Umur</th>
                      <th width="13%">Alamat</th>
                      <th width="43%">Hasil Diagnosa</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
	include "koneksi.php";
	$arrPenyakit=array();
	$queryP=$con->query("SELECT * FROM penyakit_solusi"); 
	while($dataP=$queryP->fetch_array()){ $arrPenyakit["$dataP[kd_penyakit]"]=$dataP['nama_penyakit']; }	
	//$sql="SELECT * FROM analisa_hasil";
	$resultP = $con->query(" SELECT * FROM pasien,analisa_hasil WHERE analisa_hasil.idpasien=pasien.idpasien group by analisa_hasil.idpasien  ORDER BY analisa_hasil.idhasil DESC ") ;
	$no=0;
	while ($data=$resultP->fetch_object()) {
	$no++;
   ?>
                    <tr>
                      <td><?php echo $no;?></td>
                      <td><?php echo $data->nama;?></td>
                      <td><?php echo $data->umur;?></td>
                      <td><?php echo $data->alamat."<br>".$data->email;?></td>
                      <td><?php $idp=$data->idpasien;
	$strP=$con->query("SELECT * FROM analisa_hasil WHERE idpasien='$idp' GROUP BY idhasil ");
	while($dataP=$strP->fetch_object()){
		echo $dataP->kd_penyakit." | "; print_r($arrPenyakit["$dataP->kd_penyakit"]); echo " = ".$dataP->persentase."%<br>";
		echo "ID Diagnosa : ".$dataP->idhasil." Pada Tanggal : $dataP->tanggal <br> ";
		$queryHasil=$con->query("SELECT * FROM analisa_hasil WHERE idpasien='$idp' AND idhasil='$dataP->idhasil' GROUP BY kd_penyakit ");
		while($dataHasil=$queryHasil->fetch_object()){
			echo $dataHasil->kd_penyakit." => "; print_r($arrPenyakit[$dataHasil->kd_penyakit]); echo " (".$dataHasil->persentase."%)<br>";
			}
			echo "<label class='label label-default'>Gejala yang terjadi :</label>";
			$queryHasil=$con->query("SELECT * FROM analisa_hasil WHERE idpasien='$idp' AND idhasil='$dataP->idhasil' GROUP BY kd_gejala ");
		while($dataHasil=$queryHasil->fetch_object()){
			echo " ( ".$dataHasil->kd_gejala." ) ";
			} 
			echo "<hr>";
		}
	 ?></td>
                    </tr><?php }?>                    
                  </tbody>
                </table>
</div>
</body>
</html>