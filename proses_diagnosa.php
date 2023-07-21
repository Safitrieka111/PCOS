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
      <script type="text/javascript" src="assets/js/jquery.truncatable.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    // Configure/customize these variables.
    var showChar = 100;  // How many characters are shown by default
    var ellipsestext = "...";
    var moretext = "Detail&raquo;&raquo;";
    var lesstext = "TampilSedikit";
    

    $('.more').each(function() {
        var content = $(this).html();
 
        if(content.length > showChar) {
 
            var c = content.substr(0, showChar);
            var h = content.substr(showChar, content.length - showChar);
 
            var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';
 
            $(this).html(html);
        }
 
    });
 
    $(".morelink").click(function(){
        if($(this).hasClass("less")) {
            $(this).removeClass("less");
            $(this).html(moretext);
        } else {
            $(this).addClass("less");
            $(this).html(lesstext);
        }
        $(this).parent().prev().toggle();
        $(this).prev().toggle();
        return false;
    });
	//show hide detail
	$("#tampilRumus").click(function(){
		$("#rumus1").fadeIn();
		$("#tampilRumus").fadeOut();
		$("#hideRumus").fadeIn();
		});
	$("#hideRumus").click(function(){
		$("#rumus1").fadeOut();
		$("#tampilRumus").fadeIn();
		$("#hideRumus").fadeOut();
		});
});
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
<div class="konten">
<table width="100%" border="0" bgcolor="#0099FF" cellspacing="1" cellpadding="4" bordercolor="#0099FF">
  <tr bgcolor="#ffffff">
    <td height="32"  style="color:#C60;">&nbsp;</td>
  </tr>
  <tr bgcolor="#ffffff">
    <td height="32"  style="color:#C60;"><table width="100%" border="1">
  <tr>
    <td>
      <?php
	 //include file koneksi database
    include "admin/koneksi.php";
	//mengambil data gejala yang dipilih oleh user pada tabel tmp_gejala untuk ditampilkan
	echo "<div style='background-color:#6C9; padding:12px 2px 12px 5px; color:#ffffff;'><strong>GEJALA YANG DIALAMI</strong></div>";
	$query_gejala_input=mysqli_query($con,"SELECT gejala.gejala AS namagejala,tmp_gejala.kd_gejala FROM gejala,tmp_gejala WHERE tmp_gejala.kd_gejala=gejala.kd_gejala");
	$nogejala=0;
	//melakukan perulangan untuk menampilkan data gejala terpilih
	while($row_gejala_input=mysqli_fetch_array($query_gejala_input)){
		$nogejala++;
		echo "<li style='list-style:none; font-size:9pt;'><img src='images/checkbox.jpg' width='20' height='20'><strong>".$row_gejala_input['kd_gejala']."|".$row_gejala_input['namagejala']. "</strong></li>";
		}
	?>
      <p></p></td>
    </tr>
