<?php
if ($message_display != null) {
  if (isset($message_display)) {
    echo "<div class='alert alert-primary alert-dismissible fade show' role='alert' style='font-size: 15px';>" . $message_display . "
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
  }
}

if ($error_message != null) {
  if (isset($error_message)) {
    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert' style='font-size: 15px';>" . $error_message . "
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
  }
}

if (validation_errors() !== "") {
  echo "<<div class='alert alert-warning alert-dismissible fade show' role='alert' style='font-size: 15px';>>" . validation_errors() . "
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
}
?>

<?php if (!empty($notificaciones)) { ?>

  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Alerta!</strong> Se encuentran notificaciones disponibles.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>

<?php } ?>

<head>
  <link rel="stylesheet" type="text/css" href="<?php echo site_url('resources/css/style.css'); ?>">
</head>


<div id="panel_app">

  <div id="user_box">
    <a href="<?php echo site_url('user/edit/' . $this->session->userdata['logged_in']['usuario_id']); ?>" title="Editar Perfil">
      <?php
      echo "<img src='" . site_url('/resources/photos/' . $this->session->userdata['logged_in']['foto'])
        . "' alt='photo_profile' width=50 height=50 id='photo_profile' />" .
        "<span>HOLA! " . $this->session->userdata['logged_in']['nombre_real'] . ". ✎</span>";
      ?>
    </a>

    <img id="icono_marketplace" src="<?php echo site_url("/resources/icons/marketplace.png") ?>" width=205 height=205>


    <!-- 
  <?php echo form_open('auth/logout'); ?>
    <button type="submit" name="btn_logout" id="btn_registrarse" class="boton2" title="Auntenticarse"><img src="<?php echo site_url("/resources/icons/Loguear_icon.png") ?>"width=22 height=22>Autenticarse</button>
    <?php echo form_close(); ?> -->

    <div id="logout">

      <?php echo form_open('home/index'); ?>
      <button type="submit" name="btn_logout" id="btn_logout" class="boton" title="Salir">🗙</button>
      <?php echo form_close(); ?>


      <button type="submit" name="btn_notificaciones" id="btn_notificaciones" title="Notificaciones" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="<?php echo site_url("/resources/icons/notificacion.png") ?>" width="26" height="26"></button>

      <?php echo form_open('carrito/index'); ?>
      <button type="submit" name="btn_carrito" id="btn_carrito" title="Carrito"><img src="<?php echo site_url("/resources/icons/carrito.png") ?>" width="26" height="26"></button>
      <?php echo form_close(); ?>

      <?php echo form_open('deseos/index'); ?>
      <button type="submit" name="btn_deseos" id="btn_deseos" title="Lista de deseos"><img src="<?php echo site_url("/resources/icons/deseos.png") ?>" width="26" height="26"></button>
      <?php echo form_close(); ?>

    </div>
  </div>
  <br>
