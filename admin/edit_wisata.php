<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Edit Data Gejala</title>
<link rel="stylesheet" type="text/css" href="../style.css">
<link href="../Image/icon.png" rel='shortcut icon'>
<script type="text/javascript">
function validasi(form){
	if(form.gejala.value==""){
		alert("Masukkan Gejala..!");
		form.gejala.focus(); return false;
		}
	form.submit();
	}
</script>
</head>
<body>
<?php
include "koneksi.php";
$kdubah = $_GET['id'];
if($kdubah !="") {
	#menampilkan data
	$result=$con->query(" SELECT * FROM gejala WHERE kd_gejala='$kdubah' ");
	$data = $result->fetch_array();
	
	#samakan dengan variabel form
	$kdgejala = $data['kd_gejala'];
	$gejala = $data['gejala'];
}
?>
<form method="post" enctype="multipart/form-data" action="simpan_wisata.php">
<div class="form-group">
  <label for="id">Nama DTW :</label>
  <input type="text" class="form-control" id="nama_dtw" name="nama_dtw">
</div>
  <div class="form-group">
    <label for="gejala">Deskripsi :</label>
    <input type="text" class="form-control" id="deskripsi" name="deskripsi">
  </div>
  <div class="form-group">
    <label for="gejala">Luas Area :</label>
    <input type="text" class="form-control" id="luas_area" name="luas_area">
  </div> 
  <div class="form-group">
    <label for="gejala">Alamat Lokasi :</label>
    <input type="text" class="form-control" id="alamat_lokasi" name="alamat_lokasi">
  </div>
  <div class="form-group">
    <label for="gejala">Jenis DTW :</label>
    <select class="form-control" id="jenis_dtw" name="jenis_dtw">
    <option value="0">-Jenis Wisata-</option>
    <?php
    include "koneksi.php";
	$queryJ=mysql_query("SELECT * FROM tb_jenis_wisata"); while($dataJ=mysql_fetch_array($queryJ)){
		echo "<option value='$dataJ[id_jenis]'>$dataJ[id_jenis]&nbsp;|&nbsp;$dataJ[jenis]</option>";
		}
	?>
    </select>
  </div>
  <div class="form-group">
    <label for="gejala">Aksesibilitas :</label>
    <input type="text" class="form-control" id="aksesibilitas" name="aksesibilitas">
  </div>
  <div class="form-group">
    <label for="gejala">Amenitas :</label>
    <input type="text" class="form-control" id="amenitas" name="amenitas">
  </div>
  <div class="form-group">
    <label for="gejala">Keterangan :</label>
    <input type="text" class="form-control" id="keterangan" name="keterangan">
  </div>
  <div class="form-group">
    <label for="gejala">Gambar :</label>
    <input type="file" class="form-control" id="gambar" name="gambar">
  </div>
  <button type="submit" class="btn btn-default">Simpan</button>
</form>
</body>
</html>
