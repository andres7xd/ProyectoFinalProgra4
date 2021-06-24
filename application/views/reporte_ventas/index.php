<!DOCTYPE html>
<html>

<?php
    $etiquetas = [];
$datosVentas = [];
$datosid = [];
?>

<head>
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('resources/css/reportes.css'); ?>">
    

<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gráficas con chart.js y PHP | By Parzibyte</title>
    <!-- Importar chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
</head>


<body id="body_reportes">

    <div>
        <?php echo form_open('store/index'); ?>
        <input type="submit" class="btn_cerrar_reporte" title="Cerrar reporte" value="✖️" style="float: right; margin:2px; border:transparent; background:transparent; font-size:20px;">
        <?php echo form_close(); ?>
    </div>
    <br>
    <br>

    <div>
        <img src="<?php echo site_url("/resources/icons/marketplace.png") ?>" width=170 height=170 style='float: left; border-radius:100px; margin:20px; cursor:pointer;'>
        <h2 style='position: relative; text-align: center; padding-top: 60px; color:black;'>Reporte de ventas</h2>
        <br>

        <div>
            <table class="table table-based" style='font-size:15px;'>
                <thead>
                    <tr>
                        <th>Nombre del producto</th>
                        <th>Precio del producto</th>
                        <th>Costo de envío</th>
                        <th>Nombre del comprador</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $saldo = 0;
                    ?>
                    <?php foreach ($ventas as $t) { ?>
                        <tr>
                            <td><?php echo $t['nombre'] ?></td>
                            <td><?php echo $t['precio_producto'] ?></td>
                            <td><?php echo $t['costo_envio'] ?></td>
                            <td><?php echo $t['nombre_real'] ?></td>
                            <?php
                            $saldo = $t['precio_producto'] + $t['costo_envio'] + $saldo;

                            if(in_array($t['producto_id'], $datosid) == false){
                                array_push($etiquetas,$t['nombre']);
                                array_push($datosVentas,$t['unidades_vendidas']);
                                array_push($datosid,$t['producto_id']);
                            }
                           
                            
                            ?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <h4 style='float:left; padding-top: 10px; color:black; margin:10px;'>Saldo completo:  ₡<?php echo $saldo ?></h4>
    </div>










    <h1>Gráfica creada con PHP</h1>
   
    <canvas id="grafica"></canvas>
    <script type="text/javascript">
        // Obtener una referencia al elemento canvas del DOM
        const $grafica = document.querySelector("#grafica");
        // Pasaamos las etiquetas desde PHP
        const etiquetas = <?php echo json_encode($etiquetas) ?>;
        // Podemos tener varios conjuntos de datos. Comencemos con uno
        const datosVentas2020 = {
            label: "Ventas por mes",
            // Pasar los datos igualmente desde PHP
            data: <?php echo json_encode($datosVentas) ?>,
            backgroundColor: 'rgba(54, 162, 235, 0.2)', // Color de fondo
            borderColor: 'rgba(54, 162, 235, 1)', // Color del borde
            borderWidth: 1, // Ancho del borde
        };
        new Chart($grafica, {
            type: 'pie', // Tipo de gráfica
            data: {
                labels: etiquetas,
                datasets: [
                    datosVentas2020,
                    // Aquí más datos...
                ]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }],
                },
            }
        });
    </script>












</body>

</html>