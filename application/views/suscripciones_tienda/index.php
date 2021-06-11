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

<div id="main_panel">
    <h1 align="center" style="text-decoration: underline; font-family: Century Gothic; font-size:25px;">LISTA DE COMPRADORES SUSCRITOS</h1>
    <?php foreach ($suscripciones as $u) { ?>

      <div class="div_tiendas">
        <span class="imagen_tienda"><?php echo "<img src='" . site_url('/resources/photos/' . $u['foto'])
                                          . "' alt=' Foto' title=' Foto' width=50 height=50 id='foto_file'/>"; ?></span>
        <br>
        <span class="nombre_real"><?php echo $u["nombre_real"] ?></span>
        <br>
        <input type="button" class="btnPerfil" value="Ver perfil">
      </div>
    <?php } ?>
    </table>
  </div>

<div>

</div>