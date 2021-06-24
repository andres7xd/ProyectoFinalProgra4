<head>
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('resources/css/style.css'); ?>">
</head>

<div id="panel_app">
	<div class="box-header">
		<h2 class="box-title">Agregando Usuario</h2>
		<?php echo form_open('twitter/index'); ?>
		<button type="submit" name="btn_return" id="btn_return" class="boton" title="Regresar">←</button>
		<?php echo form_close(); ?>
	</div>
	<?php echo form_open('user/add'); ?>
	<div id="edit_panel">
		<label for="txt_usuario" class="control-label"><span class="text-danger">* </span>Usuario:</label>
		<div class="form-group">
			<input type="text" name="txt_usuario" value="<?php echo $this->input->post('txt_usuario'); ?>" class="cajatexto" id="txt_usuario" />
			<span class="text-danger"><?php echo form_error('txt_usuario'); ?></span>
		</div>
		<label for="txt_clave" class="control-label"><span class="text-danger">* </span>Contraseña:</label>
		<div class="form-group">
			<input type="password" name="txt_clave" value="<?php echo $this->input->post('txt_clave'); ?>" class="cajatexto" id="txt_clave" />
			<span class="text-danger"><?php echo form_error('txt_clave'); ?></span>
		</div>
		<label for="txt_nombre" class="control-label"><span class="text-danger">* </span>Nombre Real:</label>
		<div class="form-group">
			<input type="text" name="txt_nombre" value="<?php echo $this->input->post('txt_nombre'); ?>" class="cajatexto" id="txt_nombre" />
			<span class="text-danger"><?php echo form_error('txt_nombre'); ?></span>
		</div>

		<label for="txt_cedula" class="control-label"><span class="text-danger">* </span>Cédula:</label>
		<div class="form-group">
			<input type="text" name="txt_cedula" value="<?php echo $this->input->post('txt_cedula'); ?>" class="cajatexto" id="txt_cedula" />
			<span class="text-danger"><?php echo form_error('txt_cedula'); ?></span>
		</div>

		<label for="txt_direccion" class="control-label"><span class="text-danger">* </span>Dirección:</label>
		<div class="form-group">
			<input type="text" name="txt_direccion" value="<?php echo $this->input->post('txt_direccion'); ?>" class="cajatexto" id="txt_direccion" />
			<span class="text-danger"><?php echo form_error('txt_direccion'); ?></span>
		</div>

		<label for="txt_telefono" class="control-label"><span class="text-danger">* </span>Teléfono:</label>
		<div class="form-group">
			<input type="text" name="txt_telefono" value="<?php echo $this->input->post('txt_telefono'); ?>" class="cajatexto" id="txt_telefono" />
			<span class="text-danger"><?php echo form_error('txt_telefono'); ?></span>
		</div>

		<label for="txt_email" class="control-label"><span class="text-danger">* </span>Email:</label>
		<div class="form-group">
			<input type="text" name="txt_email" value="<?php echo $this->input->post('txt_email'); ?>" class="cajatexto" id="txt_email" />
			<span class="text-danger"><?php echo form_error('txt_email'); ?></span>
		</div>

		<label for="txt_pais" class="control-label"><span class="text-danger">* </span>País:</label>
		<div class="form-group">
			<input type="text" name="txt_pais" value="<?php echo $this->input->post('txt_pais'); ?>" class="cajatexto" id="txt_pais" />
			<span class="text-danger"><?php echo form_error('txt_pais'); ?></span>
		</div>


		<label for="txt_tipo_usuario" class="control-label"><span class="text-danger">* </span>Tipo de usuario:</label>
		<div class="form-group">
			<select id="select_tipo_usuario" name="select_tipo_usuario" value="<?php echo $this->input->post('select_tipo_usuario'); ?>"  class="cajatexto">
				<option>Empresa</option>
				<option>Comprador</option>
			</select>
		</div>

		<br>
		<div class="box-footer">
			<button type="submit" class="boton">Guardar</button>
		</div>
		<?php echo form_close(); ?>
	</div>
</div>