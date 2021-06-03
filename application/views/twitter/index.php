<?php if ($this->session->userdata['logged_in']['logged_in'] == TRUE) { ?>

  <div id="panel_app">

    <div id="user_box">
      <a href="<?php echo site_url('user/edit/' . $this->session->userdata['logged_in']['users_id']); ?>" title="Editar Perfil">
        <?php
        echo "<img src='" . site_url('/resources/photos/' . $this->session->userdata['logged_in']['photo'])
          . "' alt='photo_profile' width=50 height=50 id='photo_profile' />" .
          "<span>HOLA! " . $this->session->userdata['logged_in']['realname'] . ". ✎</span>";
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
      <textarea cols="4" rows="6" id="txt_post" name="txt_post" placeholder="Escribe algo!" tabindex="1"></textarea>
      <button type="submit" id="btn_save" name="btn_save" value="btn_save" class="boton" tabindex="2" title="Publicar">Publicar</button>
      <button type="submit" name="btn_search" id="btn_search" value="btn_search" class="boton" title="Buscar">🔍</button>
      <input type="file" name="txt_file" size="20" class="btn btn-info" accept="image/jpeg,image/gif,image/png,.pdf,.txt,.docx,.xlsx,.pptx" />
      <span style="color: #f00"><?php echo form_error('txt_post'); ?></span>
      <?php echo form_close(); ?>

    </div>

    <br>
  </div>

  <div>




    
  </div>


<?php
} else {
  header("location: " . base_url()); //dirección de arranque especificada en config.php y luego en routes.php
}
?>