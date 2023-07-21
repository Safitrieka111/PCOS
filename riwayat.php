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
        <li class="active"><a href="riwayat.php"><span class="glyphicon glyphicon-th-list"></span> Riwayat/Hasil Diagnosa</a></li>
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
  <h3>Riwayat Hasil Diagnosa Pasien</h3>
  <table class="table table-striped table-hover table-bordered">
                  <thead>
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
	include "admin/koneksi.php";
	$queryPasien=$con->query("SELECT * FROM pasien WHERE email='$_SESSION[agent_forum_pasien]' ");
	while($dataPasien=$queryPasien->fetch_object()){;
	$iduser=$dataPasien->idpasien;
	}
	$arrPenyakit=array();
	$queryP=$con->query("SELECT * FROM penyakit_solusi"); 
	while($dataP=$queryP->fetch_array()){ $arrPenyakit["$dataP[kd_penyakit]"]=$dataP['nama_penyakit']; }	
	//$sql="SELECT * FROM analisa_hasil";
	$resultP = $con->query(" SELECT * FROM pasien WHERE idpasien='$iduser' ") ;
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
	$strP=$con->query("SELECT * FROM analisa_hasil WHERE idpasien='$iduser' GROUP BY idhasil ");
	while($dataP=$strP->fetch_object()){
		//echo $dataP->kd_penyakit." | "; print_r($arrPenyakit["$dataP->kd_penyakit"]); echo " = ".$dataP->persentase."%<br>";
		echo "ID Diagnosa : ".$dataP->idhasil." Pada Tanggal : $dataP->tanggal <br> ";
		$queryHasil=$con->query("SELECT * FROM analisa_hasil WHERE idpasien='$iduser' AND idhasil='$dataP->idhasil' GROUP BY kd_penyakit ");
		while($dataHasil=$queryHasil->fetch_object()){
			echo $dataHasil->kd_penyakit." => "; print_r($arrPenyakit[$dataHasil->kd_penyakit]); echo " (".$dataHasil->persentase."%)<br>";
			}
			echo "<label class='label label-default'>Gejala yang terjadi :</label>";
			$queryHasil=$con->query("SELECT * FROM analisa_hasil WHERE idpasien='$iduser' AND idhasil='$dataP->idhasil' GROUP BY kd_gejala ");
		while($dataHasil=$queryHasil->fetch_object()){
			echo " ( ".$dataHasil->kd_gejala." ) ";
			} 
			echo "<hr>";
		}
	 ?></td>
   				    </tr><?php }?>                    
                  </tbody>
                </table>
<div class="CSSTableGenerator">

		</div><br><br><br><br>
  <div class="row">
     
  </div>
</div><br>

<footer class="container-fluid text-center">
  <p>Copyright&copy;2022 Allright Reserved </p>
</footer>

</body>
</html>
