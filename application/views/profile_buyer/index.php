<head>
  <link rel="stylesheet" type="text/css" href="<?php echo site_url('resources/css/style.css'); ?>">
</head>

<div id="panel_app_prod">

  <div id="user_box_prod">

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

    <br><br>

    <div id="carrucel_tienda" class="carousel slide" data-bs-ride="carousel">
      <?php foreach ($usuario as $u) { ?>
        <img src="<?php echo site_url('resources/photos/' . $u['foto']); ?>" class="d-block w-100" alt="..." height="250px">
      <?php } ?>
    </div>

    <div id="info_tiendas">
      <?php foreach ($usuario as $p) { ?>

        <div id="div_info1">
          <div class="div_info">
            <span class="pre_prod">Nombre: </span> <span class="resp_prod"><?php echo ($this->input->post('txt_nombre_real') ? $this->input->post('txt_nombre_real') : $p['nombre_real']); ?></span>
          </div>

          <div class="div_info">
            <span class="pre_prod">Dirección: </span> <span class="resp_prod"><?php echo ($this->input->post('txt_direccion') ? $this->input->post('txt_direccion') : $p['direccion']); ?></span>
          </div>

          <div class="div_info">
            <span class="pre_prod">Teléfono: </span> <span class="resp_prod"><?php echo ($this->input->post('txt_telefono') ? $this->input->post('txt_telefono') : $p['telefono']); ?></span>
          </div>

          <div class="div_info">
            <span class="pre_prod">Email: </span> <span class="resp_prod"><?php echo ($this->input->post('txt_email') ? $this->input->post('txt_email') : $p['email']); ?></span>
          </div>

        <?php } ?>
        </div>
    </div>





    <div id="div_calificacion_tienda">

      <?php foreach ($usuario as $u) { ?>

        <?php echo form_open('profile_buyer/add_calificacion/' . $this->session->userdata['logged_in']['usuario_id'] . '/' . $u['usuario_id']) ?>
        <div class="form-group">
          <select id="select_calificacion" name="select_calificacion" value="">

            <?php $aux = 0; ?>

            <?php if (!empty($calificacion_tienda)) { ?>

              <?php foreach ($calificacion_tienda as $c) { ?>

                <?php if ($c["calificacion"] == 1) { ?>
                  <option value="1" selected>⭐</option>
                  <option value="2">⭐⭐</option>
                  <option value="3">⭐⭐⭐</option>
                  <option value="4">⭐⭐⭐⭐</option>
                  <option value="5">⭐⭐⭐⭐⭐</option>
                <?php } ?>

                <?php if ($c["calificacion"] == 2) { ?>
                  <option value="1">⭐</option>
                  <option value="2" selected>⭐⭐</option>
                  <option value="3">⭐⭐⭐</option>
                  <option value="4">⭐⭐⭐⭐</option>
                  <option value="5">⭐⭐⭐⭐⭐</option>
                <?php } ?>

                <?php if ($c["calificacion"] == 3) { ?>
                  <option value="1">⭐</option>
                  <option value="2">⭐⭐</option>
                  <option value="3" selected>⭐⭐⭐</option>
                  <option value="4">⭐⭐⭐⭐</option>
                  <option value="5">⭐⭐⭐⭐⭐</option>
                <?php } ?>

                <?php if ($c["calificacion"] == 4) { ?>
                  <option value="1">⭐</option>
                  <option value="2">⭐⭐</option>
                  <option value="3">⭐⭐⭐</option>
                  <option value="1" selected>⭐⭐⭐⭐</option>
                  <option value="5">⭐⭐⭐⭐⭐</option>
                <?php } ?>

                <?php if ($c["calificacion"] == 5) { ?>
                  <option value="1">⭐</option>
                  <option value="2">⭐⭐</option>
                  <option value="3">⭐⭐⭐</option>
                  <option value="4">⭐⭐⭐⭐</option>
                  <option value="5" selected>⭐⭐⭐⭐⭐</option>
                <?php } ?>
              <?php } ?>

            <?php } else { ?>

              <option value="1">⭐</option>
              <option value="2">⭐⭐</option>
              <option value="3">⭐⭐⭐</option>
              <option value="4">⭐⭐⭐⭐</option>
              <option value="5">⭐⭐⭐⭐⭐</option>

            <?php } ?>
          </select>

        </div>
        <br>
        <button type="submit" id="btn_calificar" name="btn_calificar" class="btn btn-primary">Calificar Tienda</button>
        <?php echo form_close(); ?>
      <?php } ?>
    </div>

    <?php echo form_open('profile_buyer/process/' . $u['usuario_id']); ?>
    <button type="submit" class="btn btn-danger" name="btn_abuso" id="btn_abuso" value="btn_abuso" class="boton"
    style="position:relative; top:200px; left:5%;" >Reportar abuso</button>
    <?php echo form_close(); ?>

  </div>

  <div>
    <br><br><br><br>

    <div id="post_box">

      <?php foreach ($usuario as $u) { ?>
        <?php echo form_open('profile_buyer/process/' . $u['usuario_id']); ?>
        <br>
        <input type="text" class="cajatexto_search" id="txt_prod_search" name="txt_nombre" placeholder="Escribe aquí para buscar un producto">
        <button type="submit" name="btn_search" id="btn_search" value="btn_search" class="boton" title="Buscar">🔍</button>
        <span style="color: #f00"><?php echo form_error('txt_post'); ?></span>
        <?php echo form_close(); ?>
      <?php } ?>
    </div>

    <br><br>

    <h1 align="center" style="text-decoration: underline; font-family: Century Gothic; font-size:25px;">LISTA DE PRODUCTOS</h1>
    <?php foreach ($usuario as $u) { ?>
      <?php foreach ($productos as $p) { ?>
        <?php if ($p['usuario_id'] == $u['usuario_id']) { ?>
          <div class="div_productos">
            <input id='id_h' name='id_h' type='hidden' value='<?php echo $p['producto_id']; ?>'>
            <div id="carousel_buyer" class="carousel slide" data-bs-ride="carousel">
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

            <span class="nombre_producto"><?php echo $p["nombre"] ?></span>
            <br>
            <span class="nombre_real">Tienda: <?php echo $p["nombre_real"] ?></span>
            <br>
            <span class="unidades_vendidas">Unidades disponibles: <?php echo $p["unidades"] ?></span>
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
              if ($c["producto_id"] == $p["producto_id"]) {
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
            <span class="precio">₡<?php echo $p["precio"] ?></span>
            <br>

            <div class="actions_products">
              <?php echo form_open('product/index/' . $p['producto_id']); ?>
              <input type="submit" class="btn_ver" title="Ver producto" value="👁️">
              <?php echo form_close(); ?>

              <?php echo form_open('buyer/add_carrito/' . $p['producto_id']); ?>
              <button type="submit" name="btn_carrito" title="Añadir al carrito" class="btn_carrito_prod" title="Carrito"><img src="<?php echo site_url("/resources/icons/carrito.png") ?>" width=22 height=22></button>
              <?php echo form_close(); ?>

              <?php echo form_open('buyer/add_deseo/' . $p['producto_id']) ?>
              <button type="submit" name="btn_deseos" title="Añadir a la lista de deseos" class="btn_deseos_prod" title="Lista de deseos"><img src="<?php echo site_url("/resources/icons/deseos.png") ?>" width=22 height=22></button>
              <?php echo form_close(); ?>
            </div>
          </div>
        <?php } ?>
      <?php } ?>
    <?php } ?>

  </div>