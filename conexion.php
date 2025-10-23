<?php
$host = "127.0.0.1"; // o "localhost"
$user = "root";      // usuario por defecto de XAMPP
$password = "";       // si no pusiste contraseña en MySQL, déjalo vacío
$dbname = "sistema_huevos"; // nombre exacto de tu base de datos

$conn = new mysqli($host, $user, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("❌ Error de conexión: " . $conn->connect_error);
}

// Configurar codificación UTF-8
$conn->set_charset("utf8");

echo "✅ Conexión establecida correctamente.";
?>
