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
			<input type="text" name="txt_direccion" value="<?php echo ($this->input->post('txt_direccion') ? $this->input->post('txt_direccion') : $user['direccion']); ?>" class="cajatexto" id="txt_direccion" />
			<span class="text-danger"><?php echo form_error('txt_direccion'); ?></span>
		</div>

		<label for="txt_telefono" class="control-label"><span class="text-danger">* </span>Teléfono:</label>
		<div class="form-group">
			<input type="text" name="txt_telefono" value="<?php echo ($this->input->post('txt_telefono') ? $this->input->post('txt_telefono') : $user['telefono']); ?>" class="cajatexto" id="txt_telefono" />
			<span class="text-danger"><?php echo form_error('txt_telefono'); ?></span>
		</div>

		<label for="txt_email" class="control-label"><span class="text-danger">* </span>Email:</label>
		<div class="form-group">
			<input type="text" name="txt_email" value="<?php echo ($this->input->post('txt_email') ? $this->input->post('txt_email') : $user['email']); ?>" class="cajatexto" id="txt_email" />
			<span class="text-danger"><?php echo form_error('txt_email'); ?></span>
		</div>

		<label for="txt_pais" class="control-label"><span class="text-danger">* </span>País:</label>
		<div class="form-group">
			<input type="text" name="txt_pais" value="<?php echo ($this->input->post('txt_pais') ? $this->input->post('txt_pais') : $user['pais']); ?>" class="cajatexto" id="txt_pais" />
			<span class="text-danger"><?php echo form_error('txt_pais'); ?></span>
		</div>

		<br><br>
		<div class="box-footer">
			<button type="submit" class="btn btn-primary" style="float:left; margin:5px;">Guardar</button>
			<?php echo form_close(); ?>
			
			<?php echo form_open('pago/index'); ?>
			<button type="submit" name="btn_pago" id="btn_pago" class="btn btn-primary" style="float:left; margin:5px;">Agregar forma de pago</button>
			<?php echo form_close(); ?>

			<?php echo form_open('direccion/index'); ?>
			<button type="submit" name="btn_direccion" id="btn_direccion" class="btn btn-primary" style="float:left; margin:5px;">Agregar Direccion de Envio</button>
			<?php echo form_close(); ?>

			<button type="button" class="btn btn-primary" id="btn_create_red" data-bs-toggle="modal" data-bs-target="#redes_sociales" style="float:left; margin:5px;">
				Redes Sociales
			</button>

			<div class="modal fade" id="redes_sociales" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-body">

							<?php echo form_open('user/add_red'); ?>
							<select id="select_categoria" name="select_categoria" value="<?php echo $this->input->post('select_categoria'); ?>" class="cajatexto" style="background: white; color:black; border-color:black; position:relative; left:1%;">
								<option>Facebook</option>
								<option>Instagram</option>
								<option>Twitter</option>
							</select>
							
							<input type="text" class="text" id="txt_nombre_red" name="txt_nombre_red" placeholder="Nombre en la red" style="position: relative; left:1%; border-radius: 10px; margin: 15px;width: 150px;height: 30px;" required="true">
							
							<button type="submit" class="btn btn-primary">Crear Red</button>

							<?php echo form_close(); ?>

							<table class="table" style="font-size:15px;">
								<thead>
									<tr>
										<th scope="col">Tipo de red</th>
										<th scope="col">Nombre en la red</th>
										<th scope="col">Eliminar</th>
									</tr>
								</thead>
								<tbody>

									<?php foreach ($redes as $r) { ?>
										<tr>
											<td><?php echo $r['tipo_red'] ?></td>
											<td><?php echo $r['nombre_red'] ?></td>

											<?php echo form_open('user/delete_red/' . $r['red_social_id']) ?>
											<td><button type="submit" class="btn btn-danger">Eliminar</button>
											<td>
												<?php echo form_close(); ?>
										</tr>
									<?php } ?>

								</tbody>
							</table>

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
						</div>
					</div>
				</div>
			</div>

		</div>
		<br><br><br><br>
		<div id="actions">
			<a href="<?php echo site_url('user/delete/' . $user['usuario_id']); ?>" id="btn_eliminar" name="btn_eliminar" title="Eliminar" onclick="send()">🗙 Eliminar mi cuenta</a>
		</div>
		<?php echo form_close(); ?>

		<div class="box-body">
			<div class="form-group-photo">
				<?php echo "<img src='" . site_url('/resources/photos/' . $this->session->userdata['logged_in']['foto'])
					. "' alt='Editar Foto' title='Editar Foto'  width=70 height=70 id='photo_profile' />"; ?>

				<?php echo form_open_multipart('user/upload_photo/' . $user['usuario_id']); ?>
				<input type="file" name="txt_file" size="20" class="btn btn-primary" accept="image/jpeg,image/gif,image/png" />
				<br><br>
				<button type="submit" class="btn btn-primary">Cargar Foto</button>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>


<?php
} else {
	header("location: " . base_url());
}
?>