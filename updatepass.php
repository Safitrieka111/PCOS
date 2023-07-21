<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Simpan Data Penyakit</title>
<link rel="stylesheet" type="text/css" href="../style.css">
<style type="text/css">
.center { margin:auto; margin-top:200px; width:50%;}
</style>
<link href="../Image/icon.png" rel="shortcut icon">
</head>
<body>
<?php
include "admin/koneksi.php";
include "session.php";
# Baca variabel Form (If Register Global ON)
$email=$_SESSION['agent_forum_pasien'];
$pass=$_POST['pass1'];
//query update password
	$query=mysqli_query($con,"UPDATE pasien SET password='$pass' WHERE email='$email' ");
	//echo "<meta http-equiv='refresh' content='0; url=index.php?top=konsultasifm.php'>";
	if($query){
			echo"<div class='center'>";
			echo "<center><font><strong>Password Berhasil Diupdate !</strong></font></center><br>";
			echo "<center><a href='akun.php'>OK</a></center>";
			echo"</div>";

		}
?>
	
</body>
</html>
