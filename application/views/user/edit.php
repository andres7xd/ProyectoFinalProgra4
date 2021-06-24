<?php if (!empty($this->session)) {
	if ($this->session->flashdata('error')) {
		echo "<div class='msg_box_user error' >" .  $this->session->flashdata('error') . "</div>";
	}
	if ($this->session->flashdata('success')) {
		echo "<div class='msg_box_user success' >" .  $this->session->flashdata('success') . "</div>";
	}
} ?>

<?php if ($this->session->userdata['logged_in']['usuario_id'] == $user['usuario_id'] && $this->session->userdata['logged_in']['logged_in'] == TRUE) { ?>

	<head>
		<link rel="stylesheet" type="text/css" href="<?php echo site_url('resources/css/style.css'); ?>">
	</head>

	<div id="panel_app_add_user">
		<div class="box-header">
			<h2 class="box-title">Editando Usuario</h2>
			<?php echo form_open('buyer/index'); ?>
			<button type="submit" name="btn_return" id="btn_return" class="boton" title="Regresar">←</button>
			<?php echo form_close(); ?>
		</div>
	</div>

	<?php echo form_open('user/edit/' . $user['usuario_id']); ?>
	<div id="edit_panel">

		<label for="txt_usuario" class="control-label"><span class="text-danger">* </span>Usuario:</label>
		<div class="form-group">
			<input type="text" name="txt_usuario" value="<?php echo ($this->input->post('txt_usuario') ? $this->input->post('txt_usuario') : $user['nombre_usuario']); ?>" class="cajatexto" id="txt_usuario" />
			<span class="text-danger"><?php echo form_error('txt_usuario'); ?></span>
		</div>

		<label for="txt_clave" class="control-label"><span class="text-danger">* </span>Contraseña:</label>
		<div class="form-group">
			<input type="password" name="txt_clave" class="cajatexto" id="txt_clave" />
			<span class="text-danger"><?php echo form_error('txt_clave'); ?></span>
		</div>

		<label for="txt_nombre" class="control-label"><span class="text-danger">* </span>Nombre Real:</label>
		<div class="form-group">
			<input type="text" name="txt_nombre" value="<?php echo ($this->input->post('txt_nombre') ? $this->input->post('txt_nombre') : $user['nombre_real']); ?>" class="cajatexto" id="txt_nombre" />
			<span class="text-danger"><?php echo form_error('txt_nombre'); ?></span>
		</div>

		<label for="txt_cedula" class="control-label"><span class="text-danger">* </span>Cédula:</label>
		<div class="form-group">
			<input type="text" name="txt_cedula" value="<?php echo ($this->input->post('txt_cedula') ? $this->input->post('txt_cedula') : $user['cedula']); ?>" class="cajatexto" id="txt_cedula" />
			<span class="text-danger"><?php echo form_error('txt_cedula'); ?></span>
		</div>

		<label for="txt_direccion" class="control-label"><span class="text-danger">* </span>Dirección:</label>
		<div class="form-group">
			<input type="text" name="txt_direccion" value="<?php echo ($this->input->post('txt_direccion')? $this->input->post('txt_direccion') : $user['direccion']); ?>" class="cajatexto" id="txt_direccion" />
			<span class="text-danger"><?php echo form_error('txt_direccion'); ?></span>
		</div>

		<label for="txt_telefono" class="control-label"><span class="text-danger">* </span>Teléfono:</label>
		<div class="form-group">
			<input type="text" name="txt_telefono" value="<?php echo ($this->input->post('txt_telefono')? $this->input->post('txt_telefono') : $user['telefono']); ?>" class="cajatexto" id="txt_telefono" />
			<span class="text-danger"><?php echo form_error('txt_telefono'); ?></span>
		</div>

		<label for="txt_email" class="control-label"><span class="text-danger">* </span>Email:</label>
		<div class="form-group">
			<input type="text" name="txt_email" value="<?php echo ($this->input->post('txt_email')? $this->input->post('txt_email') : $user['email']); ?>" class="cajatexto" id="txt_email" />
			<span class="text-danger"><?php echo form_error('txt_email'); ?></span>
		</div>

		<label for="txt_pais" class="control-label"><span class="text-danger">* </span>País:</label>
		<div class="form-group">
			<input type="text" name="txt_pais" value="<?php echo ($this->input->post('txt_pais')? $this->input->post('txt_pais') : $user['pais']); ?>" class="cajatexto" id="txt_pais" />
			<span class="text-danger"><?php echo form_error('txt_pais'); ?></span>
		</div>

		<br><br>
		<div class="box-footer">
			<button type="submit" class="boton">Guardar</button>
		</div>
		<div id="actions">
			<a href="<?php echo site_url('user/delete/' . $user['usuario_id']); ?>" id="btn_eliminar" name="btn_eliminar" title="Eliminar" onclick="send()">🗙 Eliminar mi cuenta</a>
		</div>
		<?php echo form_close(); ?>
		<?php echo form_open('pago/index'); ?>
		<button type="submit" name="btn_pago" id="btn_pago" class="boton" title="MetodoPago">Agregar forma de pago</button>
		<?php echo form_close(); ?>
		<br>
		<?php echo form_open('direccion/index'); ?>
		<button type="submit" name="btn_direccion" id="btn_direccion" class="boton" title="DireccionEnvio">Agregar Direccion de Envio</button>
		<?php echo form_close(); ?>
		<div class="box-body">
			<div class="form-group-photo">
				<?php echo "<img src='" . site_url('/resources/photos/' . $this->session->userdata['logged_in']['foto'])
					. "' alt='Editar Foto' title='Editar Foto'  width=70 height=70 id='photo_profile' />"; ?>

				<?php echo form_open_multipart('user/upload_photo/' . $user['usuario_id']); ?>
				<input type="file" name="txt_file" size="20" class="btn btn-info" accept="image/jpeg,image/gif,image/png" />
				<br><br>
				<button type="submit" class="boton">Cargar Foto</button>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>


<?php
} else {
	header("location: " . base_url());
}
?>