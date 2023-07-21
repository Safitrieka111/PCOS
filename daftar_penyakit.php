<!DOCTYPE html>
<html lang="en">
<head>
  <title>KelainanKelamin|CBR</title>
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
      <a class="navbar-brand" href="index.php"><?php include("_header.php");?></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
		<li><a href="sign-in.php"><span class="glyphicon glyphicon-asterisk"></span> Proses Diagnosa</a></li>
        <li><a href="informasi.php"><span class="glyphicon glyphicon-send"></span> Informasi</a></li>
        <li><a href="about.php"><span class="glyphicon glyphicon-user"></span> Profil</a></li>
        <li class="active"><a href="daftar_penyakit.php"><span class="glyphicon glyphicon-th-list"></span> Daftar Penyakit</a></li>
        </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="admin/sign-in.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
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
  <h3>Daftar Penyakit Dalam Sistem</h3>
  <br>
  <p>Berikut adalah daftar penyakit yang terdapat dalam sistem, dan mampu dilakukan diagnosa oleh sistem sebagai berikut :</p>
  <table class="table table-striped table-hover table-bordered" >
                <thead>
  	<tr > 
    <th width="23" ><b>#</b></th>
    <th width="244" ><strong>Deskripsi  Penyakit</strong></th>
  </tr></thead>
  <?php 
  	include "admin/koneksi.php";
	$sql = "SELECT * FROM penyakit_solusi ORDER BY kd_penyakit";
	$qry = mysqli_query($con,$sql) or die ("SQL Error".mysqli_error());
	$no=0;
	while ($data=mysqli_fetch_array($qry)) {
	$no++;
  ?>
  <tbody>
  <tr> 
    <td><div align="center"><?php echo $no; ?></div> </td>
    <td><div align="left">
      <div align="left"><?php echo "<h3><em>$data[nama_penyakit]</em></h3>"; ?></div>
      <ul>
      	<li><label>Definisi Penyakit :</label><p class="text-info"><?php echo "$data[definisi]";?></p></li>
        <li><label>Solusi :</label><p class="text-warning"><?php echo "$data[solusi]";?></p>
    </li>
      </ul>
      
      </td>
  </tr></tbody>
  <?php
  }
  ?>
</table>
  <div class="row">
     
  </div>
</div><br>

<footer class="container-fluid text-center">
  <p>Copyright&copy;2022 Allright Reserved </p>
</footer>

</body>
</html>
