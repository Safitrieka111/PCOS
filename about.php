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
		<li><a href="sign-in.php"><span class="glyphicon glyphicon-refresh"></span> <strong>Mulai Diagnosa PCOS</strong></a></li>
        <li><a href="informasi.php"><span class="glyphicon glyphicon-exclamation-sign"></span> Informasi Penyakit</a></li>
        <li class="active"><a href="about.php"><span class="glyphicon glyphicon-text-color"></span><strong>bout Program</strong></a></li>
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
  <h3>Profil</h3>
  <br>
  <p>Sistem pakar diagnosa PCOS adalah sebuah sistem yang dapat melakukan diagnosa kepada user layaknya pakar dengan memberikan pertanyaan berupa gejala-gejala kemudian di proses dengan tahapan metode CBR yang selanjutnya dapat diberikan jenis penyakit dan solusi penanganannya.</p>
  <table width="100%" border="0" align="center" class="table-no-bordered">
  <tr>
    <td width="230" rowspan="7" ><img src="images/user.png"></td>
    <td width="153" height="29"><span class="style7 style13">Nama</span></td>
    <td width="17" align="center"><span class="style13"><strong>:</strong></span></td>
    <td width="664">&nbsp;</td>
  </tr>
  <tr>
    <td height="28"><span class="style7 style13">NIM</span></td>
    <td align="center"><span class="style13"><strong>:</strong></span></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="29"><span class="style7 style13">Prodi</span></td>
    <td align="center"><span class="style13"><strong>:</strong></span></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="29"><span class="style7 style13">Tempat/Tgl Lahir </span></td>
    <td align="center"><span class="style13"><strong>:</strong></span></td>
    <td>&nbsp;</td>
  </tr>
  <tr valign="top">
    <td height="28"><span class="style7 style13">Alamat</span></td>
    <td align="center"><span class="style13"><strong>:</strong></span></td>
    <td>&nbsp;</td>
  </tr>
  <tr valign="top">
    <td height="28">&nbsp;</td>
    <td align="center">&nbsp;</td>
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
