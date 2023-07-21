<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
  <title><?php include "_title.php"; ?></title>
  <link rel="shortcut icon" href="../images/icon.png" type="image/x-icon" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width">        
  <link rel="stylesheet" href="css/templatemo_main.css">
<!-- 
Dashboard Template 
http://www.templatemo.com/preview/templatemo_415_dashboard
-->
</head>
<body>
  <div class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <div class="logo"><h1><?php include "_dashboard.html";?></h1></div>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button> 
      </div>   
    </div>
    <div class="template-page-wrapper">
      <div class="navbar-collapse collapse templatemo-sidebar">
        <ul class="templatemo-sidebar-menu">
          <li>
            
          </li>
          <li ><a href="index.php"><i class="fa fa-home"></i>Dashboard</a></li>
          <li class="sub open">
            <a href="javascript:;">
              <i class="fa fa-database"></i>Master Data <div class="pull-right"><span class="caret"></span></div>
            </a>
            <ul class="templatemo-submenu">
              <li><a href="penyakit.php"><span class="badge pull-right"><?php include "koneksi.php"; $queryNP=mysqli_query($con,"SELECT * FROM penyakit_solusi"); $numNP=mysqli_num_rows($queryNP); echo $numNP;?></span>Data Penyakit & Solusi</a></li>
              <li><a href="gejala.php"><span class="badge pull-right"><?php $queryNP=mysqli_query($con,"SELECT * FROM gejala"); $numNP=mysqli_num_rows($queryNP); echo $numNP;?></span>Data Gejala</a></li>             
            </ul>
          </li>
          <li class="active"><a href="basis_pengetahuan.php"><i class="fa fa-cubes"></i><span class="badge pull-right"><?php $queryNR=mysqli_query($con,"SELECT * FROM relasi"); $numNR=mysqli_num_rows($queryNR); echo $numNR;?></span>Basis Kasus</a></li>
          <li class="sub open">
            <a href="javascript:;">
              <i class="fa fa-database"></i>Laporan<div class="pull-right"><span class="caret"></span></div>
            </a>
            <ul class="templatemo-submenu">
              <li><a href="lapgejala.php">Laporan Gejala</a></li>
              <li><a href="lapuser.php"><span class="badge pull-right"><?php $queryNP3=mysqli_query($con,"SELECT * FROM pasien"); $numNP3=mysqli_num_rows($queryNP3); echo $numNP3;?></span>Laporan User</a></li>            
            </ul>
          </li>
          <li><a href="manage_user.php"><i class="fa fa-users"></i><span class="badge pull-right">&nbsp;</span>Manage Users</a></li>
          <li><a href="javascript:;" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-sign-out"></i>Logout</a></li>
        </ul>
      </div><!--/.navbar-collapse -->

      <div class="templatemo-content-wrapper">
        <div class="templatemo-content">
          <ol class="breadcrumb">
            <li><a href="index.php">Admin Panel</a></li>
            <li class="active">Rule Case Based Reasoning</li>
          </ol>
          <h1>Data Rule | Basis Pengetahuan</h1>
          <!-- Trigger the modal with a button -->
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Data Penyakit & Solusi</h4>
      </div>
      <div class="modal-body">
         <form method="post" action="simpanpenyakit.php">
<div class="form-group">
  <label for="kdpenyakit">KD Penyakit :</label>
  <input type="text" class="form-control" id="kdpenyakit" name="kdpenyakit">
</div>
  <div class="form-group">
    <label for="nama_penyakit">Nama Penyakit :</label>
    <input type="text" class="form-control" id="nama_penyakit" name="nama_penyakit">
  </div>
  <div class="form-group">
  <label for="definisi">Definisi Penyakit :</label>
  <textarea class="form-control" rows="3" id="definisi" name="definisi"></textarea>
  </div>
   <div class="form-group">
  <label for="solusi">Solusi Penyakit :</label>
  <textarea class="form-control" rows="3" id="solusi" name="solusi"></textarea>
  </div> 
  <button type="submit" class="btn btn-default">Simpan</button>
</form> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
                   <div class="row">
            <div class="col-md-12">
              <div class="table-responsive">
  <div class="konten">
