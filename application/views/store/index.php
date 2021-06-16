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

<div id="panel_app">

  <div id="user_box">
    <a href="<?php echo site_url('user/edit/' . $this->session->userdata['logged_in']['usuario_id']); ?>" title="Editar Perfil">
      <?php
      echo "<img src='" . site_url('/resources/photos/' . $this->session->userdata['logged_in']['foto'])
        . "' alt='photo_profile' width=50 height=50 id='photo_profile' />" .
        "<span>HOLA! " . $this->session->userdata['logged_in']['nombre_real'] . ". ✎</span>";
      ?>
    </a>

    <img id="icono_marketplace" src="<?php echo site_url("/resources/icons/marketplace.png") ?>" width=170 height=170>

    <div id="logout">

      <?php echo form_open('home/index'); ?>
      <button type="submit" name="btn_logout" id="btn_logout" class="boton" title="Salir">🗙</button>
      <?php echo form_close(); ?>

      <button type="submit" name="btn_notificaciones" id="btn_notificaciones" title="Notificaciones" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="<?php echo site_url("/resources/icons/notificacion.png") ?>" width="26px" height="26px"></button>

      <?php echo form_open('suscripciones_tienda/index'); ?>
      <button type="submit" name="btn_carrito" id="btn_carrito_store" title="Carrito"><img src="<?php echo site_url("/resources/icons/carrito.png") ?>" width="26px" height="26px"></button>
      <?php echo form_close(); ?>

      <?php echo form_open('deseos_tienda/index'); ?>
      <button type="submit" name="btn_deseos" id="btn_deseos_store" title="Lista de deseos"><img src="<?php echo site_url("/resources/icons/deseos.png") ?>" width="26px" height="26px"></button>
      <?php echo form_close(); ?>


      

    </div>

  </div>

  <div id="post_box">

    <?php echo form_open('store/process'); ?>
    <br>
    <input type="text" class="cajatexto_search" id="txt_prod_search" name="txt_nombre" placeholder="Escribe aquí para buscar!">
    <button type="submit" name="btn_search" id="btn_search" value="btn_search" class="boton" title="Buscar">🔍</button>
    <span style="color: #f00"><?php echo form_error('txt_post'); ?></span>
    <?php echo form_close(); ?>

  </div>

  <br>
</div>

<div>

  <div id="main_panel">

    <div id="actions_creates_store">

      <?php echo form_open('create_product/index'); ?>
      <input type="submit" class="btn btn-primary" id="btn_create_producto" title="Ver producto" value="Crear producto">
      <?php echo form_close(); ?>

      <!-- <?php echo form_open('create_product/index'); ?>
      <input type="submit" class="btn btn-primary" id="btn_create_categoria" title="Ver producto" value="Crear categoría">
      <input type="text" id="txt_create_categoria" name="txt_nombre" placeholder="Nombre de la categoría">
      <?php echo form_close(); ?> -->

      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" id="btn_create_categoria" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Crear categoría
      </button>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body">
              <?php echo form_open('store/add_categoria'); ?>
              <input type="text" id="txt_create_categoria" name="txt_create_categoria" placeholder="Nombre de la categoría" value="">
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Crear</button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>



    </div>
    <br><br><br><br>
    <h1 align="center" style="text-decoration: underline; font-family: Century Gothic; font-size:25px;">LISTA DE MIS PRODUCTOS</h1>

    <?php foreach ($productos as $p) { ?>
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
        <span class="precio">₡<?php echo $p["precio"] ?></span>
        <br>

        <div class="actions_products">

          <?php echo form_open('edit_product/index/' . $p['producto_id']); ?>
          <input type="submit" class="actions_store" title="Ver producto" value="✏️">
          <?php echo form_close(); ?>

          <a href="<?php echo site_url('store/delete/' . $p['producto_id']); ?>" id="btn_eliminar_producto_carrito" class="actions_store" name="btn_eliminar_producto_carrito" title="Eliminar del carrito de compras">❌</a>

        </div>
      </div>

    <?php } ?>






    




  </div>
</div>