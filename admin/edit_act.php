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

            if (in_array($ekstensi, $ekstensi_izin) === true) {
                $get_foto = "SELECT photo FROM buku WHERE isbn='$isbn'";
                $data_foto = mysqli_query($koneksi, $get_foto);
                $foto_lama = mysqli_fetch_array($data_foto);

                unlink("foto/" . $foto_lama['photo']);

                move_uploaded_file($file_tmp, 'foto/' . $foto_nama_new);

                $query = mysqli_query($koneksi, "UPDATE buku SET isbn='$isbn', photo='$foto_nama_new', judul='$judul', penulis='$penulis', penerbit='$penerbit', 
                tanggal_terbit='$tanggal_terbit', jumlah_halaman='$jumlah_halaman', kategori='$kategori', synopsis='$synopsis', 
                gendre='$gendre', bahasa='$bahasa', link='$link' WHERE isbn='$isbn'");

                if ($query) {
                    header("location:lihat_data.php?pesan=berhasil");
                } else {
                    header("location:lihat_data.php?pesan=gagal");
                }
            } else {
                header("location:lihat_data.php?pesan=ekstensi");
            }
        } else {
            $query = mysqli_query($koneksi, "UPDATE buku SET isbn='$isbn', judul='$judul', penulis='$penulis', penerbit='$penerbit', 
            tanggal_terbit='$tanggal_terbit', jumlah_halaman='$jumlah_halaman', kategori='$kategori', synopsis='$synopsis', 
            gendre='$gendre', bahasa='$bahasa', link='$link' WHERE isbn='$isbn'");

            if ($query) {
                header("location:lihat_data.php?pesan=berhasil");
            } else {
                header("location:lihat_data.php?pesan=gagal");
            }
        }
    }
} else {
    header("location:lihat_data.php");
}
