<?php if (!empty($this->session)) { 
		if($this->session->flashdata('error')){ echo "<div class='msg_box_user error' >" .  $this->session->flashdata('error') . "</div>"; } 
		if($this->session->flashdata('success')){ echo "<div class='msg_box_user success' >" .  $this->session->flashdata('success') . "</div>"; } 
} ?>

<?php if($this->session->userdata['logged_in']['usuario_id']==$user['usuario_id'] && $this->session->userdata['logged_in']['logged_in']==TRUE ){ ?>

	<div id="panel_app">
	    <div class="box-header">
	      	<h2 class="box-title">Metodo de Pago</h2>
	      	<?php echo form_open('pago/index');?>
		    	<button type="submit" name="btn_return" id="btn_return" class="boton" title="Regresar">←</button>
		    <?php echo form_close();?>
	    </div>
	    <?php echo form_open('pago/add/'.$user['usuario_id']); ?>
	  	<div id="edit_panel">
			<label for="txt_nombre" class="control-label"><span class="text-danger">*</span>Nombre en la tarjeta:</label>
			<div class="form-group">
				<input type="text" name="txt_nombre" value="<?php echo ($this->input->post('txt_nombre') ? $this->input->post('txt_nombre') : $user['nombre_tarjeta']); ?>" class="cajatexto" id="txt_nombre" />
				<span class="text-danger"><?php echo form_error('txt_nombre');?></span>
			</div>
			<label for="txt_numero" class="control-label"><span class="text-danger" placeholder="####-####-#">* </span>Número de Tarjeta:</label>
			<div class="form-group">
				<input type="text" name="txt_numero"  class="cajatexto" id="txt_numero" />
				<span class="text-danger"><?php echo form_error('txt_numero');?></span>
			</div>
			<label for="txt_vencimiento class="control-label"><span class="text-danger" placeholder="MM/AA">*</span>Fecha de Vencimiento</label>
			<div class="form-group">
				<input type="text" name="txt_vencimiento" value="<?php echo ($this->input->post('txt_vencimiento') ? $this->input->post('txt_vencimiento') : $user['fecha_vencimiento']); ?>" class="cajatexto" id="txt_vencimiento" />
				<span class="text-danger"><?php echo form_error('txt_vencimiento');?></span>
			</div>
			<label for="txt_codigo" class="control-label"><span class="text-danger" placeholder="CVV">*</span>Código de Seguridad:</label>
			<div class="form-group">
				<input type="text" name="txt_codigo" value="<?php echo ($this->input->post('txt_codigo') ? $this->input->post('txt_codigo') : $user['codigo_tarjeta']); ?>" class="cajatexto" id="txt_codigo" />
				<span class="text-danger"><?php echo form_error('txt_codigo');?></span>
			</div>
          	<br><br>
		  	<div class="box-footer">
		    	<button type="submit" class="boton">GUARDAR</button>
		  	</div>
	        <div id="actions">
              <a href="<?php echo site_url('pago/delete/' . $user['usuario_id']); ?>" id="btn_eliminar" name="btn_eliminar" title="Eliminar" onclick="send()">🗙 Eliminar Tarjeta</a>
          	</div>
	    <?php echo form_close(); ?>	
		</div>
	</div>


<?php 
    }else {
        header("location: " . base_url());
    } 
?>

