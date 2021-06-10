<?php if (!empty($this->session)) { 
		if($this->session->flashdata('error')){ echo "<div class='msg_box_user error' >" .  $this->session->flashdata('error') . "</div>"; } 
		if($this->session->flashdata('success')){ echo "<div class='msg_box_user success' >" .  $this->session->flashdata('success') . "</div>"; } 
} ?>

<?php if($this->session->userdata['logged_in']['usuario_id']==$user['usuario_id'] && $this->session->userdata['logged_in']['logged_in']==TRUE ){ ?>

	<div id="panel_app">
	    <div class="box-header">
	      	<h2 class="box-title">Editando Usuario</h2>
	      	<?php echo form_open('buyer/index');?>
		    	<button type="submit" name="btn_return" id="btn_return" class="boton" title="Regresar">←</button>
		    <?php echo form_close();?>
	    </div>
	    <?php echo form_open('user/edit/'.$user['usuario_id']); ?>
	  	<div id="edit_panel">
			<label for="txt_usuario" class="control-label"><span class="text-danger">* </span>Usuario:</label>
			<div class="form-group">
				<input type="text" name="txt_usuario" value="<?php echo ($this->input->post('txt_usuario') ? $this->input->post('txt_usuario') : $user['nombre_usuario']); ?>" class="cajatexto" id="txt_usuario" />
				<span class="text-danger"><?php echo form_error('txt_usuario');?></span>
			</div>
			<label for="txt_clave" class="control-label"><span class="text-danger">* </span>Contraseña:</label>
			<div class="form-group">
				<input type="password" name="txt_clave"  class="cajatexto" id="txt_clave" />
				<span class="text-danger"><?php echo form_error('txt_clave');?></span>
			</div>
			<label for="txt_nombre" class="control-label"><span class="text-danger">* </span>Nombre Real:</label>
			<div class="form-group">
				<input type="text" name="txt_nombre" value="<?php echo ($this->input->post('txt_nombre') ? $this->input->post('txt_nombre') : $user['nombre_real']); ?>" class="cajatexto" id="txt_nombre" />
				<span class="text-danger"><?php echo form_error('txt_nombre');?></span>
			</div>
          	<br><br>
		  	<div class="box-footer">
		    	<button type="submit" class="boton">Guardar</button>
		  	</div>
	        <div id="actions">
              <a href="<?php echo site_url('user/delete/' . $user['usuario_id']); ?>" id="btn_eliminar" name="btn_eliminar" title="Eliminar" onclick="send()">🗙 Eliminar mi cuenta</a>
          	</div>
	    <?php echo form_close(); ?>
		<?php echo form_open('pago/index');?>
		    	<button type="submit" name="btn_pago" id="btn_pago" class="boton" title="MetodoPago">Metodo Pago</button>
		<?php echo form_close();?>
		    <div class="box-body">
		    	<div class="form-group-photo">
				  	<?php echo "<img src='" . site_url('/resources/photos/' . $this->session->userdata['logged_in']['foto']) 
			          . "' alt='Editar Foto' title='Editar Foto'  width=70 height=70 id='photo_profile' />"; ?>

			        <?php echo form_open_multipart('user/upload_photo/' . $user['usuario_id']);?>
						<input type="file" name="txt_file" size="20" class="btn btn-info" accept="image/jpeg,image/gif,image/png" />
						<br><br>
						<button type="submit" class="boton">Cargar Foto</button>
					<?php echo form_close(); ?>
	          	</div>
			</div>	
		</div>
	</div>


<?php 
    }else {
        header("location: " . base_url());
    } 
?>

