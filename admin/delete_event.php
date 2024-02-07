<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["id"];

    // Koneksi ke database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "insafilm";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Koneksi Gagal: " . $conn->connect_error);
    }

    $sql = "DELETE FROM events WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Event berhasil dihapus!";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
} else {
    http_response_code(405); // Method Not Allowed
    echo "Metode HTTP tidak diizinkan!";
}
