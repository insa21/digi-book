<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["tanggal"])) {
    // Terima data dari AJAX
    $tanggal = $_POST["tanggal"];
    $eventTitle = isset($_POST["event_title"]) ? $_POST["event_title"] : "";
    $colorStatus = isset($_POST["color_status"]) ? $_POST["color_status"] : "";
    $description = isset($_POST["description"]) ? $_POST["description"] : "";

    // Simpan data ke dalam database (gantilah dengan koneksi dan query yang sesuai)
    try {
        $koneksi = new PDO("mysql:host=localhost;dbname=insafilm", "root", "");
        $koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = $koneksi->prepare("INSERT INTO tabel_event (tanggal, event_title, color_status, description) VALUES (:tanggal, :eventTitle, :colorStatus, :description)");
        $query->bindParam(":tanggal", $tanggal);
        $query->bindParam(":eventTitle", $eventTitle);
        $query->bindParam(":colorStatus", $colorStatus);
        $query->bindParam(":description", $description);
        $query->execute();

        echo "Data berhasil disimpan dalam database.";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Metode atau parameter tidak valid.";
}
