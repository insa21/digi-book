<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $isbn = $_POST['isbn'];
    $file_nama = $_FILES['link']['name']; // Menggunakan input file untuk link
    $file_size = $_FILES['link']['size'];
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

    if ($file_size > 20971520 || $foto_size > 20971520) { // Mengubah batas ukuran menjadi 20 MB
        header("location:lihat_data.php?pesan=size");
    } else {
        if ($file_nama != "") {
            $allowed_extensions = array('doc', 'docx', 'pdf', 'txt');
            $extension = pathinfo($file_nama, PATHINFO_EXTENSION);
            $file_tmp = $_FILES['link']['tmp_name'];
            $tanggal = md5(date('Y-m-d h:i:s'));
            $file_nama_new = $tanggal . '-' . $file_nama;

            if (in_array($extension, $allowed_extensions)) {
                move_uploaded_file($file_tmp, 'buku/' . $file_nama_new);
            } else {
                header("location:lihat_data.php?pesan=ekstensi_file");
                exit;
            }
        }

        if ($foto_nama != "") {
            $ekstensi_izin = array('png', 'jpg', 'jpeg');
            $pisahkan_ekstensi = explode('.', $foto_nama);
            $ekstensi = strtolower(end($pisahkan_ekstensi));
            $file_tmp = $_FILES['photo']['tmp_name'];
            $tanggal = md5(date('Y-m-d h:i:s'));
            $foto_nama_new = $tanggal . '-' . $foto_nama;

            if (in_array($ekstensi, $ekstensi_izin)) {
                move_uploaded_file($file_tmp, 'foto/' . $foto_nama_new);
            } else {
                header("location:lihat_data.php?pesan=ekstensi_gambar");
                exit;
            }
        } else {
            // Jika tidak ada gambar baru diunggah, gunakan foto yang sudah ada
            $get_foto = "SELECT photo FROM buku WHERE isbn='$isbn'";
            $data_foto = mysqli_query($koneksi, $get_foto);
            $foto_lama = mysqli_fetch_array($data_foto);
            $foto_nama_new = $foto_lama['photo'];
        }

        $query = mysqli_query($koneksi, "UPDATE buku SET isbn='$isbn', link='$file_nama_new', photo='$foto_nama_new', judul='$judul', penulis='$penulis', penerbit='$penerbit', 
            tanggal_terbit='$tanggal_terbit', jumlah_halaman='$jumlah_halaman', kategori='$kategori', synopsis='$synopsis', 
            gendre='$gendre', bahasa='$bahasa' WHERE isbn='$isbn'");

        if ($query) {
            header("location:lihat_data.php?pesan=berhasil");
        } else {
            header("location:lihat_data.php?pesan=gagal");
        }
    }
} else {
    header("location:lihat_data.php");
}
