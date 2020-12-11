<?php
session_start();

include "../../../lib/config.php";
include "../../../lib/koneksi.php";

$nama = $_POST['namaKatalog'];
$deskripsi = $_POST['deskripsi'];
$id = $_POST['idKatalog'];

if (!empty($_POST['gambar'])) {
	$nama_file = $_FILES['gambar']['name'];
	$ukuran_file = $_FILES['gambar']['size'];
	$tipe_file = $_FILES['gambar']['type'];
	$tmp_file = $_FILES['gambar']['tmp_name'];

	$path = "../../upload/" . $nama_file;
	if ($tipe_file == "image/jpeg" || $tipe_file == "image/png" || $tipe_file == "image/jpg") {
		if ($ukuran_file <= 1000000) {
			if (move_uploaded_file($tmp_file, $path)) {
				$querySimpan = mysqli_query($koneksi, "UPDATE tbl_katalog SET namaKatalog='$nama', gambar='$nama_file',deskripsi='$deskripsi' WHERE idKatalog = '$id'");
				echo "<script>alert('Data katalog berhasil diubah'); window.location='$admin_url'+'adminweb.php?module=ubahKatalog&id='+'$id';</script>";
			} else {
				echo "<script>alert('katalog Gagal diubah'); window.location= '$admin_url'+'adminweb.php?module=ubahKatalog&id='+'$id';</script>";
			}
		} else {
			echo "<script>alert('Data Gambar katalog Gagal diubah, Ukuran melebihi 1Mb'); window.location='$admin_url'+'adminweb.php?module=ubahKatalog&id='+'$id';</script>";
		}
	} else {
		echo "<script>alert('Data Gambar katalog Gagal diubah, Format tidak didukung'); window.location= '$admin_url'+'adminweb.php?module=ubahKatalog&id='+'$id';</script>";
	}
} else {
	$querySimpan = mysqli_query($koneksi, "UPDATE tbl_katalog SET namaKatalog='$nama',deskripsi='$deskripsi' WHERE idKatalog = '$id'");

	if ($querySimpan) {
		echo "<script>alert('Data katalog berhasil diubah'); window.location='$admin_url'+'adminweb.php?module=ubahKatalog&id='+'$id';</script>";
	} else {
		echo "<script>alert('katalog Gagal diubah'); window.location= '$admin_url'+'adminweb.php?module=ubahKatalog&id='+'$id';</script>";
	}
}
