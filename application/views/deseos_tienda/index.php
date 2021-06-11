<div id="panel_app_deseos">

    <div id="user_box_deseos_tienda">

        <span>
            <?php
            echo "<img src='" . site_url('/resources/photos/' . $this->session->userdata['logged_in']['foto'])
                . "' alt='photo_profile' width=50 height=50 id='photo_profile_deseos_tienda' />" .
                "Productos de " . $this->session->userdata['logged_in']['nombre_real'] . " en listas de deseos";
            ?>
        </span>

        <div id="logout">

            <?php echo form_open('store/index'); ?>
            <button type="submit" name="btn_logout" id="btn_logout" class="boton" title="Salir">🗙</button>
            <?php echo form_close(); ?>
        </div>
    </div>
    <br>
</div>

<div>

    <div id="main_panel_deseos_carrito">
        <?php foreach ($deseos as $d) { ?>
            <div class="div_productos">
                <div id="carousel_buyer_deseos_tienda" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <?php $cont1 = 0 ?>
                        <?php foreach ($fotos_producto as $f) { ?>
                            <?php if ($f["producto_id"] == $d["producto_id"]) { ?>
                                <?php if ($cont1 == 0) { ?>
                                    <button type="button" data-bs-target="#carrucel_producto" data-bs-slide-to="0" class="active" aria-current="true" aria-label=""></button>
                                    <?php $cont1 = $cont1 + 1 ?>
                                <?php } else { ?>
                                    <button type="button" data-bs-target="#carrucel_producto" data-bs-slide-to="<?php echo $cont1; ?>" aria-label=""></button>
                                    <?php $cont1 = $cont1 + 1 ?>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                    </div>
                    <div class="carousel-inner">
                        <?php $cont = 0 ?>
                        <?php foreach ($fotos_producto as $f) { ?>
                            <?php if ($f["producto_id"] == $d["producto_id"]) { ?>
                                <?php if ($cont == 0) { ?>
                                    <div class="carousel-item active">
                                        <img src="<?php echo site_url('resources/img_productos/' . $f['foto']); ?>" class="d-block w-100" alt="..." height="170px">
                                    </div>
                                    <?php $cont = 1 ?>
                                <?php } else { ?>
                                    <div class="carousel-item">
                                        <img src="<?php echo site_url('resources/img_productos/' . $f['foto']); ?>" class="d-block w-100" alt="..." height="170px">
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>

                <br>
                <span class="nombre_producto"><?php echo $d["nombre"] ?></span>
                <br>
                <span class="cant_per_prod">Cantidad Personas: <?php echo $d["COUNT(productos.nombre)"] ?></span>
            </div>

        <?php } ?>
    </div>
</div>