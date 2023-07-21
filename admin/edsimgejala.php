<?php
include "koneksi.php";
	$kdgejala = $_POST['kd_gejala2'];
	$gejala = $_POST['gejala'];
	$result=$con->query(" UPDATE gejala SET gejala='$gejala' WHERE kd_gejala='$kdgejala' ");
	if($result){
		echo "<center>Data Telah Berhasil Diubah</center>";
		echo "<center><a href='../admin/gejala.php'>OK</a></center>";
		}else{
		echo"<table style='margin-top:150px;' align='center'><tr><td>";
		echo"<div style='width:500px; height:50px auto; border:1px dashed #CCC; padding:3px 3px 3px 3px;'>";
		echo "<center><font color='#ff0000'>Data tidak dapat di Update..!</strong></font></center><br>";
		echo "<center><a href='../admin/gejala.php'>Kembali</a></center>";
		echo"</div>";
		echo"</td></tr></table>";
		}
?>