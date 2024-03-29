<head>
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('resources/css/style.css'); ?>">
</head>

<div id="panel_app_deseos">

    <div id="user_box_deseos_tienda">

        <span>
            <?php
            echo "<img src='" . site_url('/resources/photos/' . $this->session->userdata['logged_in']['foto'])
                . "' alt='photo_profile' width=50 height=50 id='photo_profile_deseos_tienda' />" .
                "Compradores suscritos a " . $this->session->userdata['logged_in']['nombre_real'] . ".";
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

<div id="main_panel_deseos_carrito">
    <h1 align="center" style="text-decoration: underline; font-family: Century Gothic; font-size:25px;">LISTA DE COMPRADORES SUSCRITOS</h1>
    <?php foreach ($suscripciones as $u) { ?>

      <div class="div_tiendas">
        <span class="imagen_tienda"><?php echo "<img src='" . site_url('/resources/photos/' . $u['foto'])
                                          . "' alt=' Foto' title=' Foto' width=50 height=50 id='foto_file'/>"; ?></span>
        <br>
        <span class="nombre_real"><?php echo $u["nombre_real"] ?></span>
        <br>
        <?php echo form_open('profile/index/' .  $u['comprador_id'] . '/' . 'Suscripciones_tienda/index'); ?>
        <input type="submit" class="btnPerfil" value="Ver perfil">
        <?php echo form_close(); ?>
      </div>
    <?php } ?>
    </table>
  </div>

<div>

</div>