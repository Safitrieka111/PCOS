<?php include "session.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Pakar:PCOS|CBR</title>
  <link rel="shortcut icon" href="images/icon.png" type="image/x-icon" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script type="text/javascript">
$(document).ready(function(){
	$("#TxtNama").focus();
	})
function validasi(form){
	if(form.pass1.value==""){
		alert("Masukkan Password Baru !");
		form.pass1.focus(); return false;
		}else if(form.pass2.value==""){
		alert("Masukkan Konfirmasi Password !");
		form.pass2.focus(); return false;	
		}
		var p1,p2;
		p1=form.pass1.value; p2=form.pass2.value;
		if(p1==p2){
			form.submit();
		} else{ 
				document.getElementById("label").innerHTML="Password Tidak Sama, Silahkan Masukkan Kembali !"; 
		form.pass1.value="";
		form.pass2.value="";
		return false;

		 }
		//form.submit();
	}
</script>
  <style>
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }

    .carousel-inner img {
      width: 100%; /* Set width to 100% */
      min-height: 200px;
    }

    /* Hide the carousel text when the screen is less than 600 pixels wide */
    @media (max-width: 600px) {
      .carousel-caption {
        display: none; 
      }
    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header" style="height:70px;">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href=""><?php include("_header.php");?></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
		<li><a href="konsultasifm.php"><span class="glyphicon glyphicon-refresh"></span> Diagnosa PCOS</a></li>
        <li><a href="riwayat.php"><span class="glyphicon glyphicon-th-list"></span> Riwayat/Hasil Diagnosa</a></li>
        <li class="active"><a href="akun.php"><span class="glyphicon glyphicon-user"></span> Akun </a></li>
        <li><a href="list-penyakit.php"><span class="glyphicon glyphicon-th-list"></span> Daftar Penyakit</a></li>
        </ul>
      <ul class="nav navbar-nav navbar-right">
      <li><a href=""><span class="text-danger">Anda Login Sebagai : <?php echo $_SESSION['agent_forum_pasien'];?>&nbsp;&nbsp;</span></a></li>
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="container">
<div class="row">
  <div class="col-sm-8">
    
  </div>
  
</div>
<hr>
</div>


<div class="container text-justify">    
  <h3>Ganti Password Pengguna</h3>
<form name="form1" method="post" onSubmit="return validasi(this)" action="updatepass.php" >
<label>Masukkan Password Baru</label><br />
<input name="pass1" type="text" id="pass1" size="30"><br /><br />
<label>Konfirmasi Password</label><br />
<input name="pass2" type="password" id="pass2" size="30"><br /><br />
<label id="label" style="font-weight:bold; color:#F00;"></label><br />
<input type="submit" name="Submit" value="Ganti Password"><br />
    </form>
<br><br><br><br>
  <div class="row">
     
  </div>
</div><br>

<footer class="container-fluid text-center">
  <p>Copyright&copy;2022 Allright Reserved </p>
</footer>

</body>
</html>
