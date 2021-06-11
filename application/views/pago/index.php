
<div id="panel_app">
	<div class="box-header">
		<h2 class="box-title">Método de Pago</h2>
		<?php echo form_open('user/edit/' . $this->session->userdata['logged_in']['usuario_id']);?>
			<button type="submit" name="btn_return" id="btn_return" class="boton" title="Regresar">←</button>
		<?php echo form_close();?>
	</div>
	<?php echo form_open('pago/add');?>
	<div id="edit_panel">
		<label for="txt_nombre" class="control-label"><span class="text-danger">*</span>Nombre en la tarjeta:</label>
		<div class="form-group">
			<input type="text" name="txt_nombre" value="<?php echo $this->input->post('txt_nombre'); ?>" class="cajatexto" id="txt_nombre" />
			<span class="text-danger"><?php echo form_error('txt_nombre');?></span>
		</div>
		<label for="txt_numero" class="control-label"><span class="text-danger">* </span>Número de Tarjeta:</label>
		<div class="form-group">
			<input type="text" name="txt_numero"  class="cajatexto" id="txt_numero"  placeholder="####-####-####-####" value="<?php echo $this->input->post('txt_numero'); ?>" />
			<span class="text-danger"><?php echo form_error('txt_numero');?></span>
		</div>
		<label for="txt_vencimiento" class="control-label"><span class="text-danger">*</span>Fecha de Vencimiento</label>
		<div class="form-group">
			<input type="text" name="txt_vencimiento" value="" class="cajatexto" id="txt_vencimiento"  placeholder="MM/AA" value="<?php echo $this->input->post('txt_vencimiento'); ?>"/>
			<span class="text-danger"><?php echo form_error('txt_vencimiento');?></span>
		</div>
		<label for="txt_codigo" class="control-label"><span class="text-danger">*</span>Código de Seguridad:</label>
		<div class="form-group">
			<input type="text" name="txt_codigo" value="" class="cajatexto" id="txt_codigo"  placeholder="CVV" value="<?php echo $this->input->post('txt_codigo'); ?>"/>
			<span class="text-danger"><?php echo form_error('txt_codigo');?></span>
		</div>
		<label for="txt_saldo" class="control-label"><span class="text-danger" placeholder="">*</span>Saldo:</label>
		<div class="form-group">
		<label for="lbl_dolar" class="control-label"><span  placeholder="">$</label><input type="text" name="txt_saldo" value="" class="cajatexto" id="txt_saldo" value="<?php echo $this->input->post('txt_saldo'); ?>" />
			<span class="text-danger"><?php echo form_error('txt_saldo');?></span>
		</div>
		<br><br>
		<div class="box-footer">
			<button type="submit" class="boton">GUARDAR</button>
		</div>
	<?php echo form_close(); ?>	
	<?php echo form_open('pago/get/'. $this->session->userdata['logged_in']['usuario_id']);?>
	<h3>Mis Tarjetas</h3>
	<table>
    <thead>
        <tr>
            <th>Numero de Tarjeta</th>
            <th>Fecha Vencimiento</th>
			<th>Saldo</th>
			<th>Delete</th>
			
       </tr>
    </thead>
    <tbody>
       <?php 	  
		if(!empty($data)) {
				foreach( $data as $C )
						{
							
							echo "<tr><td>".$C['numero_tarjeta']."</td>
									<td>".$C['fecha_vencimiento']."</td>
									<td>".$C['saldo']."</td> 
									<td>".$C['saldo']."</td>
								</tr>";
				}
		}
       ?>
    </tbody>        
		</table>
	<?php echo form_close(); ?>		
	</div>
</div>




