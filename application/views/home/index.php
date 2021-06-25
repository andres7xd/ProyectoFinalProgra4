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

    <div style="text-align:center;">
      <?php echo form_open('home/process_tienda'); ?>
      <br>
      <input type="text" class="cajatexto_search" id="txt_prod_search" name="txt_nombre_tienda" placeholder="Escribe aquí para buscar una tienda">
      <button type="submit" name="btn_search" id="btn_search" value="btn_search" class="boton" title="Buscar">🔍</button>
      <span style="color: #f00"><?php echo form_error('txt_post'); ?></span>
      <?php echo form_close(); ?>
    </div>

    <h1 align="center" style="text-decoration: underline; font-family: Century Gothic; font-size:25px;">LISTA DE TIENDAS</h1>
    <?php foreach ($nombre_usuario as $u) { ?>

      <div class="div_tiendas">
        <span class="imagen_tienda"><?php echo "<img src='" . site_url('/resources/photos/' . $u['foto'])
                                      . "' alt=' Foto' title=' Foto' width=50 height=50 id='foto_file'/>"; ?></span>
        <br>
        <span class="nombre_real"><?php echo $u["nombre_real"] ?></span>
        <br>
        <?php
        $una_estrella = 0;
        $dos_estrellas = 0;
        $tres_estrellas = 0;
        $cuatro_estrellas = 0;
        $cinco_estrellas = 0;
        $promedio = 0;
        $cant_estrellas = "";

        foreach ($calificacion_tienda as $ct) {
          if ($ct["tienda_id"] == $u["usuario_id"]) {
            if ($ct["calificacion"] == 1) {
              $una_estrella =  $una_estrella + 1;
            }
            if ($ct["calificacion"] == 2) {
              $dos_estrellas =  $dos_estrellas + 1;
            }
            if ($ct["calificacion"] == 3) {
              $tres_estrellas =  $tres_estrellas + 1;
            }
            if ($ct["calificacion"] == 4) {
              $cuatro_estrellas =  $cuatro_estrellas + 1;
            }
            if ($ct["calificacion"] == 5) {
              $cinco_estrellas =  $cinco_estrellas + 1;
            }

            $promedio = (((1 * $una_estrella) + (2 * $dos_estrellas) + (3 * $tres_estrellas) + (4 * $cuatro_estrellas) +
              (5 * $cinco_estrellas)) / (($una_estrella + $dos_estrellas + $tres_estrellas + $cuatro_estrellas + $cinco_estrellas)));

            if (round($promedio) == 1) {
              $cant_estrellas = "⭐";
            }
            if (round($promedio) == 2) {
              $cant_estrellas = "⭐⭐";
            }
            if (round($promedio) == 3) {
              $cant_estrellas = "⭐⭐⭐";
            }
            if (round($promedio) == 4) {
              $cant_estrellas = "⭐⭐⭐⭐";
            }
            if (round($promedio) == 5) {
              $cant_estrellas = "⭐⭐⭐⭐⭐";
            }
          }
        }
        ?>
        <span class="estrellas"><?php echo $cant_estrellas ?></span>

        <br>
        <?php echo form_open('profile/index/' . $u['usuario_id'] . '/' . 'home/index'); ?>
        <input type="submit" class="btnPerfil" value="Ver perfil">
        <?php echo form_close(); ?>
      </div>
    <?php } ?>
    </table>
  </div>

  <div id="main_panel">

    <div style="text-align:center;">
      <?php echo form_open('home/process_producto'); ?>
      <br>
      <input type="text" class="cajatexto_search" id="txt_prod_search" name="txt_nombre" placeholder="Escribe aquí para buscar un producto">
      <button type="submit" name="btn_search" id="btn_search" value="btn_search" class="boton" title="Buscar">🔍</button>
      <span style="color: #f00"><?php echo form_error('txt_post'); ?></span>
      <?php echo form_close(); ?>
    </div>

    <h1 align="center" style="text-decoration: underline; font-family: Century Gothic; font-size:25px;">PRODUCTOS MÁS VENDIDOS</h1>
    <?php foreach ($productos_vendidos as $pv) { ?>
      <div class="div_productos">

        <div id="carousel_carrito" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <?php $cont1 = 0 ?>
            <?php foreach ($fotos_producto as $f) { ?>
              <?php if ($f["producto_id"] == $pv["producto_id"]) { ?>
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
              <?php if ($f["producto_id"] == $pv["producto_id"]) { ?>
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

        <span class="nombre_producto"><?php echo $pv["nombre"] ?></span>
        <br>
        <span class="nombre_real">Tienda: <?php echo $pv["nombre_real"] ?></span>
        <br>
        <span class="unidades_vendidas">Unidades vendidas: <?php echo $pv["unidades_vendidas"] ?></span>
        <br>
        <?php
        $una_estrella = 0;
        $dos_estrellas = 0;
        $tres_estrellas = 0;
        $cuatro_estrellas = 0;
        $cinco_estrellas = 0;
        $promedio = 0;
        $cant_estrellas = "";

        foreach ($calificacion_producto as $c) {
          if ($c["producto_id"] == $pv["producto_id"]) {
            if ($c["calificacion"] == 1) {
              $una_estrella =  $una_estrella + 1;
            }
            if ($c["calificacion"] == 2) {
              $dos_estrellas =  $dos_estrellas + 1;
            }
            if ($c["calificacion"] == 3) {
              $tres_estrellas =  $tres_estrellas + 1;
            }
            if ($c["calificacion"] == 4) {
              $cuatro_estrellas =  $cuatro_estrellas + 1;
            }
            if ($c["calificacion"] == 5) {
              $cinco_estrellas =  $cinco_estrellas + 1;
            }
            $promedio = (((1 * $una_estrella) + (2 * $dos_estrellas) + (3 * $tres_estrellas) + (4 * $cuatro_estrellas) +
              (5 * $cinco_estrellas)) / (($una_estrella + $dos_estrellas + $tres_estrellas + $cuatro_estrellas + $cinco_estrellas)));

            if (round($promedio) == 1) {
              $cant_estrellas = "⭐";
            }
            if (round($promedio) == 2) {
              $cant_estrellas = "⭐⭐";
            }
            if (round($promedio) == 3) {
              $cant_estrellas = "⭐⭐⭐";
            }
            if (round($promedio) == 4) {
              $cant_estrellas = "⭐⭐⭐⭐";
            }
            if (round($promedio) == 5) {
              $cant_estrellas = "⭐⭐⭐⭐⭐";
            }
          }
        }
        ?>

        <span class="estrellas"><?php echo $cant_estrellas ?></span>
        <br>
        <span class="precio">₡<?php echo $pv["precio"] ?></span>
        <br>
        <div class="actions_products">

          <?php echo form_open('product_home/index/' . $pv['producto_id']); ?>
          <input type="submit" class="btn_ver_2" title="Ver producto" value="👁️">
          <?php echo form_close(); ?>

        </div>
      </div>
    <?php } ?>
    </table>
  </div>

</div>