<head>
  <link rel="stylesheet" type="text/css" href="<?php echo site_url('resources/css/style.css'); ?>">
</head>

<div id="panel_app">

  <div id="user_box">
    <img id="icono_marketplace" src="<?php echo site_url("/resources/icons/marketplace.png") ?>" width=200 height=200>

    <div id="logout">
      <?php echo form_open('auth/logout'); ?>
      <button type="submit" name="btn_registrarse" id="btn_registrarse" class="boton2" title="Auntenticarse"><img src="<?php echo site_url("/resources/icons/Loguear_icon.png") ?>" width=35 height=35></button>
      <?php echo form_close(); ?>
    </div>
  </div>
  <br>
</div>

<div>

  <div id="main_panel">
    <h1 align="center" style="text-decoration: underline; font-family: Century Gothic; font-size:25px;">PRODUCTOS MÁS VENDIDOS</h1>
    <?php foreach ($productos_vendidos as $pv) { ?>
      <div class="div_productos">
        <span class="nombre_producto"><?php echo $pv["nombre"] ?></span>
        <br>
        <span class="nombre_real">Tienda: <?php echo $pv["nombre_real"] ?></span>
        <br>
        <span class="unidades_vendidas">Unidades vendidas: <?php echo $pv["unidades_vendidas"] ?></span>
        <br>
        <span class="precio">₡<?php echo $pv["precio"] ?></span>
        <br>
        <input type="button" class="btnPerfil" value="Ver producto">
      </div>
    <?php } ?>
    </table>
  </div>

  <div id="main_panel">
    <h1 align="center" style="text-decoration: underline; font-family: Century Gothic; font-size:25px;">LISTA DE TIENDAS</h1>
    <?php foreach ($nombre_usuario as $u) { ?>

      <div class="div_tiendas">
        <span class="imagen_tienda"><?php echo "<img src='" . site_url('/resources/photos/' . $u['foto'])
                                      . "' alt=' Foto' title=' Foto' width=50 height=50 id='foto_file'/>"; ?></span>
        <br>
        <span class="nombre_real"><?php echo $u["nombre_real"] ?></span>
        <br>
        <?php echo form_open('profile/index/' . $u['usuario_id'] . '/' . 'home/index'); ?>
        <input type="submit" class="btnPerfil" value="Ver perfil">
        <?php echo form_close(); ?>
      </div>
    <?php } ?>
    </table>
  </div>
  
</div>