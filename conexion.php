<?php
$host = "127.0.0.1";
$user = "root";
$password = "";
$dbname = "sistema_huevos";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
$conn->set_charset("utf8");
?>
