<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>HapusData</title>
<link href="/image/mimi.JPG" rel='shortcut icon'>
<style>
<!--
body
{
background-image:url(/image/background.jpg);
background-repeat:no-repeat;
background-attachment:fixed;
}
</style>
</head>
<body>
</body>
</html>
<?php
include "koneksi.php";
$kdhapus = $_GET['kdhapus'];
//$isipertanyaan = $_GET['pertanyaan'];
if ($kdhapus  !="") {
	$sql = "DELETE FROM tb_penyakit WHERE kdpenyakit='$kdhapus'";
	mysql_query($sql, $koneksi) or die ("SQL Error". mysql_error());
	echo "<center><b>Data berhasil dihapus</b></center>";
	echo "<center><a href='penyakit.php'><b>OK</b></a></center>";
	//include "index.php?top=gejala.php";
	}else{
	echo "<center>Data belum berhasil dihapus</center>";
	echo "<center><a href='penyakit.php'><b>Kembali</b></a></center>";
}
?>