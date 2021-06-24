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
        <h2 style='position: relative; text-align: center; padding-top: 60px; color:black;'>Reporte de ofertas</h2>
        <br>

        <div>
            <table class="table table-based" style='font-size:15px;'>
                <thead>
                    <tr>
                        <th>Nombre del producto</th>
                        <th>Precio del producto</th>
                        <th>Costo de envío</th>
                        <th>Ubicacion</th>
                        <th>Fecha de fecha_publicacion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $saldo = 0;
                    ?>
                    <?php foreach ($ofertas as $o) { ?>
                        <tr>
                     
                            <td><?php echo $o['nombre'] ?></td>
                            <td><?php echo $o['precio'] ?></td>
                            <td><?php echo $o['costo_envio'] ?></td>
                            <td><?php echo $o['ubicacion_actual'] ?></td>
                            <td><?php echo $o['fecha_publicacion'] ?></td>
                        
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        





</body>