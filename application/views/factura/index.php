<head>
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('resources/css/reportes.css'); ?>">
</head>


<body id="body_reportes">

    <div>
        <?php echo form_open('carrito/index'); ?>
        <input type="submit" class="btn_cerrar_reporte" title="Cerrar reporte" value="✖️" style="float: right; margin:2px; border:transparent; background:transparent; font-size:20px;">
        <?php echo form_close(); ?>
    </div>
    <br>
    <br>
    <div>
        <img src="<?php echo site_url("/resources/icons/marketplace.png") ?>" width=170 height=170 style='float: left; border-radius:100px; margin:20px; cursor:pointer;'>
        <h2 style='position: relative; text-align: center; padding-top: 60px; color:black;'>Factura</h2>
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
                    $subtotal = 0;
                    $total = 0;
                    ?>
                    <?php foreach ($compra as $c) { ?>
                        <tr>
                            <td><?php echo $c['nombre'] ?></td>
                            <td><?php echo $c['precio_producto'] ?></td>
                            <td><?php echo $c['costo_envio'] ?></td>
                            <td><?php echo $c['fecha'] ?></td>
                            <?php
                            $subtotal = $c['precio_producto'] + $subtotal;
                            $total = $c['precio_producto'] + $c['costo_envio'] + $total;
                            ?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <h4 style='float:left; padding-top: 10px; color:black; margin:10px; margin-right:100px;'>Subtotal: ₡<?php echo $subtotal ?></h4>
        <h4 style='float:left; padding-top: 10px; color:black; margin:10px;'>Total: ₡<?php echo $total ?></h4>
    </div>