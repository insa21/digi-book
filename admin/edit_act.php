<?php
include 'koneksi.php';

function uploadFile($file, $targetDirectory)
{
    $allowedExtensions = array('doc', 'docx', 'pdf', 'txt');
    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $fileTmp = $file['tmp_name'];

    if (in_array($extension, $allowedExtensions)) {
        $dateHash = md5(date('Y-m-d h:i:s'));
        $fileName = $dateHash . '-' . $file['name'];
        move_uploaded_file($fileTmp, $targetDirectory . $fileName);
        return $fileName;
    } else {
        return false;
    }
}

if (isset($_POST['submit'])) {
    $isbn = $_POST['isbn'];
    $file_nama = $_FILES['link']['name'];
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
    $gendre = implode(", ", $_POST['gendre']);
    $bahasa = $_POST['bahasa'];

    // Validasi ukuran file
    if ($file_size > 20971520 || $foto_size > 20971520) {
        header("location:lihat_data.php?pesan=size");
        exit;
    }

    // Validasi dan proses file link
    if (!empty($file_nama)) {
        $file_nama_new = uploadFile($_FILES['link'], 'buku/');
        if ($file_nama_new === false) {
            header("location:lihat_data.php?pesan=ekstensi_file");
            exit;
        }
    } else {
        // Jika tidak ada file baru diunggah, gunakan file yang sudah ada
        $get_foto = "SELECT photo FROM buku WHERE isbn=?";
        $stmt_foto = mysqli_prepare($koneksi, $get_foto);
        mysqli_stmt_bind_param($stmt_foto, "s", $isbn);
        mysqli_stmt_execute($stmt_foto);
        $result_foto = mysqli_stmt_get_result($stmt_foto);
        $foto_lama = mysqli_fetch_array($result_foto);
        $file_nama_new = $foto_lama['photo'];
    }

    // Validasi dan proses file foto
    if (!empty($foto_nama)) {
        $foto_nama_new = uploadFile($_FILES['photo'], 'foto/');
        if ($foto_nama_new === false) {
            header("location:lihat_data.php?pesan=ekstensi_gambar");
            exit;
        }
    } else {
        // Jika tidak ada gambar baru diunggah, gunakan foto yang sudah ada
        $get_foto = "SELECT photo FROM buku WHERE isbn=?";
        $stmt_foto = mysqli_prepare($koneksi, $get_foto);
        mysqli_stmt_bind_param($stmt_foto, "s", $isbn);
        mysqli_stmt_execute($stmt_foto);
        $result_foto = mysqli_stmt_get_result($stmt_foto);
        $foto_lama = mysqli_fetch_array($result_foto);
        $foto_nama_new = $foto_lama['photo'];
    }

    // Update data buku
    $synopsis = mysqli_real_escape_string($koneksi, $synopsis);
    $query = "UPDATE buku SET isbn=?, link=?, photo=?, judul=?, penulis=?, penerbit=?, 
        tanggal_terbit=?, jumlah_halaman=?, kategori=?, synopsis=?, 
        gendre=?, bahasa=? WHERE isbn=?";
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param(
        $stmt,
        "sssssssssssss",
        $isbn,
        $file_nama_new,
        $foto_nama_new,
        $judul,
        $penulis,
        $penerbit,
        $tanggal_terbit,
        $jumlah_halaman,
        $kategori,
        $synopsis,
        $gendre,
        $bahasa,
        $isbn
    );
    mysqli_stmt_execute($stmt);

    if ($stmt) {
        header("location:lihat_data.php?pesan=berhasil");
    } else {
        header("location:lihat_data.php?pesan=gagal");
    }
} else {
    header("location:lihat_data.php");
}
