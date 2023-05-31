<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>Refaccionaria de autos</title>
    <link rel='stylesheet' type='text/css' media='screen' href='../../css/miestilo.css'>
    <script src='../../js/validations.js'></script>
</head>
<body>
        <div class="barra">
            <input type="button" value="Autos" onclick="">
            <input type="button" value="Servicios" onclick="servicios()">
            <input type="button" value="Entregar" onclick="entrega()">
            <input type="button" value="Dashboard" onclick="dash()">
        </div>
        <div class="center">
            <h2>Refaccionaria de Autos</h2>
        </div>
        <div class="container izquierda">
            <h3>Clientes</h3>
            <form action="../../php/registrarCliente.php" method="post">
                <label for="idCliente">ID Cliente:</label>
                <input type="text" id="idCliente" name="idCliente" required>

                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>

                <label for="apellido">Apellido:</label>
                <input type="text" id="apellido" name="apellido" required>

                <label for="telefono">Teléfono:</label>
                <input type="tel" id="telefono" name="telefono" required>
                <br><br>

                <label for="direccion">Dirección:</label>
                <input type="text" id="direccion" name="direccion" required>

                <input type="submit" value="Registrar Cliente">
            </form>
        </div>
        <div class="container derecha">
            <h3>Autos</h3>
            <form action="../../php/registrarAuto.php" method="post">
                <label for="Cliente_idCliente">ID del Cliente:</label>
                <select id="Cliente_idCliente" name="Cliente_idCliente" required>
                    <option>Seleccione un id</option>
                    <?php
                        include("../../class/class_cliente_dal.php");
                        $cliente_def = new cliente_dal;
                        $lista = $cliente_def->lista_cliente();
                        if($lista===null){
                            echo "<option>Primero agregue un cliente</option>";
                        }else{
                            foreach($lista as $cliente){
                                echo "<option value='".$cliente->getIdCliente()."'>".$cliente->getIdCliente()." (".$cliente->getNombre().")</option>";
                            }
                        }
                    ?>
                </select>
                <br><br>
                <label for="numeroPlacas">Número de Placas:</label>
                <input type="text" id="numeroPlacas" name="numeroPlacas" required>

                <label for="marca">Marca:</label>
                <input type="text" id="marca" name="marca" required>

                <label for="anio">Año:</label>
                <input type="text" id="anio" name="anio" required>

                <label for="modelo">Modelo:</label>
                <input type="text" id="modelo" name="modelo" required>
                <input type="submit" value="Registrar">
            </form>
        </div>
        <script>
            function servicios(){
                window.location.href="../Servicio";
            }
            function dash(){
                window.location.href="../VDashboard";
            }
        </script>
</body>
</html>