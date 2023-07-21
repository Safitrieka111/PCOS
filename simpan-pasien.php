<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
  <title>Pakar:PCOS-CBR</title>
  <link rel="shortcut icon" href="images/icon.png" type="image/x-icon" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width">        
  <link rel="stylesheet" href="assets/css/templatemo_main.css">
<!-- 
Dashboard Template 
http://www.templatemo.com/preview/templatemo_415_dashboard
-->
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){

});
</script>
</head>
<body>
  <div id="main-wrapper">
    <div class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <div class="logo"><h1><a href="index.php">Dashboard - Login Pasien</a></h1></div>
      </div>   
    </div>
    <div class="template-page-wrapper">

      <form class="form-horizontal templatemo-signin-form" id="form1" role="form" method="post" action="cek-user.php" >
          <?php 
include "admin/koneksi.php";
$nama = $_POST['nama'];
$umur=$_POST['umur'];
$alamat = $_POST['alamat'];
$password=$_POST['password'];
$NOIP = $_SERVER['REMOTE_ADDR'];
$email=$_POST['email'];
# Validasi Form
if (trim($nama)=="") {
	include "PasienAddFm.php";
	echo "Nama belum diisi, ulangi kembali";
}
elseif (trim($alamat)=="") {
	include "PasienAddFm.php";
	echo "Alamat masih kosong, ulangi kembali";
}
else {
    $NOIP = $_SERVER['REMOTE_ADDR'];

	//$sqldel = "DELETE FROM tmp_pasien WHERE noip='$NOIP'";	mysqli_query($sqldel, $koneksi);
	
	$sql  = " INSERT INTO pasien (nama,umur,alamat,tanggal,email,password) 
		 	  VALUES ('$nama','$umur','$alamat',NOW(),'$email','$password')";
	mysqli_query($con,$sql) or die ("SQL Error 2".mysqli_error());
	//echo "<meta http-equiv='refresh' content='0; url=konsultasifm.php'>";
	if($sql){echo "<center><h3>Selamat ! Registrasi Berhasil, Silahkan Melanjutkan<h3></center>";};
}
?>
        <div class="form-group">
          <div class="col-md-12">
            <label for="username" class="col-sm-2 control-label">&nbsp;</label>
            <div class="col-sm-10">
              <input type="hidden" class="form-control" id="username" name="username" placeholder="Email" value="<?=$email;?>">
            </div>
            <div id="lbluser" style="display:none;" class="alert alert-danger alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                      Username salah..!
                    </div>
          </div>              
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <label for="password" class="col-sm-2 control-label">&nbsp;</label>
            <div class="col-sm-10">
              <input type="hidden" class="form-control" id="password" name="password" value="<?=$password;?>" placeholder="Password">
            </div>
            <div id="lblpassword" style="display:none;" class="alert alert-danger alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                      Password salah..!
                    </div>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <div class="col-sm-offset-2 col-sm-10">
              <input type="submit" value="Lanjutkan Diagnosa &raquo;&raquo;" id="btnlogin" class="btn btn-default">	
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</body>
</html>