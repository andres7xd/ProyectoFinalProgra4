<div id="panel_app_prod">

    <div id="user_box_prod">

        <div id="logouts">
            <?php echo form_open('store/index'); ?>
            <button type="submit" name="btn_logout" id="btn_logout" class="boton" title="Salir">🗙</button>
            <?php echo form_close(); ?>
        </div>
    </div>
    <br>
</div>
<div>

    <div id="main_panel">

        <br><br>

        <div id="carrucel_producto" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <?php $cont1 = 0 ?>
                <?php foreach ($fotos_productos as $f) { ?>
                    <?php if ($cont1 == 0) { ?>
                        <button type="button" data-bs-target="#carrucel_producto" data-bs-slide-to="0" class="active" aria-current="true" aria-label=""></button>
                        <?php $cont1 = $cont1 + 1 ?>
                    <?php } else { ?>
                        <button type="button" data-bs-target="#carrucel_producto" data-bs-slide-to="<?php echo $cont1; ?>" aria-label=""></button>
                        <?php $cont1 = $cont1 + 1 ?>
                    <?php } ?>
                <?php } ?>
            </div>
            <div class="carousel-inner">
                <?php $cont = 0 ?>
                <?php foreach ($fotos_productos as $f) { ?>
                    <?php if ($cont == 0) { ?>
                        <div class="carousel-item active">
                            <img src="<?php echo site_url('resources/img_productos/' . $f['foto']); ?>" class="d-block w-100" alt="..." height="450px">
                        </div>
                        <?php $cont = 1 ?>
                    <?php } else { ?>
                        <div class="carousel-item">
                            <img src="<?php echo site_url('resources/img_productos/' . $f['foto']); ?>" class="d-block w-100" alt="..." height="450px">
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carrucel_producto" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carrucel_producto" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div id="info_productos">
            <?php foreach ($producto as $p) { ?>

                <div>
                    <div id="div_info_edit_prod">

                        <?php echo form_open('edit_product/edit_producto/' . $p["producto_id"]); ?>
                        <div class="div_info">
                            <span class="pre_prod_2">Nombre Producto: </span> <input type=text class="txt_prod" id="txt_prod_nombre" name="txt_prod_nombre" value="<?php echo ($this->input->post('txt_nombre') ? $this->input->post('txt_nombre') : $p['nombre']); ?>">
                        </div>

                        <div class="div_info">
                            <span class="pre_prod_2">Nombre Empresa: </span> <span class="resp_prod"><?php echo ($this->input->post('txt_empresa') ? $this->input->post('txt_empresa') : $p['nombre_real']); ?></span>
                        </div>

                        <div class="div_info">
                            <span class="pre_prod_2">Unidades Disponibles:</span> <input type=number class="txt_prod" id="txt_prod_unidades" name="txt_prod_unidades" value="<?php echo ($this->input->post('txt_disponibles') ? $this->input->post('txt_disponibles') : $p['unidades']); ?>">
                        </div>

                        <div class="div_info">
                            <span class="pre_prod_2">Fecha Publicacion:</< /span> <span class="resp_prod"><?php echo ($this->input->post('txt_fecha') ? $this->input->post('txt_fecha') : $p['fecha_publicacion']); ?></span>
                        </div>

                        <div class="div_info">
                            <span class="pre_prod_2">Ubicacion Actual: </span> <input type=text class="txt_prod" id="txt_prod_ubicacion" name="txt_prod_ubicacion" value="<?php echo ($this->input->post('txt_ubicacion') ? $this->input->post('txt_ubicacion') : $p['ubicacion_actual']); ?>">
                        </div>

                        <div class="div_info">
                            <span class="pre_prod_2">Precio (₡): </span> <input type=number class="txt_prod" id="txt_prod_precio" name="txt_prod_precio" value="<?php echo ($this->input->post('txt_precio') ? $this->input->post('txt_precio') : $p['precio']); ?>">
                        </div>

                        <div class="div_info">
                            <span class="pre_prod_2">Tiempo Envío (Días): </span> <input type=number class="txt_prod" id="txt_prod_tenvio" name="txt_prod_tenvio" value="<?php echo ($this->input->post('txt_t_envio') ? $this->input->post('txt_t_envio') : $p['tiempo_envio']); ?>">
                        </div>

                        <div class="div_info">
                            <span class="pre_prod_2">Costo Envío (₡): </span> <input type=number class="txt_prod" id="txt_prod_cenvio" name="txt_prod_cenvio" value="<?php echo ($this->input->post('txt_c_envio') ? $this->input->post('txt_c_envio') : $p['costo_envio']); ?>">
                        </div>

                        <div class="div_info">
                            <span class="pre_prod_2">Descripción: </span> <input type=text id="txt_prod_descripcion" name="txt_prod_descripcion" value="<?php echo $p["descripcion"] ?>">
                        </div>

                        <div class="div_info">
                            <span class="pre_prod_2">Categoria: </span>
                            <select id="select_categoria" name="select_categoria" value="" class="cajatexto">
                                <option value="<?php echo $p["categoria_id"]; ?>" selected><?php echo $p["categoria"]; ?></option>
                                <?php foreach ($categorias as $c) { ?>
                                    <?php if ($p["categoria"] != $c["categoria"]) { ?>
                                        <option value="<?php echo $c["categoria_id"]; ?>"><?php echo $c["categoria"]; ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <button type="submit" id="prod_edit_1" name="prod_edit" class="btn btn-primary">Editar</button>
                    <?php echo form_close(); ?>
                </div>
        </div>

        <div class="photo_prod">
            <?php echo form_open_multipart('edit_product/upload_photo/' . $p['producto_id']); ?>
            <input type="file" name="txt_file" size="20" class="btn btn-primary" accept="image/jpeg,image/gif,image/png" />
            <br><br>
            <button type="submit" class="btn btn-primary">Cargar Foto</button>
            <?php echo form_close(); ?>
        </div>

    <?php } ?>
    </div>
</div>