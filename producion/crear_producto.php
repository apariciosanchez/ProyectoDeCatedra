<?php
session_start();
include "conexion.php"; // Asegúrate que $conn esté definido aquí

// Para prueba, si no hay usuario logueado asignamos uno demo
if (!isset($_SESSION['usuario'])) {
    $_SESSION['usuario'] = 'empleado_demo';
}

$mensaje = '';

if (isset($_POST['submit'])) {
    $fecha = $_POST['fecha'];
    $lote = $_POST['lote'];
    $cantidad = $_POST['cantidad'];
    $usuario = $_SESSION['usuario'];

    $sql = "INSERT INTO produccion (fecha, lote, cantidad, registrado_por) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssis", $fecha, $lote, $cantidad, $usuario);

    if ($stmt->execute()) {
        $mensaje = "Registro guardado correctamente.";
    } else {
        $mensaje = "Error: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Registrar Producción</title>
    <link rel="stylesheet" href="..//" />
</head>
<body>

<?php if ($mensaje): ?>
    <div class="mensaje <?= strpos($mensaje, 'Error') === false ? 'exito' : 'error' ?>">
        <?= htmlspecialchars($mensaje) ?>
    </div>
<?php endif; ?>

<form method="POST" novalidate>
    <label for="fecha">Fecha:</label>
    <input type="date" id="fecha" name="fecha" required>

    <label for="lote">Lote:</label>
    <input type="text" id="lote" name="lote" required>

    <label for="cantidad">Cantidad:</label>
    <input type="number" id="cantidad" name="cantidad" required min="1">

    <button type="submit" name="submit">Registrar</button>
</form>

</body>
</html>
