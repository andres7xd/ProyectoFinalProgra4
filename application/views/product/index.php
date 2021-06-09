<div id="panel_app">

  <div id="user_box">
   

    <img id="icono_marketplace" src="<?php echo site_url("/resources/icons/marketplace.png") ?>" width=200 height=200>

    <div id="logout">
      <?php echo form_open('auth/logout'); ?>
      <button type="submit" name="btn_registrarse" id="btn_registrarse" class="boton2" title="Auntenticarse"><img src="<?php echo site_url("/resources/icons/Loguear_icon.png") ?>" width=22 height=22></button>
      <?php echo form_close(); ?>
    </div>


    <div id="carrucel_producto" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carrucel_producto" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carrucel_producto" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carrucel_producto" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?php echo site_url('resources/img_productos/bimbo.jpg'); ?>"  height="400"  class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="<?php echo site_url('resources/img_productos/bimbo.jpg'); ?>"  height="400" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="<?php echo site_url('resources/img_productos/bimbo.jpg'); ?>"  height="400" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carrucel_producto" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carrucel_producto" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>

  <div id="info_productos">

<label for="txt_nombre" class="control-label"><span class="text-danger"></span>Nombre Producto:</label>
<input type="text" name="txt_nombre" value="<?php echo ($this->input->post('txt_nombre') ? $this->input->post('txt_nombre') : $producto['nombre']); ?>">
<br>
<br>
<label for="txt_empresa" class="control-label"><span class="text-danger"></span>Nombre Empresa:</label>
<input type="text" name="txt_empresa" value="">
<br>
<br>
<label for="txt_disponibles" class="control-label"><span class="text-danger"></span>Unidades Disponibles:</label>
<input type="text" name="txt_disponibles" value="">
<br>
<br>
<label for="txt_fecha" class="control-label"><span class="text-danger"></span>Fecha Publicacion:</label>
<input type="text" name="txt_fecha" value="">
<br>
<br>
<label for="txt_ubicacion" class="control-label"><span class="text-danger"></span>Ubicacion Actual:</label>
<input type="text" name="txt_ubicacion" value="">
<br>
<br>
<label for="txt_precio" class="control-label"><span class="text-danger"></span>Precio:</label>
<input type="text" name="txt_precio" value="">
<br>
<br>
<label for="txt_t_envio" class="control-label"><span class="text-danger"></span>Tiempo Envio:</label>
<input type="text" name="txt_t_envio" value="">
<br>
<br>
<label for="txt_c_envio" class="control-label"><span class="text-danger"></span>Costo Envio:</label>
<input type="text" name="txt_c_envio" value="">
<br>
<br>
<label for="txt_categoria" class="control-label"><span class="text-danger"></span>Categoria:</label>
<input type="text" name="txt_categoria" value="">



</div>
</div>







  </div>
  <br>
</div>

