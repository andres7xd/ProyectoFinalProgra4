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

    <div id="carrucel_producto" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <?php $cont1 = 0 ?>
        <?php foreach ($fotos_productos as $f) { ?>
          <?php if ($cont1 == 0) { ?>
            <button type="button" data-bs-target="#carrucel_producto" data-bs-slide-to="0" class="active" aria-current="true" aria-label=""></button>
            <?php $cont1 = $cont1 + 1 ?>
          <?php } else { ?>
            <button type="button" data-bs-target="#carrucel_producto" data-bs-slide-to="<?php echo $cont1; ?>" aria-label=""></button>
            <?php $cont1 = $cont1 + 1 ?>
          <?php } ?>
        <?php } ?>
      </div>
      <div class="carousel-inner">
        <?php $cont = 0 ?>
        <?php foreach ($fotos_productos as $f) { ?>
          <?php if ($cont == 0) { ?>
            <div class="carousel-item active">
              <img src="<?php echo site_url('resources/img_productos/' . $f['foto']); ?>" class="d-block w-100" alt="..." height="530px">
            </div>
            <?php $cont = 1 ?>
          <?php } else { ?>
            <div class="carousel-item">
              <img src="<?php echo site_url('resources/img_productos/' . $f['foto']); ?>" class="d-block w-100" alt="..." height="530px">
            </div>
          <?php } ?>
        <?php } ?>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carrucel_producto" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carrucel_producto" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    <div id="info_productos">
      <?php foreach ($producto as $p) { ?>

        <div id="div_suscribirse">

          <?php echo form_open('product/add_suscripciones/' . $p['usuario_id'] . '/' . $p['producto_id']) ?>
          <button type="submit" id="suscribirse" name="suscribirse" class="btn btn-info">Suscribirse a la tienda</button>
          <?php echo form_close(); ?>
        </div>

        <div id="div_info1">
          <div class="div_info">
            <span class="pre_prod">Nombre Producto: </span> <span class="resp_prod"><?php echo ($this->input->post('txt_nombre') ? $this->input->post('txt_nombre') : $p['nombre']); ?></span>
          </div>

          <div class="div_info">
            <span class="pre_prod">Nombre Empresa: </span> <span class="resp_prod"><?php echo ($this->input->post('txt_empresa') ? $this->input->post('txt_empresa') : $p['nombre_real']); ?></span>
          </div>

          <div class="div_info">
            <span class="pre_prod">Unidades Disponibles:</span> <span class="resp_prod"><?php echo ($this->input->post('txt_disponibles') ? $this->input->post('txt_disponibles') : $p['unidades']); ?></span>
          </div>

          <div class="div_info">
            <span class="pre_prod">Fecha Publicacion: </span> <span class="resp_prod"><?php echo ($this->input->post('txt_fecha') ? $this->input->post('txt_fecha') : $p['fecha_publicacion']); ?></span>
          </div>

          <div class="div_info">
            <span class="pre_prod">Ubicacion Actual: </span> <span class="resp_prod"><?php echo ($this->input->post('txt_ubicacion') ? $this->input->post('txt_ubicacion') : $p['ubicacion_actual']); ?></span>
          </div>

          <div class="div_info">
            <span class="pre_prod">Precio: </span> <span class="resp_prod">₡<?php echo ($this->input->post('txt_precio') ? $this->input->post('txt_precio') : $p['precio']); ?></span>
          </div>

          <div class="div_info">
            <span class="pre_prod">Tiempo Envío: </span> <span class="resp_prod"><?php echo ($this->input->post('txt_t_envio') ? $this->input->post('txt_t_envio') : $p['tiempo_envio']); ?> días</span>
          </div>

          <div class="div_info">
            <span class="pre_prod">Costo Envío: </span> <span class="resp_prod">₡<?php echo ($this->input->post('txt_c_envio') ? $this->input->post('txt_c_envio') : $p['costo_envio']); ?></span>
          </div>

          <div class="div_info">
            <span class="pre_prod">Categoria: </span> <span class="resp_prod"><?php echo ($this->input->post('txt_categoria') ? $this->input->post('txt_categoria') : $p['categoria']); ?></span>
          </div>

          <div class="div_info">
            <span class="pre_prod_2">Descripción: </span> <span class="resp_prod"><?php echo ($this->input->post('txt_descripcion') ? $this->input->post('txt_descripcion') : $p['descripcion']); ?></span>
          </div>

        </div>

        <?php echo form_open('product/index/' . $p['producto_id']) ?>
        <input type="number" name="txt_cantidad_prod" id="txt_cantidad_prod" value="<?php echo $this->input->post('txt_cantidad_prod'); ?>" placeholder="Cantidad" title="Cantidad a comprar o añadir al carrito">

        <div id="actions_productos">
          <button type="submit" id="prod_comprar" name="prod_comprar" class="btn btn-primary">Comprar</button>

          <button type="submit" id="prod_carrito" name="prod_carrito" class="btn btn-success">Añadir al carrito</button>

          <button type="submit" id="prod_deseos" name="prod_deseos" class="btn btn-warning">Añadir a la lista de deseos</button>
        </div>

        <?php echo form_close(); ?>

    </div>


  <?php } ?>

  <div id="div_calificacion">

    <?php echo form_open('product/add_calificacion/' . $p['producto_id'] . '/' . $this->session->userdata['logged_in']['usuario_id']) ?>
    <div class="form-group">
      <select id="select_calificacion" name="select_calificacion" value="">

        <?php $aux = 0; ?>

        <?php if (!empty($calificacion)) { ?>

          <?php foreach ($calificacion as $c) { ?>

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
    <button type="submit" id="btn_calificar" name="btn_calificar" class="btn btn-primary">Calificar Producto</button>
    <?php echo form_close(); ?>
  </div>

  </div>
</div>