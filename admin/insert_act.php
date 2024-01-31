<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
	$isbn = $_POST['isbn'];
	$foto_nama = $_FILES['photo']['name'];
	$foto_size = $_FILES['photo']['size'];
	$judul = $_POST['judul'];
	$penulis = $_POST['penulis'];
	$penerbit = $_POST['penerbit'];
	$tanggal_terbit = $_POST['tanggal_terbit'];
	$jumlah_halaman = $_POST['jumlah_halaman'];
	$kategori = $_POST['kategori'];
	$synopsis = $_POST['synopsis'];
	$gendre = implode(", ", $_POST['genre']); // Menyesuaikan nama variabel dengan database
	$bahasa = $_POST['bahasa'];
	$link = $_POST['link'];

	// $result = preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i", "http://www.youtube.com/embed/$1", $link);

	if ($foto_size > 2097152) {
		header("location:lihat_data.php?pesan=size");
	} else {
		if ($foto_nama != "") {
			$ekstensi_izin = array('png', 'jpg', 'jpeg');
			$pisahkan_ekstensi = explode('.', $foto_nama);
			$ekstensi = strtolower(end($pisahkan_ekstensi));
			$file_tmp = $_FILES['photo']['tmp_name'];
			$tanggal = md5(date('Y-m-d h:i:s'));
			$foto_nama_new = $tanggal . '-' . $foto_nama;

			if (in_array($ekstensi, $ekstensi_izin)) {
				move_uploaded_file($file_tmp, 'foto/' . $foto_nama_new);

				$query = mysqli_query($koneksi, "INSERT INTO buku (isbn, photo, judul, penulis, penerbit, tanggal_terbit, jumlah_halaman, kategori, synopsis, gendre, bahasa, link) VALUES ('$isbn', '$foto_nama_new', '$judul', '$penulis', '$penerbit', '$tanggal_terbit', '$jumlah_halaman', '$kategori', '$synopsis', '$gendre', '$bahasa', '$link')");

				if ($query) {
					header("location:lihat_data.php?pesan=berhasil");
				} else {
					header("location:lihat_data.php?pesan=gagal");
				}
			} else {
				header("location:lihat_data.php?pesan=ekstensi");
			}
		} else {
			$query = mysqli_query($koneksi, "INSERT INTO buku (isbn, judul, penulis, penerbit, tanggal_terbit, jumlah_halaman, kategori, synopsis, gendre, bahasa, link) VALUES ('$isbn', '$judul', '$penulis', '$penerbit', '$tanggal_terbit', '$jumlah_halaman', '$kategori', '$synopsis', '$gendre', '$bahasa', '$link')");

			if ($query) {
				header("location:lihat_data.php?pesan=berhasil");
			} else {
				header("location:lihat_data.php?pesan=gagal");
			}
		}
	}
}
