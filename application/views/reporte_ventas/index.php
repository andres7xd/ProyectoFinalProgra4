<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('resources/css/reportes.css'); ?>">
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
                            ?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <h4 style='float:left; padding-top: 10px; color:black; margin:10px;'>Saldo completo:  ₡<?php echo $saldo ?></h4>
    </div>
</body>

</html>