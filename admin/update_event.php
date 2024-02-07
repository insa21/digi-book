<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["id"];
    $title = $_POST["title"];
    $tag = $_POST["tag"];
    $description = $_POST["description"];

    // Koneksi ke database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "insafilm";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Koneksi Gagal: " . $conn->connect_error);
    }

    $sql = "UPDATE events SET title='$title', color_status='$tag', description='$description' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Event berhasil diperbarui!";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
} else {
    http_response_code(405); // Method Not Allowed
    echo "Metode HTTP tidak diizinkan!";
}
