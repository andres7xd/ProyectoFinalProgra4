<div id="panel_app_carrito">

  <div id="user_box_carrito">
    <a href="<?php echo site_url('user/edit/' . $this->session->userdata['logged_in']['usuario_id']); ?>" title="Editar Perfil">
      <?php
      echo "<img src='" . site_url('/resources/photos/' . $this->session->userdata['logged_in']['foto'])
        . "' alt='photo_profile' width=50 height=50 id='photo_profile' />" .
        "<span>Carrito de " . $this->session->userdata['logged_in']['nombre_real'] . ".</span>";
      ?>
    </a>

    <?php echo form_open('buyer/index'); ?>
    <button type="submit" name="btn_logout" id="btn_logout" class="boton" title="Salir">🗙</button>
    <?php echo form_close(); ?>

  </div>

</div>

<br>
</div>

<div>
  <?php $suma_precios = 0 ?>
  <?php $costo_envio = 0 ?>
  <?php $descuento = 0 ?>
  <div id="main_panel_carrito">
    <?php foreach ($productos as $p) { ?>
      <div class="div_productos">
        <div id="carousel_carrito" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <?php $cont1 = 0 ?>
            <?php foreach ($fotos_producto as $f) { ?>
              <?php if ($f["producto_id"] == $p["producto_id"]) { ?>
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
              <?php if ($f["producto_id"] == $p["producto_id"]) { ?>
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
        <span class="nombre_producto"><?php echo $p["nombre"] ?></span>
        <br>
        <span class="nombre_real">Tienda: <?php echo $p["nombre_real"] ?></span>
        <br>
        <a href="<?php echo site_url('carrito/disminuir_producto/' . $p['carrito_id'] . '/' . $p['cantidad_productos']); ?>" id="btn_disminuir_producto_carrito" name="btn_disminuir_producto_carrito" title="Disminuir la cantidad del producto">➖</a>
        <span class="cantidad_productos">Cantidad: <?php echo $p["cantidad_productos"] ?></span>
        <a href="<?php echo site_url('carrito/aumentar_producto/' . $p['carrito_id'] . '/' . $p['cantidad_productos'] . '/' . $p['unidades']); ?>" id="btn_aumentar_producto_carrito" name="btn_aumentar_producto_carrito" title="Aumentar la cantidad del producto">➕</a>
        <br>
        <span class="precio_2">₡<?php echo $p["precio"] * $p["cantidad_productos"] ?></span>
        <br>

        <div class="actions_products">
          <a href="<?php echo site_url('carrito/eliminar_producto/' . $p['carrito_id']); ?>" id="btn_eliminar_producto_carrito" class="actions_carrito" name="btn_eliminar_producto_carrito" title="Eliminar del carrito de compras">❌</a>
        </div>
      </div>
      <?php $suma_precios = ($p["precio"] * $p["cantidad_productos"]) + $suma_precios ?>
      <?php $costo_envio = ($p["costo_envio"] * $p["cantidad_productos"]) + $costo_envio ?>
    <?php } ?>
  </div>

  <div id="info_compra">
    <?php $total = ($suma_precios + $costo_envio) - $descuento ?>
    <span class="info_compra2">Subtotal: ₡<?php echo $suma_precios ?></span>
    <br>
    <span class="info_compra2">Descuento: ₡<?php echo $descuento ?></span>
    <br>
    <span class="info_compra2">Costo envío: ₡<?php echo $costo_envio ?></span>
    <br>
    <span class="info_compra3">Total: ₡<?php echo $total ?></span>
    <br>
    <button type="submit" id="prod_comprar" name="prod_comprar" class="btn btn-primary">Continuar con la compra</button>
  </div>

</div>