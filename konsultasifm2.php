<html>
<head>
<title>PakarPisang|DS</title>
<style type="text/css">
.form { width:99%; background:linear-gradient(to left, #FFF, #EEE); border:1px solid #CCC; border-radius:5px 5px; padding:3px 3px 3px 5px;}
.form p{ font-weight:bold; font-size:12pt;}
p { border:0px solid #03F;}
.Y1 { text-align:center; border:1px  solid #C30; background:#F66; float:left; width:220px; }
.Y2 { text-align:center; border:1px  solid #C30; background:#FF9; float:left; width:220px;}

.Y1r2 { text-align:center; border:1px  solid #C30; background:#933;  float:left; width:220px; margin-top:-80px;}
.Y2r2 { text-align:center; border:1px  solid #C30; background:#933;  float:left; width:220px; margin-top:-80px;}

.X1 { text-align:center; border:1px  solid #0F0; background:#0C9; float:left; width:220px;}
.X2 {  text-align:center; border:1px  solid #33C; background:#06F; float:left; width:220px;}

.teta1 { text-align:center; border:1px dashed #C30;  background:linear-gradient(to right, #0CF, #39F);}
.teta2 {  text-align:center; border:1px dashed #9C0; background:linear-gradient(to right, #0CF, #39F);}

.X1baris2 { border:1px solid #36F; }
.densitas { border:2px solid #CC0; padding:3px 3px 3px 3px; text-align:center; display:block; float:left; width:220px;}
.kolom2X { border:1px solid #06C; margin-top:-100px; }
</style>
</head>
<body>
<?php include "admin/koneksi.php"; ?>
<?php include "admin/koneksi2.php"; ?>
<table width="750" border="1" align="center">
  <tr>
    <td width="786"><center>
      <h3>PROSES DIAGNOSA PENYAKIT PADA PARU</h3></center><strong>Pilihlah Gejala Yang Anda Alami..!</strong></td>
  </tr>
  <tr>
    <td>
<form method="post" >
<?php
//-- menampilkan daftar gejala
$arrKDGejala=array();
$arrKDGejalaSelect=array();
$sql="SELECT * FROM tb_gejala ORDER BY id ASC ";
$result=$db->query($sql);
while($row=$result->fetch_object()){
	echo "<input type='checkbox' name='evidence[]' value='{$row->id}'> {$row->kdgejala} | {$row->gejala}<br>";
	$arrKDGejala[]=$row->gejala; //$arrKDGejalaSelect[]=$row->id;
}
?><br>
<center><input type="submit" value="Proses Diagnosa Penyakit"></center>
</form>
<p style="font-weight:bold; text-align:center; background:#06F;"><strong>Menentukan Nilai Densitas (m) Awal</strong></p>
<?php
if(isset($_POST['evidence'])){
	if(count($_POST['evidence'])<2){
		echo "Pilih minimal 2 gejala";
	}else{
		echo "<div class='form'><p>Gejala Yang dipilih :</p>"; 
		$arrKDGejalaSelect=$_POST['evidence'];
		foreach($arrKDGejalaSelect as $kdGSelect){ 
			echo $kdGSelect." | ";
			$queryG=mysql_query("SELECT * FROM tb_gejala WHERE id='$kdGSelect' "); 
			while($dataG=mysql_fetch_array($queryG)){ echo $dataG['gejala']."<br>";}
			}
		echo "</div>";
		$sql = "SELECT GROUP_CONCAT(b.kdpenyakit), a.cf, a.id_evidence
			FROM tb_rules a
			JOIN tb_penyakit b ON a.id_problem=b.id
			WHERE a.id_evidence IN(".implode(',',$_POST['evidence']).") 
			GROUP BY a.id_evidence ORDER BY a.id_evidence DESC ";
		$result=$db->query($sql);
		$evidence=array();
		$gejalaSelect=array();
		while($row=$result->fetch_row()){
			//print_r($row[2]);
			$evidence[]=$row;
			//$gejalaSelect[]=$row[0];
		} $no=0;
		echo "<br>";
		echo "<div class='form'><p>Densitas (m) Awal<p>";
		echo "<table border='1' width='100%'>";
		echo "<tr><td colspan='5'><center>Tabel 1 Densitas (m) Awal</center</td></tr>";
		echo "<tr>";
		echo "<td><strong>No</strong></td>";
		echo "<td><strong>Gejala</strong></td>";
		echo "<td><strong>Penyakit</strong></td>";
		echo "<td><strong>Densitas</strong></td>";
		echo "<td><strong>Plausability</strong></td>";
		echo "</tr>";
		foreach($evidence as $kdgejala){
			echo "<tr>"; $no=$no+1;
			echo "<td>$no</td>";
			echo "<td>"; 
			$queryG=mysql_query("SELECT * FROM tb_gejala WHERE id='$kdgejala[2]' "); 
			$dataG=mysql_fetch_array($queryG); 
			echo $dataG['id']." | ".$dataG['gejala']."<br>";
            echo"</td>";
			echo "<td>"; print_r($kdgejala[0]); echo "</td>";
			echo "<td>"; print_r($kdgejala[1]); echo"</td>";
			echo "<td>"; print_r(1-$kdgejala[1]); echo"</td>"; echo "</tr>";
			}unset($kdgejala);
		echo "</table>";
		echo "</div>";
?>
<p style="font-weight:bold; text-align:center; background:#06F;"><strong>Menentukan Nilai Densitas (m) Baru</strong></p>
<?php
		//--- menentukan environement
		$sql="SELECT GROUP_CONCAT(kdpenyakit) FROM tb_penyakit ";
		$result=$db->query($sql);
		$row=$result->fetch_row();
		$fod=$row[0];
		//echo "M<sub>2</sub>{".$fod."}<br>";
		//--- menentukan nilai densitas
		$densitas_baru=array(); echo "<br>";
echo "<table border='1' width='750'>";
//menghitung nilai densitas (m) baru
		while(!empty($evidence)){ 
echo "<tr><td colspan='3'><center>Tabel 2 :Aturan kombinasi untuk m<sub>3</sub></center</td></tr>";
echo "<tr>";
		//nilai pada Y1 baris atas
		echo "<td width='250'>&nbsp;</td>";
		echo "<td width='250'>";
			$densitas1[0]=array_shift($evidence); 
			echo "<span class='Y1'>M<sub>2</sub> y1"; echo "{"; print_r($densitas1[0][0]); echo "}<br>";
			print_r($densitas1[0][1]); 
			echo "</span>";
		echo "</td>";
		echo "<td width='250'>";
		//nilai pada Y2 baris atas
			$densitas1[1]=array($fod,1-$densitas1[0][1]); 
			echo "<span class='Y2'>M<sub>y2</sub>{&theta;}<br>"; $Y2=1-$densitas1[0][1]; echo " $Y2</span>";
			$densitas2=array();
		echo "</td></tr>";
		echo "<tr>";
		echo "<td>";
			if(empty($densitas_baru)){
				//nilai pada X1 baris 1
				//echo "tidak ada densitas baru<br>";
				$densitas2[0]=array_shift($evidence);
				echo "<span class='X1'>M<sub>1</sub>";
				echo "{"; print_r($densitas2[0][0]); echo "}<br>";
				echo ""; print_r($densitas2[0][1]); echo "<br>";
				 echo "</span><br>"; 
			}else{
				foreach($densitas_baru as $k=>$r){
					//nilai pada X1 baris 2; jika ad densitas baru
					if($k!="&theta;"){
						//print_r($densitas2);echo "<br>";
						$densitas2[]=array($k,$r); 
						//echo "<span class='X1'>[nilai X1 baris 2 ";
						echo "<span class='X1'>m<sub>$m</sub>{";
						//print_r($densitas2[0][0]); echo "<br>";
						//print_r($densitas2[0][1]);
						print_r($k); echo"}<br>"; print_r($r);
						echo "</span>";
					}
				}
			}
		echo "</td>"; //bagian y1
		echo "<td valign='top' colspan='2' rowspan='2'>&nbsp;</td>";
		echo "</tr>";
		echo "<tr>";
		echo "<td valign='top'>";
			$theta=1;
			//nilai X1 baris 2 teta
			foreach($densitas2 as $d) $theta-=$d[1]; echo "<span class='X2'>M<sub></sub>{&theta;}<br>".$theta."</span>";
			$densitas2[]=array($fod,$theta); 
			//print_r($theta);
			//echo"<p>densitas2[0] = ".print_r($densitas2[0][0])." | densitas2[1] = ".print_r($densitas2[0][1])."</p>";
			$m=count($densitas2); echo "count data M = $m";
		echo "</td>";
		//echo "<td colspan='2'>y2&nbsp;</td>"; 
		echo "</tr>";
		echo "<tr>"; 
		echo "<td>x2&nbsp;</td>"; 
		echo "<td colspan='2' valign='top'><div class='kolom2X'>";
			$densitas_baru=array();
			for($y=0;$y<$m;$y++){
				for($x=0;$x<2;$x++){
					if(!($y==$m-1 && $x==1)){
						$v=explode(',',$densitas1[$x][0]);
						$w=explode(',',$densitas2[$y][0]);
						sort($v); 
						sort($w); 
						$vw=array_intersect($v,$w);  //mencari nilai irisan	
						if(empty($vw)){
							echo "<span class='densitas'>kosong";
							$k="&theta;"; echo " $k<br>";
							echo $nilaiX1Y1;
							echo "</span>"; 
						}else{
							//echo "<td rowspan='2'>";
							//echo "<br><span class='teta2'>jika data vw ADA maka tampilkan ";
							$k=implode(',',$vw); //echo "{".print_r($k)."}= $nilaiX1Y1"; 
							echo "<span class='densitas'>";
										$nilaiX1Y1=$densitas1[$x][1]*$densitas2[$y][1]; 
										foreach($vw as $vwHasil){ print_r($vwHasil);} echo "<br>"; print_r($nilaiX1Y1);
										echo "</span>";
						}
						if(!isset($densitas_baru[$k])){
							//echo "data Y1r2";
							//echo "<td> y1 r3 ";
							$densitas_baru[$k]=$densitas1[$x][1]*$densitas2[$y][1];
							//echo "<span class='Y1r2'>Y1r2 = "; 
							$k=implode(',',$vw); //echo $k. "<br>"; 
						}else{
							$densitas_baru[$k]+=$densitas1[$x][1]*$densitas2[$y][1];
							//echo "<p>M <sub>3b</sub> : "; print_r($densitas_baru[$k]);echo"|"; print_r($densitas1[$x][1]);
						}
					}
				} 
			}	echo "<span class='densitas'>&theta;<br>"; $dataX2=$theta; $dataY2=$Y2; $Y3=$dataX2*$dataY2; echo $Y3."</span>";
echo "</div></td></tr>";
echo "<tr>";
echo "<td colspan='3'>";
			echo "<p style=' border:none;'>Merujuk pada rumus [DST-07] evidential conflict-nya belum ada, maka nilainya adalah k=0, sehingga dapat dihitung berdasarkan persamaan [DST-06]:</p>";
			echo "<div style='border:1px solid #ccffcc; padding:3px 3px 3px 5px;' >";
			//print_r($densitas_baru);echo"<br>";
			print_r($k); echo "<br>";
			print_r($nilaiX1Y1); echo "<br>";
			print_r($k); echo "<br>"; //print_r($k);echo"<br>";
			foreach($densitas_baru as $k=>$d){
				echo $d."]".$k."]";
				if($k!="&theta;"){
					$densitas_baru[$k]=$d/(1-(isset($densitas_baru["&theta;"])?$densitas_baru["&theta;"]:0));
					//echo "<p>Densitas baru "; print_r($densitas_baru[$k]); echo"=$d /(1-";  echo "</p>";
					//print_r((1-(isset($densitas_baru["&theta;"])?$densitas_baru["&theta;"]:0))); echo "<br>";
					//print_r($densitas_baru["&theta;"]); echo "<br>";
					echo "m<sub>$m</sub>{"; print_r($k); echo "} =$d /(1-(";print_r($d);echo "<br>";
					echo "m<sub>$m</sub>{"; print_r($k); echo "} = ";print_r($densitas_baru[$k]); echo "<br>";
				}
			}
			echo "</div>";
			
			//hasil perhitungan densitas awal m ke n
			echo "<p style='font-weight:bold; border:none;'>Sehingga dari perhitungan #5 didapatkan :</p>";
			//print_r($densitas_baru);
			foreach($densitas_baru as $kdPdensitas=>$nilaiPDensitas){
				echo "m<sub>11</sub>("; print_r($kdPdensitas); echo ") = "; print_r($nilaiPDensitas); echo "<br>";
				}
echo "</td></tr>";
		} //## end --menghitung nilai densitas (m) baru
echo "</table>";
		//--- perangkingan
		unset($densitas_baru["&theta;"]);
		arsort($densitas_baru);
		//echo "<p>Densitas Baru : ";
	?>
    <p style="font-weight:bold; text-align:center; background:#06F;"><strong>Hasil Perangkingan</strong></p>	
<?php	
$arrPenyakit=array(); 
$queryPasien=mysql_query("SELECT * FROM tbpasien ORDER BY idpasien DESC"); $dataPasien=mysql_fetch_array($queryPasien);
$queryP=mysql_query("SELECT * FROM tb_penyakit"); while($dataP=mysql_fetch_array($queryP)){ $arrPenyakit["$dataP[kdpenyakit]"]=$dataP['nama_penyakit']; }	
		echo "<p style='font-weight:bold; border:none;'>Dari hasil perhitungan yang terakhir tersebut kemudian diurutkan nilainya dari yang terbesar ke yang terkecil sebagai berikut :</p>";
		//print_r($densitas_baru);echo "<hr>"; //$dataSama=array();
		$dataSama=array_intersect_key($arrPenyakit,$densitas_baru);
		//print_r($dataSama); echo "<hr>";
		foreach($dataSama as $k=>$a){ 
			foreach($densitas_baru as $kdpenyakit=>$ranking){
			//echo "m<sub>$m</sub>("; print_r($kdpenyakit); echo ") = "; print_r($ranking); echo "<br>";
			//echo "m<sub>$m</sub>( $kdpenyakit | "; print_r($arrPenyakit["$kdpenyakit"]); echo ") = "; 
			//echo " dengan nilai kepercayaan sebesar ".round($densitas_baru[$kdpenyakit]*100,2)."%<br>";
			if($k==$kdpenyakit){ 
			//mengambil solusi penyakit
			$strS=mysql_query("SELECT * FROM tb_penyakit WHERE kdpenyakit='$k' ");
			$dataS=mysql_fetch_array($strS); 
				echo "<strong>m<sub>$m</sub>( $kdpenyakit | "; print_r($arrPenyakit["$kdpenyakit"]); echo ") = "; 
				echo " dengan nilai kepercayaan sebesar ".round($densitas_baru[$kdpenyakit]*100,2)."%<br></strong>";
				echo "Solusi Penanganan : <p style='max-height:70px;overflow:auto; border:1px solid #99ccff; color:#999999;'>".$dataS['solusi']."</p><hr>";
				$persen=round($densitas_baru[$kdpenyakit]*100,2);
				//menyimpan data pasien
				$idPasien=$dataPasien['idpasien'];
				$querySimpanP=mysql_query(" INSERT INTO tb_hasil (idpasien,kdpenyakit,persentase,tanggal) VALUES ('$idPasien','$k','$persen', NOW() ) ");
			 }
			}
		}
		//print_r($arrPenyakit);

		//echo "</p>";
		//--- menampilkan hasil akhir
		//$codes=array_keys($densitas_baru);
		//echo "<p>implode codes</p>";
		//print_r(implode("','",$codes)."'");
		//echo "<hr>";
		//$sql="SELECT GROUP_CONCAT(nama_penyakit) FROM tb_penyakit WHERE kdpenyakit IN('".implode("','",$codes)."')"; 
		//$result=$db->query($sql);
		//$row=$result->fetch_row();
		//echo "Terdeteksi penyakit <b>{$row[0]}</b> dengan derajat kepercayaan ".round($densitas_baru[$codes[0]]*100,2)."%";
	}
}
?></td>
  </tr>
  <tr  >
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>