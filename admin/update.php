<?php
include "koneksi.php";
	$aksi=$_GET['aksi'];
if ($aksi=="wisata"){
$id=$_GET['id'];
$nama_dtw=$_POST['nama_dtw'];
$deskripsi=$_POST['deskripsi'];
$luas_area=$_POST['luas_area'];
$alamat_lokasi=$_POST['alamat_lokasi'];
$jenis_dtw=$_POST['jenis_dtw'];
$aksesibilitas=$_POST['aksesibilitas'];
$amenitas=$_POST['amenitas'];
$keterangan=$_POST['keterangan'];
$gambar=$_POST['gambar'];
$img = rand(1000,100000)."-".$_FILES['gambar']['name'];
$img_loc = $_FILES['gambar']['tmp_name'];
$folder="foto_wisata/";
	if(!empty($_FILES['gambar']['name'])){
		//update data dan upload gambar baru
		$sql="UPDATE tb_wisata SET nama_dtw='$nama_dtw', deskripsi='$deskripsi', luas_area='$luas_area', alamat_lokasi='$alamat_lokasi', jenis_dtw='$jenis_dtw', aksesibilitas='$aksesibilitas', amenitas='$amenitas', keterangan='$keterangan',gambar='$img' WHERE id='$id'";
	$result=$con->query($sql);
		move_uploaded_file($img_loc,$folder.$img);
		}else{
			//update data dan tanpa upload gambar
		$sql="UPDATE tb_wisata SET nama_dtw='$nama_dtw', deskripsi='$deskripsi', luas_area='$luas_area', alamat_lokasi='$alamat_lokasi', jenis_dtw='$jenis_dtw', aksesibilitas='$aksesibilitas', amenitas='$amenitas', keterangan='$keterangan' WHERE id='$id'";
		$result=$con->query($sql);
			}
	
	if ($result){
		echo "<center><b>Data Berhasil Diupdate </b></center>";
		echo "<center><a href='../admin/data_wisata.php'>Ok</a></center>";
		}else{
		echo "<center><font color='#ff0000'><strong>Penyimpanan Gagal</strong></font></center><br>";
		echo "<center><a href='../admin/data_wisata.php'>Kembali</a></center>";
		}
}
// update data berita
if ($aksi=="berita"){
$id=$_GET['id'];
$judul=$_POST['judul'];
$isi_berita=$_POST['isi_berita'];
$tanggal=$_POST['tanggal'];
$gambar=$_POST['gambar'];
$img = rand(1000,100000)."-".$_FILES['gambar']['name'];
$img_loc = $_FILES['gambar']['tmp_name'];
$folder="foto_wisata/";
	if(!empty($_FILES['gambar']['name'])){
		//update data dan upload gambar baru
		$sql="UPDATE tb_berita SET judul='$judul', isi_berita='$isi_berita', tanggal='$tanggal', gambar='$img' WHERE id='$id'";
	$result=$con->query($sql);
		move_uploaded_file($img_loc,$folder.$img);
		}else{
			//update data dan tanpa upload gambar
		$sql="UPDATE tb_berita SET judul='$judul', isi_berita='$isi_berita', tanggal='$tanggal' WHERE id='$id'";
		$result=$con->query($sql);
			}
	
	if ($result){
		echo "<center><b>Data Berhasil Diupdate </b></center>";
		echo "<center><a href='../admin/berita.php'>Ok</a></center>";
		}else{
		echo "<center><font color='#ff0000'><strong>Penyimpanan Gagal</strong></font></center><br>";
		echo "<center><a href='../admin/berita.php'>Kembali</a></center>";
		}
}
// hapus data kredit konsumtif
if ($aksi=="jenis"){
$id_jenis=$_POST['id_jenis'];
$jenis=$_POST['jenis'];
$deskripsi=$_POST['deskripsi'];
	$sql="UPDATE tb_jenis_wisata  SET jenis='$jenis', deskripsi='$deskripsi' WHERE id_jenis='$id_jenis'";
	$result=$con->query($sql);
	if ($result){
		echo "<center><b>Data Berhasil Diupdate </b></center>";
		echo "<center><a href='../admin/jenis_wisata.php'>Ok</a></center>";
		}else{
		echo "<center><font color='#ff0000'><strong>Penyimpanan Gagal</strong></font></center><br>";
		echo "<center><a href='../admin/jenis_wisata.php'>Kembali</a></center>";
		}
}
//update umkm
if ($aksi=="agenda"){
$id=$_GET['id'];
$judul_agenda=$_POST['judul_agenda'];
$tempat_kegiatan=$_POST['tempat_kegiatan'];
$rincian_kegiatan=$_POST['rincian_kegiatan'];
$tanggal_kegiatan=$_POST['tanggal_kegiatan'];
	$sql="UPDATE tb_agenda SET judul_agenda='$judul_agenda', tempat_kegiatan='$tempat_kegiatan', rincian_kegiatan='$rincian_kegiatan', tanggal_kegiatan='$tanggal_kegiatan'  WHERE id='$id'";
	$result=$con->query($sql);
	if ($result){
		echo "<center><b>Data Berhasil Diupdate </b></center>";
		echo "<center><a href='../admin/agenda.php'>Ok</a></center>";
		}else{
		echo "<center><font color='#ff0000'><strong>Penyimpanan Gagal</strong></font></center><br>";
		echo "<center><a href='../admin/agenda.php'>Kembali</a></center>";
		}
}
// update anggota
if ($aksi=="user"){
$id=$_GET['id'];
$username=$_POST['username'];
$nama=$_POST['nama'];
$password=$_POST['password'];
	$sql="UPDATE login SET username='$username', nama='$nama', password='$password'  WHERE id='$id'";
	$result=$con->query($sql);
	if ($result){
		echo "<center><b>Data Berhasil Diupdate </b></center>";
		echo "<center><a href='../admin/manage_user.php'>Ok</a></center>";
		}else{
		echo "<center><font color='#ff0000'><strong>Penyimpanan Gagal</strong></font></center><br>";
		echo "<center><a href='../admin/manage_user.php'>Kembali</a></center>";
		}
}
// update anggota
if ($aksi=="lokasi"){
	$id_lokasi=$_GET['id_lokasi'];
	$kd_desa=$_GET['kd_desa'];
	$alamat=$_GET['alamat'];
	$id_jenis=$_GET['id_jenis'];
	$lat=$_GET['lat'];
	$lng=$_GET['lng'];
	$sql="UPDATE tb_lokasi SET kd_desa='$kd_desa', alamat='$alamat', id_jenis='$id_jenis', lat='$lat', lng='$lng' WHERE id_lokasi='$id_lokasi'";
	$result=mysql_query($sql);
	if ($result){
		echo "sukses_update";
	}else{
		echo "gagal_update";
		}
}
?>
