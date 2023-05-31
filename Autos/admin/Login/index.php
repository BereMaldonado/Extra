<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>Inicio de Sesión</title>
    <link rel='stylesheet' type='text/css' media='screen' href='../../css/miestilo.css'>
    <script src='../../js/validations.js'></script>
</head>
<body>
  <div class="center container">
    <h2>Iniciar Sesión</h2>
    <form action="../../php/iniciar.php" method="post">
      <input type="text" id="nomUsuario" name="nomUsuario" placeholder="Nombre de usuario" required>
      <br>
      <input type="password" id="contrasena" name="contrasena" placeholder="Contraseña" required>
      <br>
      <input type="submit" value="Iniciar Sesión"><br><br>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>