<form id="form1" name="form1" method="post" action="relasisim.php" enctype="multipart/form-data"><div>
  <table class="tab" width="528" border="0" align="center" cellpadding="4" cellspacing="1" bordercolor="#F0F0F0" bgcolor="#CCCC99">
      <tr bgcolor="#FFFFFF">
        <td>Kode</td>
        <td><label>
        <select name="TxtKdPenyakit" id="TxtKdPenyakit">
          <option value="NULL">[ Daftar Penyakit ]</option>
          <?php 
	$resultP=$con->query(" SELECT * FROM penyakit_solusi ORDER BY kd_penyakit ");
	while ($datap=$resultP->fetch_array()) {
		if ($datap['kd_penyakit']==$kdsakit) {
			$cek ="selected";
		}
		else {
			$cek ="";
		}
		echo "<option value='$datap[kd_penyakit]' $cek>$datap[kd_penyakit]&nbsp;|&nbsp;$datap[nama_penyakit]</option>";
	}
  ?>
        </select>
        </label></td>
      </tr>
      <tr bgcolor="#FFFFFF">
        <td width="124">Gejala</td>
        <td width="224">
          <select name="TxtKdGejala" id="TxtKdGejala">
            <option value="NULL">[ Daftar Gejala]</option>
            <?php 
	$resultG=$con->query(" SELECT * FROM gejala ORDER BY kd_gejala ");
	while ($datag=$resultG->fetch_array()) {
		if ($datag['kd_gejala']==$kdgejala) {
			$cek ="selected";
		}
		else {
			$cek ="";
		}
		echo "<option value='$datag[kd_gejala]' $cek>$datag[kd_gejala]&nbsp;|&nbsp;$datag[gejala]</option>";
	}
  ?>
          </select>
         </td>
      </tr>
      <tr bgcolor="#FFFFFF">
        <td>Bobot</td>
        <td><select name="txtbobot" id="txtbobot">
        <option value="0">[ Bobot Penyakit ]</option>
        <option value="1">1 | Ringan</option>
        <option value="2">2 | Sedang</option>
        <option value="3">3 | Berat</option>
        </select></td>
      </tr>
      <tr bgcolor="#FFFFFF">
        <td>&nbsp;</td>
        <td><input type="submit" name="Submit" value="Simpan" /></td>
      </tr>
    </table>
  </div>
</form>
<table class="table table-striped table-hover table-bordered">
  <tr>
    <th width="28"><strong>No</strong></th>
    <th width="349"><strong>Gejala</strong></th>
    <th width="148"><strong>Nama Penyakit</strong><span style="float:right; margin-right:25px;"><strong></strong></span></th>
    </tr>
    <?php
    $resultR=$con->query(" SELECT relasi.kd_gejala,relasi.kd_penyakit,penyakit_solusi.kd_penyakit,penyakit_solusi.nama_penyakit AS penyakit FROM relasi,penyakit_solusi WHERE penyakit_solusi.kd_penyakit=relasi.kd_penyakit GROUP BY relasi.kd_penyakit ");
	$no=0;
	while($row=$resultR->fetch_array()){
	$idpenyakit=$row['kd_penyakit'];
	$no++;
	?>
  <tr bgcolor="#FFFFFF" bordercolor="#333333">
    <td valign="top"><?php echo $no;?></td>
    <td valign="top"><?php
    //$query2=mysql_query("SELECT relasi.kd_gejala,gejala.kd_gejala FROM relasi,gejala WHERE gejala.kd_gejala='$idpenyakit'")or die(mysql_error());
	//$query2=mysql_query("SELECT relasi.kd_gejala FROM relasi WHERE relasi.kd_penyakit='$idpenyakit'")or die(mysql_error());
	$query2=$con->query("SELECT relasi.id_relasi,relasi.kd_gejala,relasi.bobot,relasi.kd_penyakit,gejala.gejala AS namagejala FROM relasi,gejala WHERE relasi.kd_penyakit='$idpenyakit' AND gejala.kd_gejala=relasi.kd_gejala");
	while ($row2=$query2->fetch_array()){
		$kd_gej=$row2['kd_gejala'];
		$kd_pen=$row2['kd_penyakit'];
		echo "<table width='100%' border='0' cellpadding='4' cellspacing='1' bordercolor='#F0F0F0' bgcolor='#DBEAF5'>";
		echo "<tr bgcolor='#FFFFFF' bordercolor='#333333'>";
		echo "<td width='50'>$row2[kd_gejala]</td>";
		echo "<td width='300'>$row2[namagejala]</td>";
		echo "<td width='50'>$row2[bobot]</td>";
		echo "<td width='20'><a title='Edit Relasi' href='edit_relasi.php?id_relasi=$row2[id_relasi]&kd_penyakit=$row2[kd_penyakit]&kd_gejala=$row2[kd_gejala]'>Edit</a></td>";
		echo "<td width='20'><a title='Hapus Relasi' style='cursor:pointer;' onclick='return konfirmasi($row2[id_relasi])'>Hapus</a></td>";
		echo "</tr>";
		echo "</table>";
		}
	?>      <br /></td>
    <td><?php echo $row['kd_penyakit'];?>
      &nbsp;|&nbsp;<strong>
      <?php echo $row['penyakit'];?>
      </strong></td>
    </tr><?php } ?>
