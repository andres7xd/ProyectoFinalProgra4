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
  <?php $cont1 =0 ?>
  <?php foreach ($fotos_productos as $f) { ?> 

    
    <?php if ($cont1 ==0) { ?>
      <button type="button" data-bs-target="#carrucel_producto" data-bs-slide-to="0" class="active" aria-current="true" aria-label=""></button>
      <?php $cont1 =$cont1 +1 ?>
      <?php } else{?>
      <?php print_r($cont1) ?>
        <button type="button" data-bs-target="#carrucel_producto" data-bs-slide-to="<?php echo $cont1; ?>" aria-label=""></button>
        <?php $cont1 = $cont1 +1 ?>
        <?php } ?>
    
    <?php } ?>
  </div>
  
  <div class="carousel-inner">
  <?php $cont =0 ?>

  <?php foreach ($fotos_productos as $f) { ?>

  

  <?php if ($cont ==0) { ?>
 <div class="carousel-item active">
      <img src="<?php echo site_url('resources/img_productos/'.$f['foto']); ?>"  height="400"  class="d-block w-100" alt="...">
    </div>
    <?php $cont =1 ?>
<?php } else{?>
    
     <div class="carousel-item">
      <img src="<?php echo site_url('resources/img_productos/'.$f['foto']); ?>"  height="400" class="d-block w-100" alt="...">
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




  <div id="info_productos">


    <?php foreach ($producto as $p) { ?>

<label for="txt_nombre" class="control-label"><span class="text-danger"></span>Nombre Producto:</label>
<input type="text" name="txt_nombre" value="<?php echo ($this->input->post('txt_nombre') ? $this->input->post('txt_nombre') : $p['nombre']); ?>" id="txt_nombre">
<br>
<br> 
<label for="txt_empresa" class="control-label"><span class="text-danger"></span>Nombre Empresa:</label>
<input type="text" name="txt_empresa" value="<?php echo ($this->input->post('txt_empresa') ? $this->input->post('txt_empresa') : $p['nombre_real']); ?>" id="txt_empresa">
<br> 
<br>
<label for="txt_disponibles" class="control-label"><span class="text-danger"></span>Unidades Disponibles:</label>
<input type="text" name="txt_disponibles" value="<?php echo ($this->input->post('txt_disponibles') ? $this->input->post('txt_disponibles') : $p['unidades']); ?>">
<br>
<br>
<label for="txt_fecha" class="control-label"><span class="text-danger"></span>Fecha Publicacion:</label>
<input type="text" name="txt_fecha" value="<?php echo ($this->input->post('txt_fecha') ? $this->input->post('txt_fecha') : $p['fecha_publicacion']); ?>">
<br>
<br>
<label for="txt_ubicacion" class="control-label"><span class="text-danger"></span>Ubicacion Actual:</label>
<input type="text" name="txt_ubicacion" value="<?php echo ($this->input->post('txt_ubicacion') ? $this->input->post('txt_ubicacion') : $p['ubicacion_actual']); ?>">
<br>
<br>
<label for="txt_precio" class="control-label"><span class="text-danger"></span>Precio:</label>
<input type="text" name="txt_precio" value="<?php echo ($this->input->post('txt_precio') ? $this->input->post('txt_precio') :'₡ '. $p['precio']); ?>">
<br>
<br>
<label for="txt_t_envio" class="control-label"><span class="text-danger"></span>Tiempo Envío:</label>
<input type="text" name="txt_t_envio" value="<?php echo ($this->input->post('txt_t_envio') ? $this->input->post('txt_t_envio') : $p['tiempo_envio']); ?>">
<br>
<br>
<label for="txt_c_envio" class="control-label"><span class="text-danger"></span>Costo Envio:</label>
<input type="text" name="txt_c_envio" value="<?php echo ($this->input->post('txt_c_envio') ? $this->input->post('txt_c_envio') : $p['costo_envio']); ?>">
<br>
<br>
<label for="txt_categoria" class="control-label"><span class="text-danger"></span>Categoria:</label>
<input type="text" name="txt_categoria" value="<?php echo ($this->input->post('txt_categoria') ? $this->input->post('txt_categoria') : $p['categoria']); ?>">



    <?php } ?>

</div>
</div>







  </div>
  <br>
</div>

