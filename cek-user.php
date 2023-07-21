<?php
include "admin/koneksi.php";
$username = $_POST['username'];
$password = $_POST['password'];

if (trim($username)=="") {
	///include "login2.php"; 
	echo "<div align=center><b>Nama Belum diisi !!</b><br>";
	echo "Harap diisi terlebih dahulu</div>";
	exit;
}
elseif (trim($password)=="") {
	//include "login3.php"; 
	echo "<div align=center><b>Password Belum diisi !!</b><br>";
	echo "Harap diisi terlebih dahulu</div>";
	exit;
}
$passwordhash = md5($password);  // mengenkripsikannya untuk dicocokan dengan database
$perintahnya = "select email, password from pasien where email= '$username' AND password = '$password'";
$jalankanperintahnya = mysqli_query($con,$perintahnya);
$ada_apa_enggak = mysqli_num_rows($jalankanperintahnya);
if ($ada_apa_enggak >= 1 )
{
	session_start();
	$_SESSION['agent_forum_pasien']=$username;
		$_SESSION['agent_forum_user']=$username;
		$_SESSION['agent_password_user']=$password;
		$_SESSION['agent_forum_user']=md5($_SERVER['HTTP_USER_AGENT']);
		header("location: konsultasifm.php");
}
else
echo "<div style='margin:auto; margin-top:200px;' align=center>Username Dan Password Tidak Sesuai !</div>";
echo "<div align=center><a href='sign-in.php'>Coba Lagi</a></div>";      
?>