<?php
include "conexion.php";

$id = $_GET['id'];
$sql = "DELETE FROM produccion WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if($stmt->execute()){
    header("Location: historial_produccion.php");
}
?>
