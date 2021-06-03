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




    <div id="main_panel">
      <?php foreach ($tweets as $t) { ?>

        <div class='post_block'>
          <span class='post_text' id='post_<?php echo $t['tweets_id']; ?>'>
            <div class='published_date'>
              <span>Publicado el <?php echo $t['date']; ?> por <strong> <?php echo $t['realname'] . " [" . $t['username'] . "]"; ?></strong></span>
            </div>
          </span>
          <div id='content_post_<?php echo $t['tweets_id']; ?>'>
            <img src="<?php echo site_url('/resources/photos/' . $t['photo']); ?>" alt="foto" class="imgpost" width=50 />
            <div class='post_detail'><?php echo $t['post']; ?></div><br />
            <?php if (pathinfo($t['archivo'], PATHINFO_EXTENSION) != "gif" and pathinfo($t['archivo'], PATHINFO_EXTENSION) != "png" and pathinfo($t['archivo'], PATHINFO_EXTENSION) != "jpg") { ?>

              <a href="<?php echo site_url('resources/files/' . $t['archivo']); ?>" id="btn_archivo" name="btn_archivo" title="Archivo"><?php echo $t['archivo']; ?></a>
            <?php } else { ?>
              <?php echo "<img src='" . site_url('/resources/files/' . $t['archivo'])
                . "' alt='Archivo Foto' title='Archivo Foto'  width=350 height=300 id='photo_file' />"; ?>
            <?php } ?>
          </div>

          <?php if ($this->session->userdata['logged_in']['users_id'] == $t['users_id']) { ?>
            <div id="actions">

          


              

              <a href="<?php echo site_url('twitter/edit/' . $t['tweets_id']); ?>" id="btn_editar" name="btn_editar" title="Editar">✎</a>
              <a href="<?php echo site_url('twitter/delete/' . $t['tweets_id']); ?>" id="btn_eliminar" name="btn_eliminar" title="Eliminar" onclick="send()">🗙</a>
            </div>

            
          
          <?php } ?>


          <?php 
          $color_like='';
          $color_dislike ='';
          if(!empty($reacciones_usuario)){
          foreach ($reacciones_usuario as $r){
            
            if($t['tweets_id']== $r['tweets_id'] ){
              if($r['estado_reaccion']== 'L'){
                $color_like = '#32CA22';
                
              }
              else{
               
                $color_dislike ='#32CA22';
              }
            }
          
          
          }}?>

          <a href="<?php echo site_url('twitter/add_reaccionL/' . $t['tweets_id']); ?>" id="btn_like" name="btn_like"  onclick="send()" title="<?php
            if(!empty($reacciones)){
            foreach ($reacciones as $r) {
              if($t['tweets_id']== $r['tweets_id']){
               if($r['estado_reaccion']== 'L')echo $r['realname']."\n";
              
              }

            } }?>" style="background:<?php echo  $color_like?>;">👍</a>





          
          <a href="<?php echo site_url('twitter/add_reaccionD/' . $t['tweets_id']); ?>" id="btn_dislike" name="btn_dislike" onclick="send()"  title="<?php  
           if(!empty($reacciones)){
           foreach ($reacciones as $r) {
             if($t['tweets_id']== $r['tweets_id']){
              if($r['estado_reaccion']== 'D')echo $r['realname']."\n";
             }
            

           }}  ?>" style="background:<?php echo  $color_dislike?>;" >👎</a>


        </div>

      <?php } ?>
    </div>
  </div>


<?php
} else {
  header("location: " . base_url()); //dirección de arranque especificada en config.php y luego en routes.php
}
?>