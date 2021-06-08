<div id="panel_app">

  <div id="user_box">
   

    <img id="icono_marketplace" src="<?php echo site_url("/resources/icons/marketplace.png") ?>" width=200 height=200>

    <div id="logout">
      <?php echo form_open('auth/logout'); ?>
      <button type="submit" name="btn_registrarse" id="btn_registrarse" class="boton2" title="Auntenticarse"><img src="<?php echo site_url("/resources/icons/Loguear_icon.png") ?>" width=22 height=22></button>
      <?php echo form_close(); ?>
    </div>

  </div>
  <br>
</div>

