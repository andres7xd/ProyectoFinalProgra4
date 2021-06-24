<head>
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('resources/css/style.css'); ?>">
</head>

<div id="panel_app_prod">

  <div id="user_box_prod">

    <div id="logout">

      <?php echo form_open($ventana); ?>
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
        <?php foreach ($usuario as $u) { ?>
              <img src="<?php echo site_url('resources/photos/' . $u['foto']); ?>" class="d-block w-100" alt="..." height="450px">
          <?php } ?>
    </div>
  
    <div id="info_productos">
      <?php foreach ($usuario as $p) { ?>

        
    

        <div id="div_info1">
          <div class="div_info">
            <span class="pre_prod">Nombre Usuario: </span> <span class="resp_prod"><?php echo ($this->input->post('txt_nombre') ? $this->input->post('txt_nombre') : $p['nombre_usuario']); ?></span>
          </div>

          <div class="div_info">
            <span class="pre_prod">Nombre Real: </span> <span class="resp_prod"><?php echo ($this->input->post('txt_nombre_real') ? $this->input->post('txt_nombre_real') : $p['nombre_real']); ?></span>
          </div>

          <div class="div_info">
            <span class="pre_prod">País:</span> <span class="resp_prod"><?php echo ($this->input->post('txt_pais') ? $this->input->post('txt_pais') : $p['pais']); ?></span>
          </div>

          <div class="div_info">
            <span class="pre_prod">Dirección: </span> <span class="resp_prod"><?php echo ($this->input->post('txt_direccion') ? $this->input->post('txt_direccion') : $p['direccion']); ?></span>
          </div>

          <div class="div_info">
            <span class="pre_prod">Teléfono: </span> <span class="resp_prod"><?php echo ($this->input->post('txt_telefono') ? $this->input->post('txt_telefono') : $p['telefono']); ?></span>
          </div>

          <div class="div_info">
            <span class="pre_prod">Email:</< /span> <span class="resp_prod">₡<?php echo ($this->input->post('txt_email') ? $this->input->post('txt_email') : $p['email']); ?></span>
          </div>

         
      <?php } ?>
    </div>
  </div>
</div>