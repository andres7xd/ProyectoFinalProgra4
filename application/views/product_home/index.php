<head>
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('resources/css/style.css'); ?>">
</head>

<div id="panel_app_prod">

  <div id="user_box_prod">

    <div id="logout">
      <?php echo form_open('home/index'); ?>
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
              <img src="<?php echo site_url('resources/img_productos/' . $f['foto']); ?>" class="d-block w-100" alt="..." height="450px">
            </div>
            <?php $cont = 1 ?>
          <?php } else { ?>
            <div class="carousel-item">
              <img src="<?php echo site_url('resources/img_productos/' . $f['foto']); ?>" class="d-block w-100" alt="..." height="450px">
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
        </div>
    </div>


  <?php } ?>

  </div>
</div>