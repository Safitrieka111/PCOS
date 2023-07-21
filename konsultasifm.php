<?php include "session.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>PCOS|CBR</title>
  <link rel="shortcut icon" href="images/icon.png" type="image/x-icon" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
		<li class="active"><a href="konsultasifm.php"><span class="glyphicon glyphicon-refresh"></span> Diagnosa PCOS</a></li>
        <li><a href="riwayat.php"><span class="glyphicon glyphicon-th-list"></span> Riwayat/Hasil Diagnosa</a></li>
        <li><a href="akun.php"><span class="glyphicon glyphicon-user"></span> Akun </a></li>
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
  <h3>Proses Diagnosa PCOS</h3>
                <?php include "admin/koneksi.php"; ?>
<table width="750" border="1" align="center" class="table table-striped table-hover table-bordered">
  <tr>
    <td width="786" ><center>
    <strong>Pilihlah Gejala Yang Dialami Oleh Pasien !</strong>
    </center></td>
  </tr>
  <tr>
    <td style="padding:3px 3px 7px 3px;">
<form  method="post" name="form" target="_self" action="konsulperiksa.php">
  <table width="100%" border="0" align="center" cellpadding="2" cellspacing="1" bordercolor="#FFFFFF">

    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
	<tr><td width="504" >  
    <?php
	include "admin/koneksi.php";
	$query=mysqli_query($con,"SELECT * FROM gejala") or die("Query Error..!" .mysqli_error);
	while ($row=mysqli_fetch_array($query)){
	?>
    <table width="90%" border="0">
  <tr>
    <td valign="middle" align="center" width="9%"><input type="checkbox" name="gejala[]" id="gejala" value="<?php echo $row['kd_gejala'];?>"></td>
    <td width="91%"><?php echo "[".$row['kd_gejala']."] ".$row['gejala'];?></td>
  </tr>
</table>
		 <?php } ?>
       </td> </tr>
	<tr>  <td width="504" align="center" bgcolor="#FFFFFF"><br><input class="btn btn-primary" type="submit" name="Submit" value="Proses Diagnosa">	  <input class="btn btn-default" type="reset" value="Reset"><br><br></td>
    </tr>
  </table>
</form>
<p style="font-weight:bold; text-align:center; background:#06F;">&nbsp;</p></td>
  </tr>
  <tr  >
    <td>&nbsp;</td>
  </tr>
</table>
  
<br><br><br><br>
  <div class="row">
     
  </div>
</div><br>

<footer class="container-fluid text-center">
  <p>Copyright&copy;2022 Allright Reserved </p>
</footer>

</body>
</html>
