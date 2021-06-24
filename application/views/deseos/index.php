<?php
if ($message_display != null) {
  if (isset($message_display)) {
    echo "<div class='alert alert-primary alert-dismissible fade show' role='alert' style='font-size: 15px';>" . $message_display . "
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
  }
}

if ($error_message != null) {
if (isset($error_message)) {
  echo "<div class='alert alert-danger alert-dismissible fade show' role='alert' style='font-size: 15px';>" . $error_message . "
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
}
}

if (validation_errors() !== "") {
  echo "<<div class='alert alert-warning alert-dismissible fade show' role='alert' style='font-size: 15px';>>" . validation_errors() . "
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
}
?>

<head>
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('resources/css/style.css'); ?>">
</head>

<div id="panel_app_deseos">

    <div id="user_box_deseos">
        <a href="<?php echo site_url('user/edit/' . $this->session->userdata['logged_in']['usuario_id']); ?>" title="Editar Perfil">
            <?php
            echo "<img src='" . site_url('/resources/photos/' . $this->session->userdata['logged_in']['foto'])
                . "' alt='photo_profile' width=50 height=50 id='photo_profile' />" .
                "<span>Lista de deseos de " . $this->session->userdata['logged_in']['nombre_real'] . ".</span>";
            ?>
        </a>

        <div id="logout">

            <?php echo form_open('buyer/index'); ?>
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
                                        <img src="<?php echo site_url('resources/img_productos/' . $f['foto']); ?>" class="d-block w-100" alt="..." height="180px">
                                    </div>
                                    <?php $cont = 1 ?>
                                <?php } else { ?>
                                    <div class="carousel-item">
                                        <img src="<?php echo site_url('resources/img_productos/' . $f['foto']); ?>" class="d-block w-100" alt="..." height="180px">
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

                    <?php echo form_open('deseos/add_carrito/' . $d['producto_id']); ?>
                    <button type="submit" name="btn_carrito" title="Añadir al carrito" class="btn_carrito_prod" title="Carrito"><img src="<?php echo site_url("/resources/icons/carrito.png") ?>" width=22 height=22></button>
                    <?php echo form_close(); ?>

                    <a href="<?php echo site_url('deseos/delete/' . $d['deseo_id']); ?>" id="btn_eliminar_deseo" name="btn_eliminar_deseo" title="Eliminar de la lista de deseos">❌</a>
                </div>
            </div>

        <?php } ?>
    </div>
</div>