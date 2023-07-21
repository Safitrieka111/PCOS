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
          <li><a href="index.php"><i class="fa fa-home"></i>Dashboard</a></li>
          <li class="sub open">
            <a href="javascript:;">
              <i class="fa fa-database"></i>Master Data <div class="pull-right"><span class="caret"></span></div>
            </a>
            <ul class="templatemo-submenu">
              <li><a href="penyakit.php"><span class="badge pull-right"><?php include "koneksi.php"; $queryNP=mysqli_query($con,"SELECT * FROM penyakit_solusi"); $numNP=mysqli_num_rows($queryNP); echo $numNP;?></span>Data Penyakit & Solusi</a></li>
              <li><a href="gejala.php"><span class="badge pull-right"><?php $queryNP=mysqli_query($con,"SELECT * FROM gejala"); $numNP=mysqli_num_rows($queryNP); echo $numNP;?></span>Data Gejala</a></li>             
            </ul>
          </li>
          <li><a href="basis_pengetahuan.php"><i class="fa fa-cubes"></i><span class="badge pull-right"><?php $queryNR=mysqli_query($con,"SELECT * FROM relasi"); $numNR=mysqli_num_rows($queryNR); echo $numNR;?></span>Basis Kasus</a></li>
          <li class="sub open">
            <a href="javascript:;">
              <i class="fa fa-database"></i>Laporan<div class="pull-right"><span class="caret"></span></div>
            </a>
            <ul class="templatemo-submenu">
              <li><a href="lapgejala.php">Laporan Gejala</a></li>
              <li><a class="bg-primary"  href="lapuser.php"><span class="badge pull-right"><?php $queryNP3=mysqli_query($con,"SELECT * FROM pasien"); $numNP3=mysqli_num_rows($queryNP3); echo $numNP3;?></span>Laporan User</a></li>            
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
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Laporan</a></li>
            <li class="active">Laporan User</li>
          </ol>
          <h1>Laporan Data Pengguna</h1>
          <a target="_blank" href="cetakLapHasil.php" class="btn btn-default"><img src="../images/print.png">Cetak Laporan</a>
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
                <table class="table table-striped table-hover table-bordered">
                  <thead>
                    <tr>
                      <th width="8%">#</th>
                      <th width="13%">Nama</th>
                      <th width="13%">Umur</th>
                      <th width="13%">Alamat</th>
                      <th width="43%">Hasil Anamnesa</th>
                      <th width="23%">Aksi
                      <input type="hidden" id="texthapus"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
	include "koneksi.php";
	$arrPenyakit=array();
	$queryP=$con->query("SELECT * FROM penyakit_solusi"); 
	while($dataP=$queryP->fetch_array()){ $arrPenyakit["$dataP[kd_penyakit]"]=$dataP['nama_penyakit']; }	
	//$sql="SELECT * FROM analisa_hasil";
	$resultP = $con->query(" SELECT * FROM pasien,analisa_hasil WHERE analisa_hasil.idpasien=pasien.idpasien group by analisa_hasil.idpasien  ORDER BY analisa_hasil.idhasil DESC ") ;
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
	$strP=$con->query("SELECT * FROM analisa_hasil WHERE idpasien='$idp' GROUP BY idhasil ");
	while($dataP=$strP->fetch_object()){
		echo $dataP->kd_penyakit." | "; print_r($arrPenyakit["$dataP->kd_penyakit"]); echo " = ".$dataP->persentase."%<br>";
		echo "ID Diagnosa : ".$dataP->idhasil." Pada Tanggal : $dataP->tanggal <br> ";
		$queryHasil=$con->query("SELECT * FROM analisa_hasil WHERE idpasien='$idp' AND idhasil='$dataP->idhasil' GROUP BY kd_penyakit ");
		while($dataHasil=$queryHasil->fetch_object()){
			echo $dataHasil->kd_penyakit." => "; print_r($arrPenyakit[$dataHasil->kd_penyakit]); echo " (".$dataHasil->persentase."%)<br>";
			}
			echo "<label class='label label-default'>Gejala yang terjadi :</label>";
			$queryHasil=$con->query("SELECT * FROM analisa_hasil WHERE idpasien='$idp' AND idhasil='$dataP->idhasil' GROUP BY kd_gejala ");
		while($dataHasil=$queryHasil->fetch_object()){
			echo " ( ".$dataHasil->kd_gejala." ) ";
			} 
			echo "<hr>";
		}
	 ?></td>
     				  <td><a onClick="return HapusData('<?php echo $data->idpasien;?>');" data-toggle="modal" data-target="#confirmModal2" class="btn btn-link">Delete</a>
                      </td>
                    </tr><?php }?>                    
                  </tbody>
                </table>
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
            <div id="frmSukses" style="display:none;" class="alert alert-success alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                      <strong>Success!</strong> Data Berhasil dihapus.
                    </div>
            <div class="modal-footer">
              <a onClick="return DropData();" class="btn btn-primary">Ya</a>
              <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
            </div>
          </div>
        </div>
      </div>
      <footer class="templatemo-footer">
        <div class="templatemo-copyright">
          <p>Copyright &copy; 2022 Allright Reserved</p>
        </div>
      </footer>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/Chart.min.js"></script>
    <script src="js/templatemo_script.js"></script>
    <script type="text/javascript">
			function HapusData(xidhapus){
		var idhapus=xidhapus; $("#texthapus").val(idhapus);
		}
	function DropData(){
	var data_hapus=$("#texthapus").val();
	var aksi="hasil";
	var datanya="&data_hapus="+data_hapus+"&aksi="+aksi;		//hapus data
		$.ajax({
			url: "hapus.php",
			data : datanya,
			cache : false,
			success : function (msg){
				if(msg=="sukses"){
					$("#frmSukses").show();
					$("#frmSukses").fadeOut(3200);
					window.location.reload();
					 }
				}
			})
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