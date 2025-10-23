<?php
include "conexion.php";

$fecha_inicio = $_GET['inicio'] ?? date('Y-m-01');
$fecha_fin = $_GET['fin'] ?? date('Y-m-d');

$sql = "SELECT * FROM produccion WHERE fecha BETWEEN ? AND ? ORDER BY fecha DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $fecha_inicio, $fecha_fin);
$stmt->execute();
$result = $stmt->get_result();
?>

<form method="GET">
    Desde: <input type="date" name="inicio" value="<?= $fecha_inicio ?>">
    Hasta: <input type="date" name="fin" value="<?= $fecha_fin ?>">
    <button type="submit">Filtrar</button>
</form>

<table border="1">
    <tr>
        <th>ID</th><th>Fecha</th><th>Lote</th><th>Cantidad</th><th>Empleado</th><th>Acciones</th>
    </tr>
    <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['fecha'] ?></td>
            <td><?= $row['lote'] ?></td>
            <td><?= $row['cantidad'] ?></td>
            <td><?= $row['registrado_por'] ?></td>
            <td>
                <a href="editar_produccion.php?id=<?= $row['id'] ?>">Editar</a> |
                <a href="eliminar_produccion.php?id=<?= $row['id'] ?>" onclick="return confirm('¿Eliminar?')">Eliminar</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>
