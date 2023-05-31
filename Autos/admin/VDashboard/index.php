<?php
include("../../class/class_db.php");
$conn = new class_db();

// Consulta para obtener los datos de la tabla
$sql = "SELECT estatus, COUNT(*) AS cantidad FROM Servicio GROUP BY estatus";
$conn->set_sql($sql);

$result = mysqli_query($conn->db_conn, $conn->db_query);

// Preparar los datos para la gráfica
$labels = [];
$data = [];

if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $labels[] = $row["estatus"];
        $data[] = $row["cantidad"];
    }
}

$conn->close_db();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Gráfica de barras</title>
    <link rel='stylesheet' type='text/css' media='screen' href='../../css/miestilo.css'>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="barra">
        <input type="button" value="Autos" onclick="autos()">
        <input type="button" value="Servicios" onclick="servicios()">
        <input type="button" value="Entregar" onclick="entrega()">
        <input type="button" value="Dashboard" onclick=""> 
        <input type="button" id="red" value="Salir" onclick="salir()">
    </div>
    <br><br><br>
    <canvas id="barChart"></canvas>

    <script>
        // Configuración de la gráfica
        var ctx = document.getElementById("barChart").getContext("2d");
        var barChart = new Chart(ctx, {
            type: "bar",
            data: {
                labels: <?php echo json_encode($labels); ?>,
                datasets: [{
                    label: "Cantidad",
                    data: <?php echo json_encode($data); ?>,
                    backgroundColor: "rgba(75, 192, 192, 0.2)",
                    borderColor: "rgba(75, 192, 192, 1)",
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <script>
        function servicios(){
            window.location.href="../Servicio";
        }
        function autos(){
            window.location.href="../Principal";
        }
        function entrega(){
            window.location.href="../Entregar";
        }
        function salir(){
            window.location.href="../../";
        }
    </script>
</body>
</html>
