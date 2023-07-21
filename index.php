<!DOCTYPE html>
<html lang="en">
<head>
  <title>Pakar-PCOS|CBR</title>
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
		<li class="active"><a href="sign-in.php"><span class="glyphicon glyphicon-refresh"></span> <strong>Mulai Diagnosa PCOS</strong></a></li>
        <li><a href="informasi.php"><span class="glyphicon glyphicon-exclamation-sign"></span> Informasi Penyakit</a></li>
        <li><a href="about.php"><span class="glyphicon glyphicon-text-color"></span>bout Program</a></li>
        </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="admin/sign-in.php"><span class="glyphicon glyphicon-user"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="container">
<div class="jumbotron">
			<center>			
				<h2>Selamat datang di Sistem Pakar Diagnosa (PCOS)</h2>
				<p align="justify"><img src="images/image3.jpg" style="float:left; margin:2px 30px 30px 0px; border-radius:3px 0px 0px 3px;"></p>
				<p align="justify"><strong>Sindrom polikistik ovarium atau polycystic ovarian syndrome (PCOS) adalah gangguan hormon yang terjadi pada wanita di usia subur. Penderita PCOS mengalami gangguan menstruasi dan memiliki kadar hormon maskulin (hormon androgen) yang berlebihan.

Hormon androgen yang berlebih pada penderita PCOS dapat mengakibatkan ovarium atau indung telur memproduksi banyak kantong-kantong berisi cairan. Akibatnya, sel telur tidak berkembang sempurna dan gagal dilepaskan secara teratur.</strong></p>
                <p align="justify">Sistem pakar diagnosa PCOS bertujuan sebagai media konsultasi awal yang membantu menganalisa penyakit dengan mengenali gejala-gejala yang terjadi pada wanita. Untuk mulai diagnosa silahkan klik tombol</p>
<p><a class="btn btn-primary btn-lg" href="sign-in.php" role="button">Mulai Diagnosa PCOS!</a></p>
			</center>
		</div>
</div>


<div class="container text-justify">    
  <h3>&nbsp;</h3>
  <p>&nbsp;</p>
  <br>
  <div class="row">
     
  </div>
</div><br>

<footer class="container-fluid text-center">
  <p>Copyright&copy;2022 Allright Reserved </p>
</footer>

</body>
</html>