</table>
</td>
  </tr>
  <tr bgcolor="#ffffff">
    <td height="32" style="font-family:'Courier New', Courier, monospace;">
     <div id="rumus1" class="rumus1" style="display:none;"><div>
    <?php
	//proses awal untuk menampilkan alur perhitungan case based reasoning
    echo "<h4><strong>Proses Perhitungan Dengan Case Based Reasoning (CBR)</strong></h4><hr>";
	echo "<p style='font-size:12pt;'>Mencari Data Relasi Dari Gejala Yang dipilih, adalah sebagai berikut : </p>";
	//melakukan select data pada tabel tmp_gejala
	$queryGKasusBaru=mysqli_query($con,"SELECT * FROM tmp_gejala");
	//me retrive variabel array gejala pada tabel tmp_gejala
	$arrKasusBaru=array();
	$arrSumBobotBaru=array();
	$arrNtotal=array();
	//melakukan perulangan 	query tmp_gejala untuk di masukkan dalam variabel arrKasusBaru
	while($dataGKasusBaru=mysqli_fetch_array($queryGKasusBaru)){
		$arrKasusBaru[]=$dataGKasusBaru['kd_gejala'];
		}
	//deklarasi varabel array bobotLama
	$arrBobotLama=array();
	//menampilkan form gejala yang dipilih oleh user
	echo "<div style='border:1px solid blue;'>";
	echo "<p style='font-size:12pt;'>Berikut ini adalah gejala yang dipilih, ini dinamakan dengan kasus baru :</p>";
	//perulangan untuk menampilkan kasusBaru
	foreach($arrKasusBaru as $kdGejala){
		print_r($kdGejala); echo "<br>";
		} echo "</div>";
	//mengamil data pada tabel relasi berdasarkan gejala yang di pilih pada tabel tmp_gejala
	$query_relasi=mysqli_query($con,"SELECT * FROM relasi WHERE kd_gejala IN(SELECT kd_gejala FROM tmp_gejala) GROUP BY kd_penyakit ASC");
	//melakukan perulangan data query relasi
	while($dataRelasi=mysqli_fetch_array($query_relasi)){
		echo "<p style='font-size:12pt;'><strong>Data Penyakit Yang Memiliki Relasi Ke Gejala Yang Terpilih Adalah : </strong></p>";
		echo $dataRelasi['kd_penyakit']."<br>";
		//menampilkan data gejala bobot kasus lama dan kasus baru
		echo "<p style='font-size:12pt;'>Cari Data Gejala dan Bobot di Kasus Lama Pada Jenis Penyakit $dataRelasi[kd_penyakit]</p>";
		//mengamil data pada tabel relasi berdasarkan kdpenyakit menjadikannya sebagai kasus lama
			$queryGKasusLama=mysqli_query($con,"SELECT * FROM relasi WHERE kd_penyakit='$dataRelasi[kd_penyakit]' ORDER BY kd_penyakit ASC");
			echo "<div class='kasusLama'>";
			echo "<p style='font-size:12pt;'>Kasus Lama (basis pengetahuan pakar)</p>";
			//melakukan perulangan untuk mengambil data gejala pada kasus lama tabel relasi
			while($dataGKasusLama=mysqli_fetch_array($queryGKasusLama)){
				echo $dataGKasusLama['kd_gejala']." | bobot[$dataGKasusLama[bobot]]"."<br>";
				//memasukkan data kedalam variabel array $arrBobotLama per gejala
				$arrBobotLama[$dataGKasusLama['kd_gejala']]=$dataGKasusLama['bobot'];
				$kdGLama=$dataGKasusLama['kd_gejala']; 
				}
			echo "</div>";
			//form menampilkan kasus baru		
			echo "<div class='kasusBaru'>";
			echo "<p style='font-size:12pt;'>Kasus Baru (gejala dipilih)</p>";
			//melakukan perulangan untuk menampilkan gejala pada kasus baru
				foreach($arrKasusBaru as $kdGejala){
				print_r($kdGejala); echo "<br>";
				}
			echo "</div>";
			//menampilkan form untuk perhitungan bobot lama
			echo "<div class='Cleared'>";
			//melakukan Sum pada bobot kasus lama
				$sumBobotLama=array_sum($arrBobotLama);
				echo "<p>Jumlah Bobot Kasus Lama = ".$sumBobotLama."</p>"; 
			echo "</div>";
			//menampilkan perhitungan Nilai similarity
			echo "<p style='font-size:12pt;'>Menghitung Nilai Similarity :</p>";
			//menampilkan referensi rumus similarity di ambil dari folder images/rumus.jpg
			echo "<img width='400' style='border:1px solid #ccffcc;' src='images/rumus.jpg'><br>";
			echo "<p style='font-size:12pt;'>Similarity(X,$dataRelasi[kd_penyakit])="; $kd_penyakit=$dataRelasi['kd_penyakit'];
			//mengamil last array key, untuk ditampilkan pada rumus
					$arrayKeys = array_keys($arrBobotLama);
					$lastArrayKey = array_pop($arrayKeys);
					//menampilkan form perhitungan rumus
					echo "<span style='border-bottom:1px solid #000000;'><strong>&nbsp;</strong>";
					foreach($arrBobotLama as $kdG=>$bobotLama){
							if(in_array($kdG,$arrKasusBaru)){
								//rumus kali bobot , jika bobot adalah 1
								$kaliBobot=1*$bobotLama; $arrSumBobotBaru[]=$kaliBobot;
								if($kdG == $lastArrayKey) {
									echo "(1*$bobotLama)";
									//menampilkan rumus 1*bobotLama
									 }else{ echo "(1*$bobotLama)+"; }
								
							}else { 
							//rumus kali bobot, jika bobot adalah 0
								$kaliBobot=0*$bobotLama; $arrSumBobotBaru[]=$kaliBobot;
								if($kdG == $lastArrayKey) {
									//menampilkan rumus 0*bobotLama
									echo "(0*$bobotLama)";
									 }else{ echo "(0*$bobotLama)+"; }
							}
						} 
						//jumlah total nilai pembilang pada kasus baru
						$jumlahAtas=array_sum($arrSumBobotBaru);
						//menampilkan hasil pembilang kasus baru
						echo "<strong>&nbsp;</strong> = $jumlahAtas</span><br>";
						echo "<span style='margin-left:200px;'>";
						//perulangan bobot lama,ditampilkan dalam tanda +
								foreach($arrBobotLama as $gBaru=>$bobotBaru){
									if($gBaru == $lastArrayKey) {
									echo "$bobotBaru";
									 }else{ echo "$bobotBaru+"; }
									}
						echo "</span> ";
						//jumlah penyebut bobot kasus lama
						$jumlahBawah=array_sum($arrBobotLama);
						echo "= $jumlahBawah<br>";
						//jumlah totalnilai similarity
						$totalNilai=$jumlahAtas/$jumlahBawah;
						echo "<span style='margin-left:145px;'>= $totalNilai</span>";
			echo "</p>";
			//memasukkan nilai total kedalam variabel array $arrNtotal per penyakit hasil diagnosa
			$arrNtotal[$kd_penyakit]=$totalNilai;
			//mengosongkan nilai variabel
			unset($arrBobotLama); unset($sumBobotLama);	unset($arrSumBobotBaru);
		}
	?> </div></div> 
    </td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td align="center">
    <span><a id="tampilRumus" href="#"><strong>Tampilkan Perhitungan Manual CBR&raquo;&raquo;</strong></a></span>
    <span><a id="hideRumus" href="#" style="display:none;"><strong>&laquo;&laquo;Tutup Rumus Manual CBR</strong></a></span>
    <div style='background-color:#F90; text-align:center; padding:12px 2px 12px 5px; color:#ffffff;'><strong>HASIL  DIAGNOSA</strong></div>
