<?php
if ($message_display != null) {
  if (isset($message_display)) {
    echo "<div class='alert alert-primary alert-dismissible fade show' role='alert' style='font-size: 15px';>" . $message_display . "
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
  }
}

if (isset($error_message)) {
  echo "<div class='alert alert-danger alert-dismissible fade show' role='alert' style='font-size: 15px';>" . $error_message . "
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
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

<div id="panel_app_carrito">

  <div id="user_box_carrito">
    <a href="<?php echo site_url('user/edit/' . $this->session->userdata['logged_in']['usuario_id']); ?>" title="Editar Perfil">
      <?php
      echo "<img src='" . site_url('/resources/photos/' . $this->session->userdata['logged_in']['foto'])
        . "' alt='photo_profile' width=50 height=50 id='photo_profile' />" .
        "<span>Carrito de " . $this->session->userdata['logged_in']['nombre_real'] . ".</span>";
      ?>
    </a>

   
      <?php echo form_open('factura/index'); ?>
      <input type="submit" class="btn btn-primary" style="float:right; position:relative; left:-3%; top:20px;" value="Factura de la última compra">
      <?php echo form_close(); ?>

      <button type="submit" id="prod_comprar_carrito" name="prod_comprar" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#aplicarPremioModal">Aplicar Premio</button>


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

    <?php foreach ($premios as $p) { ?>
        <?php if($p['premio'] == 'Desc 10%' and $p['estado'] == 1 ){ ?>
          <?php $descuento = ($suma_precios + $costo_envio) * 0.10?>
        <?php } ?>

        <?php if($p['premio'] == 'Envío gratis' and $p['estado'] == 1 ){ ?>
          <?php $costo_envio = 0?>
        <?php } ?>

        <?php } ?>

      <?php $total = ($suma_precios + $costo_envio) - $descuento ?>

    

      <span class="info_compra2">Subtotal: ₡<?php echo $suma_precios ?></span>
      <br>
      <span class="info_compra2">Descuento: ₡<?php echo $descuento ?></span>
      <br>
      <span class="info_compra2">Costo envío: ₡<?php echo $costo_envio ?></span>
      <br>
      <span class="info_compra3">Total: ₡<?php echo $total ?></span>
      <br>
      <button type="submit" id="prod_comprar_carrito" name="prod_comprar" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Continuar con la compra</button>
    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
          <?php echo form_open('carrito/comprar/'); ?>
          <div class="modal-body">
            <input id='id_suma_precios' name='id_suma_precios' type='hidden' value='<?php echo $suma_precios ?>'>
            <span class="compra" id="spm_subtotal" name="spm_subtotal" value="<?php echo $suma_precios ?>" style="color: black;">Subtotal: <?php echo $suma_precios ?></span>
            <br>
            <span class="compra" id="spm_costo_envio" name="spm_costo_envio" value="<?php echo $costo_envio ?>" style="color: black;">Costo Envío: <?php echo $costo_envio ?></span>
            <br>
            <span class="compra" id="spm_descuento" name="spm_descuento" value="<?php echo $descuento ?>" style="color: black;">Descuento: <?php echo $descuento ?></span>
            <br>
            <span class="compra" id="spm_total" name="spm_total" value="<?php echo $total ?>" style="color: black;">Total: <?php echo $total ?></span>
            <br>

            <div class="div_info">
              <span class="pre_prod_2">Tarjeta: </span>
              <select id="select_categoria" name="select_categoria" id="" value="cmb_numero_tarjeta" name="cmb_numero_tarjeta" class="cajatexto">
                <?php foreach ($tarjetas as $t) { ?>
                  <option id="" name="" value="<?php echo $t["numero_tarjeta"]; ?>"><?php echo $t["numero_tarjeta"]; ?></option>
                <?php } ?>
              </select>
            </div>


            <input id='id_precio_compra' name='id_precio_compra' type='hidden' value='<?php echo $total ?>'>




            <input type="text" id="txt_cvv" name="txt_cvv" placeholder="CVV" value="">


            <!-- <input type="text" id="txt_create_categoria" name="txt_create_categoria" placeholder="Nombre de la categoría" value=""> -->

          </div>

          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Comprar</button>
            <?php echo form_close(); ?>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          </div>


        </div>
      </div>
    </div>

<!-- < Modal aplicar premio> -->

    <div class="modal fade" id="aplicarPremioModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
          <?php foreach ($premios as $p) { ?>
            
            <div class="modal-body">
            
            <?php if($p['premio'] == 'Bon $50' and $p['estado'] ==1) { ?> 

              <?php echo form_open('carrito/actualizar_monto_tarjeta'); ?>
              <select id="select_tarjeta" name="select_tarjeta" id="" value="cmb_numero_tarjeta" name="cmb_numero_tarjeta" class="cajatexto">
                <?php foreach ($tarjetas as $t) { ?>
                  <option id="" name="" value="<?php echo $t["numero_tarjeta"]; ?>"><?php echo $t["numero_tarjeta"]; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Aplicar</button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
            <?php echo form_close(); ?>

            <?php } ?>

           
           
             

            <?php  } ?>
          </div>
        </div>
      </div>





  </div>