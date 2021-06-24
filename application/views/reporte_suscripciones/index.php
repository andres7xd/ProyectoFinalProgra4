<head>
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('resources/css/reportes.css'); ?>">
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
        <h2 style='position: relative; text-align: center; padding-top: 60px; right:6.5%; color:black;'>Tiendas a las que estoy suscrito</h2>

        <br>

        <div>
            <table class="table table-based" style='font-size:15px;'>
                <thead>
                    <tr>
                        <th>Nombre de la tienda</th>
                        <th>Teléfono</th>
                        <th>Email</th>
                        <th>Dirección</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $saldo = 0;
                    ?>
                    <?php foreach ($suscripciones as $s) { ?>
                        <tr>
                            <td><?php echo $s['nombre_real'] ?></td>
                            <td><?php echo $s['telefono'] ?></td>
                            <td><?php echo $s['email'] ?></td>
                            <td><?php echo $s['direccion'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <div>
        <h2 style='position: relative; text-align: center; right:1%; padding-top: 100px; color:black;'>Productos en lista de deseo</h2>

        <br>

        <div>
            <table class="table table-based" style='font-size:15px;'>
                <thead>
                    <tr>
                        <th>Nombre de la tienda</th>
                        <th>Nombre del producto</th>
                        <th>Precio</th>
                        <th>Costo de envío</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $saldo = 0;
                    ?>
                    <?php foreach ($p_suscripciones as $ps) { ?>
                        <tr>
                            <td><?php echo $ps['nombre_real'] ?></td>
                            <td><?php echo $ps['nombre'] ?></td>
                            <td><?php echo $ps['precio'] ?></td>
                            <td><?php echo $ps['costo_envio'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>