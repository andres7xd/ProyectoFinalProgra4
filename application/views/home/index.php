<div id="panel_app">

  <div id="user_box">
    <!-- <a href="<?php echo site_url('user/edit/' . $this->session->userdata['logged_in']['usuario_id']); ?>" title="Editar Perfil">
        <?php
        echo "<img src='" . site_url('/resources/photos/' . $this->session->userdata['logged_in']['foto'])
          . "' alt='photo_profile' width=50 height=50 id='photo_profile' />" .
          "<span>HOLA! " . $this->session->userdata['logged_in']['nombre_real'] . ". ✎</span>";
        ?>
      </a> -->

    <img id="icono_marketplace" src="<?php echo site_url("/resources/icons/marketplace.png") ?>" width=200 height=200>

    <div id="logout">
      <?php echo form_open('auth/logout'); ?>
      <button type="submit" name="btn_registrarse" id="btn_registrarse" class="boton2" title="Auntenticarse"><img src="<?php echo site_url("/resources/icons/Loguear_icon.png") ?>" width=22 height=22></button>
      <?php echo form_close(); ?>
    </div>

  </div>

  <!-- <div id="post_box">

      <?php echo form_open_multipart('twitter/process', 'onsubmit="send()"'); ?>
      <br>

      <input type="text" class="cajatexto" id="txt_nombre" value="" placeholder="Escribe aquí para buscar!">
      <button type="submit" name="btn_search" id="btn_search" value="btn_search" class="boton" title="Buscar">🔍</button>

      <span style="color: #f00"><?php echo form_error('txt_post'); ?></span>
      <?php echo form_close(); ?>


    </div> -->

  <br>
</div>

<div>
  <div id="main_panel">
    <h1 align="center" style="text-decoration: underline; font-family: Century Gothic">LISTA DE TIENDAS</h1>
    <table width="50%" border="1px" align="center">
      <thead>
        <tr>
          <th>ÍCONO</th>
          <th>NOMBRE</th>
          <th>PERFIL</th>
        </tr>
      </thead>
      <?php foreach ($nombre_usuario as $u) { ?>
        <tr>
          <td align="center" width="150"><?php echo "<img src='" . site_url('/resources/photos/' . $u['foto'])
                                            . "' alt=' Foto' title=' Foto'  width=50 height=50 id='foto_file' />"; ?></td>
          <td align="center" width="150" style="font-family: Century Gothic; font-weight: bold; font-size:15px;"><?php echo $u["nombre_real"] ?></td>
          <td align="center">
            <input type="button" class="btnPerfil" value="Ver Perfil">
          </td>
        </tr>
      <?php } ?>
    </table>
  </div>

  <div id="main_panel">
    <h1 align="center" style="text-decoration: underline; font-family: Century Gothic">PRODUCTOS MÁS VENDIDOS</h1>
    <table width="50%" border="1px" align="center">
      <thead>
        <tr>
          <!-- <th>ÍCONO</th> -->
          <th>NOMBRE</th>
          <th>EMPRESA</th>
          <th>PRECIO</th>
          <th>CANTIDAD DE ARTÍCULOS VENDIDOS</th>
          <th>PERFIL</th>
        </tr>
      </thead>
      <?php foreach ($productos_vendidos as $pv) { ?>
        <tr>
          <!-- <td align="center" width="150"><?php echo "<img src='" . site_url('/resources/photos/' . $pv['nombre'])
                                                . "' alt=' Foto' title=' Foto'  width=50 height=50 id='foto_file' />"; ?></td> -->
          <td align="center" width="150" style="font-family: Century Gothic; font-weight: bold; font-size:15px;"><?php echo $pv["nombre"] ?></td>
          <td align="center" width="150" style="font-family: Century Gothic; font-weight: bold; font-size:15px;"><?php echo $pv["nombre_real"] ?></td>
          <td align="center" width="150" style="font-family: Century Gothic; font-weight: bold; font-size:15px;"><?php echo $pv["precio"] ?></td>
          <td align="center" width="150" style="font-family: Century Gothic; font-weight: bold; font-size:15px;"><?php echo $pv["unidades_vendidas"] ?></td>
          <td align="center">
            <input type="button" class="btnPerfil" value="Ver Perfil">
          </td>
        </tr>
      <?php } ?>
    </table>
  </div>
</div>