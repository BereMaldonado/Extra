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
            <input type="button" value="Autos" onclick="auto()">
            <input type="button" value="Servicios" onclick="servicios()">
            <input type="button" value="Entregar" onclick="">
            <input type="button" value="Dashboard" onclick="dash()"> 
            <input type="button" id="red" value="Salir" onclick="salir()">
        </div>
        <div class="center">
            <h2>Refaccionaria de Autos</h2>
        </div>
        <div class="container izquierda">
            <h3>Entrega</h3>
            <form action="../../php/agregarEntrega.php" method="POST">
                <label for="idEntrega">ID de Entrega:</label>
                <input type="text" id="idEntrega" name="idEntrega" required><br>

                <label for="nomUsuario">Nombre de Usuario:</label>
                <input type="text" id="nomUsuario" name="nomUsuario" required><br>

                <label for="fechaEntrega">Fecha de Entrega:</label>
                <input type="date" id="fechaEntrega" name="fechaEntrega" required><br><br>

                <label for="proximoServicio">Próximo Servicio:</label>
                <input type="date" id="proximoServicio" name="proximoServicio" required><br><br>

                <label for="idServicio">ID de Servicio:</label>
                <select id="idServicio" name="idServicio" onchange="buscarServicio(event)" required>
                <option>Seleccione un servicio</option>
                <?php
                    include("../../class/class_servicio_dal.php");
                    $servicio_def = new servicio_dal;
                    $lista = $servicio_def->lista_servicio();
                    if($lista===null){
                        echo "<option>Primero agregue un servicio</option>";
                    }else{
                        for($i=1; $i<=count($lista); $i++){
                            echo "<option value='".$lista[$i]->getIdServicio()."'>".$lista[$i]->getIdServicio()."</option>";
                        }
                    }
                ?>
                </select>

                <label for="Servicio_Auto_numeroPlacas">Número de Placas del Auto:</label>
                <input type="text" id="Servicio_Auto_numeroPlacas" name="Servicio_Auto_numeroPlacas" required><br>

                <label for="Servicio_Auto_Cliente_idCliente">ID de Cliente:</label>
                <input type="text" id="Servicio_Auto_Cliente_idCliente" name="Servicio_Auto_Cliente_idCliente" required><br>

                <input type="submit" value="Registrar">
            </form>
        </div>
        <div class="container derecha">
            <h3>Lista</h3>
            <ul id="Entregas">
                <?php
                    include("../../class/class_entrega_dal.php");
                    $entrega_def = new entrega_dal;
                    $lista = $entrega_def->lista_entrega();
                    if($lista===null){
                        echo "<li>No hay entregas de servicios</li>";
                    }else{
                        for($i=1; $i<=count($lista); $i++){
                            echo "<li>Folio: ".$lista[$i]->getIdEntrega()."<br>Placas: ".$lista[$i]->getServicio_Auto_numeroPlacas()."<br> Siguiente servicio:".$lista[$i]->getFechaEntrega()."<br></li>";
                        }
                    }
                ?>
            </ul>
        </div>
        <script>
            function servicios(){
                window.location.href="../Servicio";
            }
            function auto(){
                window.location.href="../Principal";
            }
            function dash(){
                window.location.href="../VDashboard";
            }
            function salir(){
                window.location.href="../../";
            }
            function buscarServicio(event){
                var selectedValue = event.target.value;
                fetch("../../php/buscarServicio.php?idServicio="+selectedValue)
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    document.getElementById("Servicio_Auto_numeroPlacas").value = data["Auto_NumeroPlacas"];
                    document.getElementById("Servicio_Auto_Cliente_idCliente").value = data["Auto_Cliente_IdCliente"];
                })
                .catch(function(error) {
                    console.log('Error:', error);
                });
            }
        </script>
</body>
</html>