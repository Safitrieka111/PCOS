<?php
include "koneksi.php";
$aksi=$_GET['aksi'];
$data_hapus=$_GET['data_hapus'];
// hapus dosen
if ($aksi=="penyakit"){
	$result=$con->query("DELETE FROM penyakit_solusi WHERE kd_penyakit='$data_hapus' ");
	//jika berhasil di hapus
	if ($result){
		echo "sukses";
	}else{
		echo "gagal";
	}
}
// hapus mahasiswa
if ($aksi=="gejala"){
	$result=$con->query(" DELETE FROM gejala WHERE kd_gejala='$data_hapus' ");
	//jika berhasil di hapus
	if ($result){
		echo "sukses";
	}else{
		echo "gagal";
	}
}
// hapus desa
if ($aksi=="hasil"){
	$result=$con->query(" DELETE FROM   analisa_hasil WHERE idpasien='$data_hapus' " );
	//jika berhasil di hapus
	if ($result){
		echo "sukses";
	}else{
		echo "gagal";
	}
}
// hapus desa
if ($aksi=="umkm"){
	$sql="DELETE FROM   tb_umkm WHERE idumkm='$data_hapus'";
	$sqlHapusLokasi="DELETE FROM tb_lokasi WHERE idumkm='$data_hapus' ";
	$result=mysql_query($sql)or die (mysql_error());
	$resulHapusLokasi=mysql_query($sqlHapusLokasi) or die (mysql_error());
	//jika berhasil di hapus
	if ($result){
		echo "sukses";
	}else{
		echo "gagal";
	}
}
// hapus kelompok
if ($aksi=="kelompok"){
	$sql="DELETE FROM tbkelompok WHERE kd_kelompok='$data_hapus'";
	$result=mysql_query($sql)or die (mysql_error());
	//jika berhasil di hapus
	if ($result){
		echo "sukses";
	}else{
		echo "gagal";
	}
}
// hapus lokasi
if ($aksi=="anggota"){
	$sql="DELETE FROM tb_anggota WHERE idanggota='$data_hapus'";
	$result=mysql_query($sql)or die (mysql_error());
	//jika berhasil di hapus
	if ($result){
		echo "sukses";
	}else{
		echo "gagal";
	}
}
// hapus lokasi
if ($aksi=="kegiatan"){
	$sql="DELETE FROM tbkegiatan WHERE id_kegiatan='$data_hapus'";
	$result=mysql_query($sql)or die (mysql_error());
	//jika berhasil di hapus
	if ($result){
		echo "sukses";
	}else{
		echo "gagal";
	}
}
// hapus lokasi
if ($aksi=="lokasi"){
	$id_lokasi=$_GET['data_hapus']; $idumkm=$_GET['idumkm'];
	$sql="DELETE FROM tb_lokasi WHERE id_lokasi='$id_lokasi'";
	$sql2="DELETE FROM tb_umkm WHERE idumkm='$idumkm'";
	$result=mysql_query($sql)or die (mysql_error());
	$result2=mysql_query($sql2)or die(mysql_error());
	//jika berhasil di hapus
	if ($result2){
		echo "sukses";
	}else{
		echo "gagal";
	}
}
?>