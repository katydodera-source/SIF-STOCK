<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "sif_stock";
$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>