<?php
include "conexion.php";

$id = $_GET['id'];
$sql = "SELECT * FROM produccion WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if(isset($_POST['submit'])){
    $fecha = $_POST['fecha'];
    $lote = $_POST['lote'];
    $cantidad = $_POST['cantidad'];

    $sql = "UPDATE produccion SET fecha=?, lote=?, cantidad=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssii", $fecha, $lote, $cantidad, $id);
    if($stmt->execute()){
        echo "Registro actualizado correctamente.";
    }
}
?>

<form method="POST">
    Fecha: <input type="date" name="fecha" value="<?= $row['fecha'] ?>" required><br>
    Lote: <input type="text" name="lote" value="<?= $row['lote'] ?>" required><br>
    Cantidad: <input type="number" name="cantidad" value="<?= $row['cantidad'] ?>" required><br>
    <button type="submit" name="submit">Actualizar</button>
</form>
