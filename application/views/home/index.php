<?php if ($this->session->userdata['logged_in']['logged_in'] == TRUE) { ?>

  <div id="panel_app">

    <div id="user_box">
      <a href="<?php echo site_url('user/edit/' . $this->session->userdata['logged_in']['usuario_id']); ?>" title="Editar Perfil">
        <?php
        echo "<img src='" . site_url('/resources/photos/' . $this->session->userdata['logged_in']['foto'])
          . "' alt='photo_profile' width=50 height=50 id='photo_profile' />" .
          "<span>HOLA! " . $this->session->userdata['logged_in']['nombre_real'] . ". ✎</span>";
          
        ?>
      </a>

      <div id="logout">
        <?php echo form_open('auth/logout'); ?>
        <button type="submit" name="btn_logout" id="btn_logout" class="boton" title="Salir">🗙</button>
        <?php echo form_close(); ?>
      </div>

    </div>



    <div id="post_box">

      <?php echo form_open_multipart('twitter/process', 'onsubmit="send()"'); ?>
      <br>

      <!-- <button type="submit" id="btn_save" name="btn_save" value="btn_save" class="boton" tabindex="2" title="Publicar">Publicar</button> -->
      <button type="submit" name="btn_search" id="btn_search" value="btn_search" class="boton" title="Buscar">🔍</button>

      <span style="color: #f00"><?php echo form_error('txt_post'); ?></span>
      <?php echo form_close(); ?>

      <h1>Tiendas</h1>



    </div>

    <br>
  </div>

  <div>

  


    <div id="main_panel">

    <h1 align="center">LISTA DE TIENDAS</h1>
    <table width="70%" border="1px" align="center">

    <tr align="center">
        
        <td>Icono</td>
        <td>Nombre</td>
        <td>Perfil</td>
       
    </tr>

      <?php foreach ($usuarios_empresa as $u) { ?>
      

        <!-- <div class='post_block'>
          <span class='post_text' id='post_<?php echo $u['usuario_id']; ?>'>
          </span>
          <div id='content_post_<?php echo $u['usuario_id']; ?>'> -->

          
            <tr>
                
                <td width="150"><?php echo "<img src='" . site_url('/resources/photos/' . $u['foto'])
                . "' alt=' Foto' title=' Foto'  width=150 height=100 id='foto_file' />"; ?></td>
                <td align="center"><?php echo $u["nombre_real"]?></td>
                <td>
                <input type="button">
                </td>
               
            </tr>
        


          <!-- </div> -->

         









        <?php } ?>



        </div>
    </div>

  <?php
} else {
  header("location: " . base_url()); //dirección de arranque especificada en config.php y luego en routes.php
}
  ?>