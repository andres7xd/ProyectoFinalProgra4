<?php
if ($message_display != null) {
    if (isset($message_display)) {
        echo "<div class='alert alert-primary alert-dismissible fade show' role='alert' style='font-size: 15px';>" . $message_display . "
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
    }
}

if (isset($error_message)) {
    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert' style='font-size: 15px';>" . $error_message . "
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
}

if (validation_errors() !== "") {
    echo "<<div class='alert alert-warning alert-dismissible fade show' role='alert' style='font-size: 15px';>>" . validation_errors() . "
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>";
}
?>


<head>
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('resources/css/style.css'); ?>">
</head>

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

        <div id="info_productos">
            <div>
                <div id="div_info_edit_prod">

                    <?php echo form_open('create_product/add'); ?>
                    <div class="div_info">
                        <span class="pre_prod_2">Nombre Producto: </span> <input type=text class="txt_prod" id="txt_prod_nombre" required="true" name="txt_prod_nombre" value="">
                    </div>

                    <div class="div_info">
                        <span class="pre_prod_2">Precio (₡): </span> <input type=number class="txt_prod" id="txt_prod_precio" required="true" name="txt_prod_precio" value="">
                    </div>

                    <div class="div_info">
                        <span class="pre_prod_2">Ubicacion Actual: </span> <input type=text class="txt_prod" id="txt_prod_ubicacion" required="true" name="txt_prod_ubicacion" value="">
                    </div>

                    <div class="div_info">
                        <span class="pre_prod_2">Tiempo Envío (Días): </span> <input type=number class="txt_prod" id="txt_prod_tenvio" required="true" name="txt_prod_tenvio" value="">
                    </div>

                    <div class="div_info">
                        <span class="pre_prod_2">Costo Envío (₡): </span> <input type=number class="txt_prod" id="txt_prod_cenvio" required="true" name="txt_prod_cenvio" value="">
                    </div>

                    <div class="div_info">
                        <span class="pre_prod_2">Categoria: </span>
                        <select id="select_categoria" name="select_categoria" value="" class="cajatexto">
                            <?php foreach ($categorias as $c) { ?>
                                <option value="<?php echo $c["categoria_id"]; ?>"><?php echo $c["categoria"]; ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="div_info">
                        <span class="pre_prod_2">Descripción: </span> <input type=text id="txt_prod_descripcion" name="txt_prod_descripcion" required="true" value="">
                    </div>

                    <div class="div_info">
                        <span class="pre_prod_2">Unidades Disponibles:</span> <input type=number class="txt_prod" id="txt_prod_unidades" required="true" name="txt_prod_unidades" value="">
                    </div>

                </div>

                <button type="submit" id="prod_edit" name="prod_edit" class="btn btn-primary">Añadir producto</button>
                <?php echo form_close(); ?>
            </div>
        </div>

        <img id="icono_marketplace_create_product" src="<?php echo site_url("/resources/icons/marketplace.png") ?>" width="208px" height="208px">

        <span id="span_icon">Solidez y confianza</span>

    </div>
</div>