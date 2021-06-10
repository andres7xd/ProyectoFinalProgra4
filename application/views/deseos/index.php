<div id="panel_app">

    <div id="user_box">
        <a href="<?php echo site_url('user/edit/' . $this->session->userdata['logged_in']['usuario_id']); ?>" title="Editar Perfil">
            <?php
            echo "<img src='" . site_url('/resources/photos/' . $this->session->userdata['logged_in']['foto'])
                . "' alt='photo_profile' width=50 height=50 id='photo_profile' />" .
                "<span>HOLA! " . $this->session->userdata['logged_in']['nombre_real'] . ". ✎</span>";
            ?>
        </a>

        <img id="icono_marketplace" src="<?php echo site_url("/resources/icons/marketplace.png") ?>" width=170 height=170>


        <!-- 
  <?php echo form_open('auth/logout'); ?>
    <button type="submit" name="btn_logout" id="btn_registrarse" class="boton2" title="Auntenticarse"><img src="<?php echo site_url("/resources/icons/Loguear_icon.png") ?>"width=22 height=22>Autenticarse</button>
    <?php echo form_close(); ?> -->

        <div id="logout">

            <?php echo form_open('home/index'); ?>
            <button type="submit" name="btn_logout" id="btn_logout" class="boton" title="Salir">🗙</button>
            <?php echo form_close(); ?>
        </div>
    </div>
    <br>
</div>

<div>

    <div id="main_panel">
        <h1 align="center" style="text-decoration: underline; font-family: Century Gothic; font-size:25px;">LISTA DE DESEOS</h1>
        <?php foreach ($deseos as $d) { ?>
            <div class="div_productos">
                <input id='id_h' name='id_h' type='hidden' value='<?php echo $p['producto_id']; ?>'>
                <div id="carousel_buyer" class="carousel slide" data-bs-ride="carousel">
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
                                        <img src="<?php echo site_url('resources/img_productos/' . $f['foto']); ?>" class="d-block w-100" alt="..." height="150px">
                                    </div>
                                    <?php $cont = 1 ?>
                                <?php } else { ?>
                                    <div class="carousel-item">
                                        <img src="<?php echo site_url('resources/img_productos/' . $f['foto']); ?>" class="d-block w-100" alt="..." height="150px">
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>

                <br>

                <span class="nombre_producto"><?php echo $d["nombre"] ?></span>
                <br>
                <span class="nombre_real">Tienda: <?php echo $d["nombre_real"] ?></span>
                <br>
                <span class="unidades_vendidas">Unidades disponibles: <?php echo $d["unidades"] ?></span>
                <br>
                <span class="precio">₡<?php echo $d["precio"] ?></span>
                <br>

                <div class="actions_products">
                    <?php echo form_open('product/index/' . $d['producto_id']); ?>
                    <input type="submit" class="btn_ver" title="Ver producto" value="👁️">
                    <?php echo form_close(); ?>

                    <?php echo form_open('carritos/index'); ?>
                    <button type="submit" name="btn_carrito" title="Añadir al carrito" class="btn_carrito_prod" title="Carrito"><img src="<?php echo site_url("/resources/icons/carrito.png") ?>" width=22 height=22></button>
                    <?php echo form_close(); ?>

                    <a href="<?php echo site_url('deseos/delete/' . $d['deseo_id']); ?>" id="btn_eliminar_deseo" name="btn_eliminar_deseo" title="Eliminar de la lista de deseos">❌</a>

                </div>
            </div>

        <?php } ?>
    </div>
</div>