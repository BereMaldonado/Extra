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
        <input type="button" value="Autos" onclick="autos()">
        <input type="button" value="Servicios" onclick="">
        <input type="button" value="Entregar" onclick="entrega()">
        <input type="button" value="Dashboard" onclick="dash()">
    </div>
    <div class="center">
        <h2>Refaccionaria de Autos</h2>
    </div>
    <div class="container izquierda">
        <h3>Servicio</h3>
        <form action="../../php/registroServicio.php" method="post">
            <label for="idServicio">ID de Servicio:</label>
            <input type="text" id="idServicio" name="idServicio" required>
            <input type="button" value="buscar" onclick="buscarServicio()"><br><br>

            <label for="fechaIngreso">Fecha de Ingreso:</label>
            <input type="date" id="fechaIngreso" name="fechaIngreso" required><br><br>

            <label for="tipoServicio">Tipo de Servicio:</label>
            <input type="text" id="tipoServicio" name="tipoServicio" required>

            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" rows="4" required></textarea>

            <label>Estatus:</label>
                <input type="radio" id="En espera" name="estatus" value="En espera">
                <label for="iniciado">En Espera</label>

                <input type="radio" id="En proceso" name="estatus" value="En proceso">
                <label for="enProceso">En Proceso</label>

                <input type="radio" id="Finalizado" name="estatus" value="Finalizado">
                <label for="finalizado">Finalizado</label>
            <br><br>
            <label for="Auto_numeroPlacas">Número de Placas del Auto:</label>
            <select id="Auto_numeroPlacas" name="Auto_numeroPlacas" onchange="buscarCliente(event)" required>
                    <option>Seleccione una placa</option>
                    <?php
                        include("../../class/class_auto_dal.php");
                        $auto_def = new auto_dal;
                        $lista = $auto_def->lista_auto();
                        if($lista===null){
                            echo "<option>Primero agregue un auto</option>";
                        }else{
                            foreach($lista as $auto){
                                echo "<option value='".$auto->getNumeroPlacas()."'>".$auto->getNumeroPlacas()."</option>";
                            }
                        }
                    ?>
            </select><br><br>
            <label for="Auto_Cliente_idCliente">ID del Cliente del Auto:</label>
            <input type="text" id="Auto_Cliente_idCliente" name="Auto_Cliente_idCliente" required>

            <input type="submit" value="Registrar o Modificar Servicio">
        </form>
    </div>
    <div class="container derecha">
        <form action="../../php/agregarRefaccion.php" method="post">
            <h3>Refacciones del servicio</h3>
            <select id="idServicio" name="idServicio" onchange="buscarRefaccion(event)" required>
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
            <ul id="refacciones">
                <li>
                    <select id="refaccion" name="refaccion" required>
                        <option>Elige una refaccion</option>
                        <?php
                            include("../../class/class_refaccion_dal.php");
                            $refaccion_def = new refaccion_dal;
                            $lista = $refaccion_def->lista_refaccion();
                            if($lista===null){
                                echo "<option>No hay refacciones disponibles</option>";
                            }else{
                                for($i=1; $i<=count($lista); $i++){
                                    echo "<option value='".$lista[$i]->getIdRefaccion()."'>".$lista[$i]->getIdRefaccion()."</option>";
                                }
                            }
                        ?>
                    </select>
                    <input type="submit" value="agregar refaccion">
                </li>
            </ul>
        </form>
    </div>
    <script>
        function autos(){
            window.location.href="../Principal";
        }
        function dash(){
            window.location.href="../VDashboard";
        }

        function buscarCliente(event) {
            // Obtener el valor seleccionado del select
            var selectedValue = event.target.value;
            fetch("../../php/buscarCliente.php?numeroPlacas="+selectedValue)
            .then(response => response.json())
            .then(data => {
                console.log(data);
                document.getElementById("Auto_Cliente_idCliente").value = data;
            })
            .catch(function(error) {
                console.log('Error:', error);
            });
        }

        function buscarServicio(){
            var idServicio = document.getElementById("idServicio").value;
            fetch("../../php/buscarServicio.php?idServicio="+idServicio)
            .then(response => response.json())
            .then(data => {
                document.getElementById("fechaIngreso").value=data["fechaIngreso"];
                document.getElementById("tipoServicio").value=data["tipoServicio"];
                document.getElementById("descripcion").value=data["descripcion"];
                document.getElementById("Auto_numeroPlacas").value=data["Auto_NumeroPlacas"];
                document.getElementById("Auto_Cliente_idCliente").value=data["Auto_Cliente_IdCliente"];
                console.log(data["estatus"]);
                if(data["estatus"]=="En espera"){
                    document.getElementById("En espera").checked = true;
                }
                else if(data["estatus"]=="En proceso"){
                    document.getElementById("En proceso").checked = true;
                }
                else if(data["estatus"]=="Finalizado"){
                    document.getElementById("Finalizado").checked = true;
                }

            })
            .catch(function(error) {
                console.log('Error:', error);
            });
        }

        function buscarRefaccion(event){
            var selectedValue = event.target.value;
            fetch("../../php/buscarRefacciones.php?idServicio="+selectedValue)
            .then(response => response.json())
            .then(data => {
                console.log(data);
                console.log(Object.keys(data).length);
                let lista = document.getElementById("refacciones");
                for(var i = 0; i < Object.keys(data).length-1; i++){
                    var li = document.createElement("li");
                    li.textContent = data[i]["Refaccion_idRefaccion"];
                    var primerLi = lista.lastElementChild;
                    lista.insertBefore(li, primerLi);
                }
            })
            .catch(function(error) {
                console.log('Error:', error);
            });
        }
    </script>
</body>
</html>