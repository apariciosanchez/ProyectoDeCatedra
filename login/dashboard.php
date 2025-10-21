<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Panel principal</title>
<link rel="stylesheet" href="../css/login.css">
</head>
<body>
<div class="page">
  <div class="header-panel">
    <h2>Bienvenido, <?= htmlspecialchars($_SESSION['usuario']) ?> 👋</h2>
    <a href="logout.php" class="btn-outline">Cerrar sesión</a>
  </div>

  <?php if ($_SESSION['rol'] === 'administrador'): ?>
  <a href="usuarios_listar.php" class="btn-new">👥 Gestión de Usuarios</a>
  <?php else: ?>
  <p>Solo los administradores pueden gestionar usuarios.</p>
  <?php endif; ?>

  <a href="cambiar_contrasena.php" class="btn-new">🔑 Cambiar contraseña</a>
</div>
</body>
</html>
