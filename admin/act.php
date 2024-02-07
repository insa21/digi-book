<?php
include 'koneksi.php';
// Mengecek apakah ID ada datanya atau tidak
if (isset($_POST['id'])) {
    if ($_POST['id'] != "") {
        // Mengambil data dari form lalu ditampung didalam variabel
        $id = $_POST['id'];
        $name = $_POST['name'];
        $foto_nama = $_FILES['photo']['name'];
        $foto_size = $_FILES['photo']['size'];
        $gendre = implode(", ", $_POST['gendre']);
        // $gendre = $_POST['gendre'];
        $director = $_POST['director'];
        $actors = $_POST['actors'];
        $country = $_POST['country'];
        $duration = $_POST['duration'];
        $quality = $_POST['quality'];
        $release = $_POST['release'];
        $imdb = $_POST['imdb'];
        $resulation = $_POST['resulation'];
        $production = $_POST['production'];
        $synopsis = $_POST['synopsis'];
        $link = $_POST['link'];
        $result = preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i", "http://www.youtube.com/embed/$1", $link);
    } else {
        header("location:index.php");
    }

    // Mengecek apakah file lebih besar 2 MB atau tidak
    if ($foto_size > 2097152) {
        // Jika File lebih dari 2 MB maka akan gagal mengupload File
        header("location:index.php?pesan=size");
    } else {

        // Mengecek apakah Ada file yang diupload atau tidak
        if ($foto_nama != "") {

            // Ekstensi yang diperbolehkan untuk diupload boleh diubah sesuai keinginan
            $ekstensi_izin = array('png', 'jpg', 'jepg');
            // Memisahkan nama file dengan Ekstensinya
            $pisahkan_ekstensi = explode('.', $foto_nama);
            $ekstensi = strtolower(end($pisahkan_ekstensi));
            // Nama file yang berada di dalam direktori temporer server
            $file_tmp = $_FILES['photo']['tmp_name'];
            // Membuat angka/huruf acak berdasarkan waktu diupload
            $tanggal = md5(date('Y-m-d h:i:s'));
            // Menyatukan angka/huruf acak dengan nama file aslinya
            $foto_nama_new = $tanggal . '-' . $foto_nama;

            // Mengecek apakah Ekstensi file sesuai dengan Ekstensi file yg diuplaod
            if (in_array($ekstensi, $ekstensi_izin) === true) {

                // Mengambil data film_foto didalam table film
                $get_foto = "SELECT photo_film FROM film WHERE id_film='$id'";
                $data_foto = mysqli_query($koneksi, $get_foto);
                // Mengubah data yang diambil menjadi Array
                $foto_lama = mysqli_fetch_array($data_foto);

                // Menghapus Foto lama didalam folder FOTO
                unlink("foto/" . $foto_lama['photo']);

                // Memindahkan File kedalam Folder "FOTO"
                move_uploaded_file($file_tmp, 'foto/' . $foto_nama_new);

                // Query untuk memasukan data kedalam table film
                $query = mysqli_query($koneksi, "UPDATE film SET photo_film='$foto_nama_new', name_film='$name', gendre_film='$gendre', director_film='$director', 
            actors_film='$actors', country_film='$country', duration_film='$duration', quality_film='$quality', release_film='$release', imdb_film='$imdb', resulation_film='$resulation',
            production_film='$production', synopsis_film='$synopsis', link_film='$result' WHERE id_film='$id'");

                // Mengecek apakah data gagal diinput atau tidak
                if ($query) {
                    header("location:index.php?pesan=berhasil");
                } else {
                    header("location:index.php?pesan=gagal");
                }
            } else {
                // Jika ekstensinya tidak sesuai dengan apa yg kita tetapkan maka error
                header("location:index.php?pesan=ekstensi");
            }
        } else {

            // Apabila tidak ada file yang diupload maka akan menjalankan code dibawah ini
            $query = mysqli_query($koneksi, "UPDATE film SET name_film='$name', gendre_film='$gendre', director_film='$director', 
            actors_film='$actors', country_film='$country', duration_film='$duration', quality_film='$quality', release_film='$release', imdb_film='$imdb', resulation_film='$resulation',
            production_film='$production', synopsis_film='$synopsis', link_film='$result' WHERE id_film='$id'");
            // Mengecek apakah data gagal diinput atau tidak
            if ($query) {
                header("location:index.php?pesan=berhasil");
            } else {
                header("location:index.php?pesan=gagal");
            }
        }
    }
} else {
    // Apabila ID tidak ditemukan maka akan dikembalikan ke halaman index
    header("location:index.php");
}
