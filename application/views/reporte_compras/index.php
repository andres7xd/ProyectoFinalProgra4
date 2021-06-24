<?php
$etiquetas = [];
$datosCompras = [];
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
        <?php echo form_open('buyer/index'); ?>
        <input type="submit" class="btn_cerrar_reporte" title="Cerrar reporte" value="✖️" style="float: right; margin:2px; border:transparent; background:transparent; font-size:20px;">
        <?php echo form_close(); ?>
    </div>
    <br>
    <br>
    <div>
        <img src="<?php echo site_url("/resources/icons/marketplace.png") ?>" width=170 height=170 style='float: left; border-radius:100px; margin:20px; cursor:pointer;'>
        <h2 style='position: relative; text-align: center; padding-top: 60px; color:black;'>Reporte de compras</h2>
        <br>

        <div>
            <table class="table table-based" style='font-size:15px;'>
                <thead>
                    <tr>
                        <th>Nombre del producto</th>
                        <th>Precio del producto</th>
                        <th>Costo de envío</th>
                        <th>Fecha de la compra</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $saldo = 0;
                    ?>
                    <?php foreach ($compras as $c) { ?>
                        <tr>
                            <td><?php echo $c['nombre'] ?></td>
                            <td><?php echo $c['precio_producto'] ?></td>
                            <td><?php echo $c['costo_envio'] ?></td>
                            <td><?php echo $c['fecha'] ?></td>
                            <?php
                            $saldo = $c['precio_producto'] + $c['costo_envio'] + $saldo;



                          

                            ?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <h4 style='float:left; padding-top: 10px; color:black; margin:10px;'>Saldo invertido: ₡<?php echo $saldo ?></h4>
    </div>


    <?php foreach ($datos_grafico as $dtg) { ?>

     <?php
        $monto = 0;
                                $monto = $dtg['SUM(precio_producto)'] + $dtg['SUM(costo_envio)'];
                                array_push($etiquetas, $dtg['nombre']);
                                array_push($datosCompras, $monto);
                               
         ?>                   

        <?php } ?>










    <h1>Gráfica creada con PHP</h1>

    <canvas id="grafica"></canvas>
    <script type="text/javascript">
        // Obtener una referencia al elemento canvas del DOM
        const $grafica = document.querySelector("#grafica");
        // Pasaamos las etiquetas desde PHP
        const etiquetas = <?php echo json_encode($etiquetas) ?>;
        // Podemos tener varios conjuntos de datos. Comencemos con uno
        const datosVentas2020 = {
            label: "Productos segun el total invertido",
            // Pasar los datos igualmente desde PHP
            data: <?php echo json_encode($datosCompras) ?>,
            backgroundColor: 'rgba(54, 162, 235, 0.2)', // Color de fondo
            borderColor: 'rgba(54, 162, 235, 1)', // Color del borde
            borderWidth: 1, // Ancho del borde
        };
        new Chart($grafica, {
            type: 'bar', // Tipo de gráfica
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