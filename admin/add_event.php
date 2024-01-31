<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = $_POST["title"];
    $start = $_POST["start"];
    $end = $_POST["end"];
    $tag = $_POST["tag"];

    // Koneksi ke database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "insafilm";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Koneksi Gagal: " . $conn->connect_error);
    }

    $sql = "INSERT INTO events (title, start_datetime, end_datetime, color_status) VALUES ('$title', '$start', '$end', '$tag')";

    if ($conn->query($sql) === TRUE) {
        echo "Event berhasil ditambahkan!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    http_response_code(405); // Method Not Allowed
    echo "Metode HTTP tidak diizinkan!";
}
