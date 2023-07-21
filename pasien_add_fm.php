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
      <a class="navbar-brand" href="index.php"><?php include("_header.php");?></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
		<li class="active"><a href="sign-in.php"><span class="glyphicon glyphicon-refresh"></span> <strong>Mulai Diagnosa PCOS</strong></a></li>
        <li><a href="informasi.php"><span class="glyphicon glyphicon-exclamation-sign"></span> <strong>Informasi Penyakit</strong></a></li>
        <li><a href="about.php"><span class="glyphicon glyphicon-text-color"></span>bout Program</a></li>
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
  <h3>Masukkan Data Registrasi</h3>
<form onSubmit="return validasi(this)" method="post" name="form1" target="_self" action="simpan-pasien.php">
<table class="tab" width="90%"  border="0" cellpadding="3" cellspacing="3">
    <tr> 
      <td colspan="2"><div align="center"></div></td>
    </tr>
    <tr> 
      <td>Nama</td>
      <td> 
      <input name="nama" id="nama" type="text" size="35" maxlength="30"></td>
    </tr>
    <tr>
      <td>Umur</td>
      <td><input name="umur" id="umur" type="text" size="35" maxlength="3"></td>
    </tr>
    <tr> 
      <td width="124">Alamat</td>
      <td width="366"> 
        <input name="alamat" id="alamat" type="text" size="35" maxlength="60"></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><input type="text" name="email" id="email" size="25" maxlength="25"></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><input type="password" name="password" id="password" size="25" maxlength="25"></td>
    </tr>
    <tr>
      <td>re-Password</td>
      <td><input type="password" name="password2" id="password2" size="25" maxlength="25"></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" class="btn btn-primary" name="Submit" value="Daftar">
        <input type="reset" class="btn btn-warning" name="Submit2" value="Reset" /></td>
    </tr>
  </table>
</form>  
  <div class="row">
     
  </div>
</div><br>

<footer class="container-fluid text-center">
  <p>Copyright&copy;2022 Allright Reserved </p>
</footer>

</body>
</html>
