<?php 
ob_start();
include "admin/koneksi.php";
// mengambil variabel dari halaman konsultasiFM.php
$gejala 	= '';
$events 	= '';
if (isset($_POST['gejala']))
{
	$selectors 	= htmlentities(implode(',', $_POST['gejala']));
	//$events 	= htmlentities(implode('', $_POST['bobot']));
}
$data=$selectors;
//$databobot=$events;
echo "$selectors<br>";
//echo "$events";
$input = $data;
	  //memecahkan string input berdasarkan karakter '\r\n\r\n'
	  $pecah = explode("\r\n\r\n", $input);
	  // string kosong inisialisasi
	  $text = "";
	  //untuk setiap substring hasil Jantung, sisipkan <p> di awal dan </p> di akhir
	  // lalu menggabungnya menjadi satu string untuk $text
	  for ($i=0; $i<=count($pecah)-1; $i++)
	  {
	  	$part = str_replace($pecah[$i], "<p>".$pecah[$i]."</p>", $pecah[$i]);
		$text .=$part;
	  }
	  //menampilkan outputnya
echo $text;
$kosongtabel=mysqli_query($con,"DELETE FROM tmp_gejala");
$text_line=$data;
$text_line =$data; //"Poll number 1, 1500, 250, 150, 100, 1000";
$text_line = explode(",",$text_line);
$posisi=0;
for ($start=0; $start < count($text_line); $start++) {
	$baris=$text_line[$start]; //echo "$baris<br>";
	// untuk nilai bobot	
	//$bobot=substr($databobot,$posisi,1); echo $bobot. "<br>";
	$sql="INSERT INTO tmp_gejala (kd_gejala) VALUES ('$baris')";
	$query=mysqli_query($con,$sql) or die(mysqli_error());
	$posisi++;
print $text_line[$start] . "<BR>";
}
ob_start();
echo "<meta http-equiv='refresh' content='0; url=proses_diagnosa.php'>";
?>