</div>
<div>

  <div id="main_panel">

    <div>

      <button type="button" class="btn btn-primary" id="btn_create_categoria" data-bs-toggle="modal" data-bs-target="#reporteComprasModal">
        Reporte de compras
      </button>

      <?php echo form_open('reporte_suscripciones/index'); ?>
      <input type="submit" class="btn btn-primary" style="float:right; margin:5px;" value="Reporte de suscripciones">
      <?php echo form_close(); ?>

      <button type="button" class="btn btn-primary" id="btn_create_categoria" data-bs-toggle="modal" data-bs-target="#reporteOfertasModal">
        Reporte de ofertas
      </button>

      <?php echo form_open('ruleta/index'); ?>
      <input type="submit" class="btn btn-success" style="float:right; margin:5px;" value="Girar ruleta">
      <?php echo form_close(); ?>

      <!-- Modal -->
      <div class="modal fade" id="reporteComprasModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body">
              <?php echo form_open('reporte_compras/index'); ?>
              <input type="date" class="dates" id="fecha_1" name="fecha_1" title="Primer fecha">
              <input type="date" class="dates" id="fecha_2" name="fecha_2" title="Segunda fecha">
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Crear</button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>

      <!-- Modal ofertas -->
      <div class="modal fade" id="reporteOfertasModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body">
              <?php echo form_open('reporte_ofertas/index'); ?>
              <input type="date" class="dates" id="fecha_1" name="fecha_1" title="Primer fecha">
              <input type="date" class="dates" id="fecha_2" name="fecha_2" title="Segunda fecha">
              <input type="number" class="text" id="txt_precio_ini" required="true" name="txt_precio_ini" title="Precio inicio" placeholder="Precio inicio" style="position: relative; left: 60px; border-radius: 10px; margin: 15px;width: 150px;height: 30px;">
              <input type="number" class="text" id="txt_precio_fin" required="true" name="txt_precio_fin" title="Precio fin" placeholder="Precio fin" style="position: relative; left: 60px; border-radius: 10px; margin: 15px; width: 150px;height: 30px;">
              <br>
              <select id="select_categoria" name="select_categoria" value="<?php echo $this->input->post('select_categoria'); ?>" class="cajatexto" style="background: white; color:black; border-color:black; position:relative; left:35%;">
                <?php foreach ($categorias as $ca) { ?>
                  <option><?php echo $ca['categoria'] ?></option>
                <?php } ?>
              </select>
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
    <br><br><br>

    <div style="text-align:center">
      <?php echo form_open('buyer/process_tienda'); ?>
      <br>
      <input type="text" class="cajatexto_search" id="txt_prod_search" name="txt_nombre_tienda" placeholder="Escribe aquí para buscar una tienda">
      <button type="submit" name="btn_search" id="btn_search" value="btn_search" class="boton" title="Buscar">🔍</button>
      <span style="color: #f00"><?php echo form_error('txt_post'); ?></span>
      <?php echo form_close(); ?>
    </div>

    <br>

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
        <?php echo form_open('profile_buyer/index/' . $u['usuario_id'] . '/' . ''); ?>
        <input type="submit" class="btnPerfil" value="Ver perfil">
        <?php echo form_close(); ?>
      </div>
    <?php } ?>
    </table>

  </div>


  <div id="main_panel">

    <div style="text-align:center">
      <?php echo form_open('buyer/process'); ?>
      <br>
      <input type="text" class="cajatexto_search" id="txt_prod_search" name="txt_nombre" placeholder="Escribe aquí para buscar un producto">
      <button type="submit" name="btn_search" id="btn_search" value="btn_search" class="boton" title="Buscar">🔍</button>
      <span style="color: #f00"><?php echo form_error('txt_post'); ?></span>
      <?php echo form_close(); ?>
    </div>

    <br>
    <h1 align="center" style="text-decoration: underline; font-family: Century Gothic; font-size:25px;">PRODUCTOS MÁS VENDIDOS</h1>
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
        <span class="unidades_vendidas">Unidades vendidas: <?php echo $p["unidades_vendidas"] ?></span>
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

    <!-- ventana modal notificaiones -->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-body">

            <table class="table" style="font-size:15px;">
              <thead>
                <tr>
                  <th scope="col">Nombre del Producto</th>
                  <th scope="col">Notificacion</th>
                  <th scope="col">Acción</th>
                </tr>
              </thead>
              <tbody>

                <?php foreach ($notificaciones as $nt) { ?>
                  <tr>
                    <td><?php echo $nt['nombre'] ?></td>
                    <td><?php echo $nt['descripcion'] ?></td>

                    <?php echo form_open('buyer/delete_notificacion/' . $nt['notificacion_id']) ?>
                    <td><button type="submit" class="btn btn-danger">Borrar</button>
                    <td>
                      <?php echo form_close(); ?>
                  </tr>
                <?php } ?>

              </tbody>
            </table>

          </div>
          <?php echo form_open('buyer/delete_notificaciones'); ?>
          <div class="modal-footer">
            <button type="submit" class="btn btn-danger">Borrar notificaciones</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          </div>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
  </div>


</div>