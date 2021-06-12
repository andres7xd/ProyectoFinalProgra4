
<div id="panel_app">
	<div class="box-header">
		<h2 class="box-title">Dirección de Envio</h2>
		<?php echo form_open('user/edit/' . $this->session->userdata['logged_in']['usuario_id']);?>
			<button type="submit" name="btn_return" id="btn_return" class="boton" title="Regresar">←</button>
		<?php echo form_close();?>
	</div>
	<?php echo form_open('direccion/add');?>
	<div id="edit_panel">
		<label for="txt_pais" class="control-label"><span class="text-danger">*</span>País:</label>
		<div class="form-group">
			<input type="text" name="txt_pais" value="<?php echo $this->input->post('txt_pais'); ?>" class="cajatexto" id="txt_pais" />
			<span class="text-danger"><?php echo form_error('txt_pais');?></span>
		</div>
		<label for="txt_provincia" class="control-label"><span class="text-danger">* </span>Provincia:</label>
		<div class="form-group">
			<input type="text" name="txt_provincia"  class="cajatexto" id="txt_provincia"  value="<?php echo $this->input->post('txt_provincia'); ?>" />
			<span class="text-danger"><?php echo form_error('txt_provincia');?></span>
		</div>
		<label for="txt_casillero" class="control-label"><span class="text-danger">*</span>Numero de Casillero:</label>
		<div class="form-group">
			<input type="text" name="txt_casillero" value="" class="cajatexto" id="txt_casillero"   value="<?php echo $this->input->post('txt_casillero'); ?>"/>
			<span class="text-danger"><?php echo form_error('txt_casillero');?></span>
		</div>
		<label for="txt_codigo" class="control-label"><span class="text-danger">*</span>Código Postal:</label>
		<div class="form-group">
			<input type="text" name="txt_codigo" value="" class="cajatexto" id="txt_codigo"   value="<?php echo $this->input->post('txt_codigo'); ?>"/>
			<span class="text-danger"><?php echo form_error('txt_codigo');?></span>
		</div>
		<label for="txt_observacion" class="control-label"><span class="text-danger" placeholder="">*</span>Observaciones:</label>
		<div class="form-group">
		<input type="text" name="txt_observacion" value="" class="cajatexto" id="txt_observacion" value="<?php echo $this->input->post('txt_observacion'); ?>" />
			<span class="text-danger"><?php echo form_error('txt_observacion');?></span>
		</div>
		<br><br>
		<div class="box-footer">
			<button type="submit" class="boton">GUARDAR</button>
		</div>
    </div>
	<?php echo form_close(); ?>	
	<h3>Mis Direcciones</h3>
	<table class="table-responsive" width= "650px" height="120px">
    <thead>
        <tr>
            <th>Pais</th>
            <th>Provincia</th>
			<th>Codigo_Postal</th>
			<th>Numero_Casillero</th>
			<th>Observaciones</th>
			<th>Acciones</th>
			
       </tr>
    </thead>
    <tbody>
	<?php foreach ($direccion as $d) { ?>
		<?php if ($d['usuario_id'] == $this->session->userdata['logged_in']['usuario_id']) { ?>
		<tr >
			<td><?php echo $d['pais']?></td>
			<td><?php echo $d['provincia']?></td>
			<td style="text-align: center;"><?php echo $d['codigo_postal']?></td>
			<td style="text-align: center;"><?php echo $d['numero_casillero']?></td>
			<td><?php echo $d['observaciones']?></td>
			<td>
			<div class="btn-group">
			<?php echo form_open('direccion/delete/'  . $d['direccion_envio_id']);?>
				<button type="submit" class="btn btn-danger" style="width: 60px; height: 25px; font-size: 15px; ">Delete</button>
			<?php echo form_close();?>
			<?php echo form_open()?>
				<button type="submit" class="btn btn-primary" style="width: 60px; height: 25px; font-size: 15px;  ">Edit</button>
			<?php echo form_close();?>
			</div>	
			</td>
		</tr>
		<?php } ?>
	<?php } ?>
    </tbody>        
		</table>
</div>