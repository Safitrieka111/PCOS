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
//alert('asdkfj');
	var namauser;
	var password;
	$("#username").val("");
	$("#password").val("");
	$("#username").focus();
	// ketika tombol login dikliks
	$("#btnlogin").click (function(){
	namauser=$("#username").val();
	password=$("#password").val();
	if (namauser==''){
		alert("Masukkan Username Anda..!");
		$("#username").focus();
		return false;
		exit();
	}
	if (password==''){
		alert("Masukkan Password Anda..!");
		$("#password").focus();
		return false;
		exit();
	}		
	});
});
</script>
</head>
<body>
  <div id="main-wrapper">
    <div class="bg color imagespcos4.jpg">
    <div class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <div class="logo"><h1><a href="index.php">Dashboard - Login Pasien</a></h1></div>
      </div>   
    </div>
    <div class="template-page-wrapper">
      <form class="form-horizontal templatemo-signin-form" id="form1" role="form" method="post" action="cek-user.php" >
        <div class="form-group">
          <div class="col-md-12">
            <label for="username" class="col-sm-2 control-label">E-mail</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="username" name="username" placeholder="Email">
            </div>
            <div id="lbluser" style="display:none;" class="alert alert-danger alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                      Username salah..!
                    </div>
          </div>              
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <label for="password" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="password" name="password" placeholder="Password">
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
              <input type="submit" value="Sign in" id="btnlogin" class="btn btn-default">	
              <a class="link fa-linkedin" href="pasien_add_fm.php">Registrasi Akun Pasien</a>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</body>
</html>