<p style="color:#06F; font-weight:bold; font-size:12pt;">BERDASARKAN HASIL DIAGNOSA MAKA DIPEROLEH HASIL SEBAGAI BERIKUT :</p>
<?php
//query untuk mengambil data pasien dan dimasukkan dalam variabel
$query_temp=mysqli_query($con,"SELECT * FROM pasien WHERE email='$_SESSION[agent_forum_pasien]' ") or die(mysqli_error());
$row_pasien=mysqli_fetch_array($query_temp)or die(mysqli_error());
$idpasien=$row_pasien['idpasien'];
//mengurutkan nilai total dan menjumlah nilai total
arsort($arrNtotal);
$TotalAkhir=array_sum($arrNtotal);
//melaikuan perulangan untuk mengambil data hasil penyakit
$queryH=mysqli_query($con,"SELECT * FROM analisa_hasil WHERE idpasien='$idpasien' GROUP BY idhasil ");
$numH=mysqli_num_rows($queryH);
if($numH=="0"){ echo "nol"; $idHasil="H$idpasien"."-1"; }else{ $increment=$numH+1;  $idHasil="H$idpasien"."-".$increment; }
foreach($arrNtotal as $kdK=>$Nilai){
	$queryK=mysqli_query($con,"SELECT * FROM penyakit_solusi WHERE kd_penyakit='$kdK' ");
	$dataK=mysqli_fetch_array($queryK);
	//mengubah konfersi nilai similarity ke persen
	$persen=$Nilai*100;
	if($persen<79){ echo "ringan solusi S1"; $jenis='S1';
		}elseif($persen<90){ echo "sedang solusi S2"; $jenis='S2';
		}else{ echo "tinggi solusi S3"; $jenis='S3';}
	//menampilkan data hasil penyakit dan solusi secara detail ke user
	echo "<h3>[$kdK]<strong>".$dataK['nama_penyakit']."</strong> dengan Nilai = ".substr($Nilai,0,5).", Persentase ".substr($persen,0,5)."%</h3>";
	echo "<p align='justify' class='more' style='font-size:13pt; margin:auto; width:90%;'><strong>Definisi Penyakit :</strong> $dataK[definisi]</p><br>";
	echo "<p align='left' class='more2' style='font-size:13pt; margin:auto; width:90%;'><strong>Solusi : </strong>";
	//mengambil data solusi pada tabel solusi
	if($jenis=="S1"){ 	
	$querySol=mysqli_query($con,"SELECT * FROM solusi WHERE kdsolusi='$jenis' ");
 	}
 	if($jenis=="S2"){
			$querySol=mysqli_query($con,"SELECT * FROM solusi WHERE kdsolusi IN('S1','S2') ");
		}
	if($jenis=="S3"){
			$querySol=mysqli_query($con,"SELECT * FROM solusi WHERE kdsolusi IN('S1','S2','S3') ");
		}
	echo "<ul style='list-style:decimal;text-align:left;'>";
	while($dataSol=mysqli_fetch_array($querySol)){
		echo "<li>$dataSol[solusi]</li>";
		}
	echo "</ul>";
	echo "</p><hr>";
	//menginput data hasil diagnosa, gejala dan penyakit kedalam tabel analisa_hasil
	$queryTMPGejala=mysqli_query($con,"SELECT * FROM tmp_gejala");
	while($TMPGejala=mysqli_fetch_array($queryTMPGejala)){
		//query untuk menyimpan hasil diagnosa ke tabel analisa_hasil
		$query_hasil=mysqli_query($con,"INSERT INTO analisa_hasil(idhasil,idpasien,kd_penyakit,kd_gejala,persentase,tanggal) VALUES ('$idHasil','$idpasien','$kdK','$TMPGejala[kd_gejala]','".substr($persen,0,5)."', NOW() )" );
		}
	
	}
	// menghilangkan nilai variabel
	unset($arrNtotal);
	
?>
</td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td>&nbsp;</a>
    </td>
  </tr>
</table>
</div>
  
<br><br><br><br>
  <div class="row">
     
  </div>
</div><br>

<footer class="container-fluid text-center">
  <p>Copyright&copy;2022 Allright Reserved </p>
</footer>

</body>
</html>