</table>
</div>
  </div>
</form>

</div>
                
              </div>
                
            </div>
          </div>

          <div class="row"></div>
          <div class="templatemo-panels">
            <div class="row"></div>
            <div class="row"></div> 
          </div>    
        </div>
      </div>
      <!-- Modal -->
      <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              <h4 class="modal-title" id="myModalLabel">Are you sure you want to sign out?</h4>
            </div>
            <div class="modal-footer">
              <a href="sign-in.php" class="btn btn-primary">Yes</a>
              <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal Hapus Data-->
      <div class="modal fade" id="confirmModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              <h4 class="modal-title" id="myModalLabel">Apakah Anda Ingin Hapus Data?</h4>
            </div>
            <div class="modal-footer">
              <a href="hpspenyakit.php" class="btn btn-primary">Ya</a>
              <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
            </div>
          </div>
        </div>
      </div>
      <footer class="templatemo-footer">
        <div class="templatemo-copyright">
          <p>Copyright &copy; 2022 All Right Reserved</p>
        </div>
      </footer>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/Chart.min.js"></script>
    <script src="js/templatemo_script.js"></script>
    <script type="text/javascript">
	function konfirmasi(id_relasi){
	var kd_hapus=id_relasi;
	var url_str;
	url_str="hapus_relasi.php?id_relasi="+kd_hapus;
	var r=confirm("Yakin ingin menghapus data..?"+kd_hapus);
	if (r==true){   
		window.location=url_str;
		}else{
			//alert("no");
			}
	}
    // Line chart
    var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
    var lineChartData = {
      labels : ["January","February","March","April","May","June","July"],
      datasets : [
      {
        label: "My First dataset",
        fillColor : "rgba(220,220,220,0.2)",
        strokeColor : "rgba(220,220,220,1)",
        pointColor : "rgba(220,220,220,1)",
        pointStrokeColor : "#fff",
        pointHighlightFill : "#fff",
        pointHighlightStroke : "rgba(220,220,220,1)",
        data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
      },
      {
        label: "My Second dataset",
        fillColor : "rgba(151,187,205,0.2)",
        strokeColor : "rgba(151,187,205,1)",
        pointColor : "rgba(151,187,205,1)",
        pointStrokeColor : "#fff",
        pointHighlightFill : "#fff",
        pointHighlightStroke : "rgba(151,187,205,1)",
        data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
      }
      ]

    }

    window.onload = function(){
      var ctx_line = document.getElementById("templatemo-line-chart").getContext("2d");
      window.myLine = new Chart(ctx_line).Line(lineChartData, {
        responsive: true
      });
    };

    $('#myTab a').click(function (e) {
      e.preventDefault();
      $(this).tab('show');
    });

    $('#loading-example-btn').click(function () {
      var btn = $(this);
      btn.button('loading');
      // $.ajax(...).always(function () {
      //   btn.button('reset');
      // });
  });
  </script>
</body>
</html>