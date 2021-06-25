<!DOCTYPE html>
<html lang="es">

<head>

<link rel="stylesheet" type="text/css" href="<?php echo site_url('resources/css/style.css'); ?>">

  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <script type="text/javascript" src="<?php echo site_url('resources/js/ruleta_js/TweenMax.min.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo site_url('resources/js/ruleta_js/Winwheel.min.js'); ?>"></script>
  <title>Ruleta con Librerias</title>
</head>

<body>
  <input type="button" value="Girar" onclick="miRuleta.startAnimation();" />
  <br /><br />
  <canvas id="canvas" height="400" width="400"></canvas>
  <script type="text/javascript" src="<?php echo site_url('resources/js/ruleta_js/functions.js'); ?>"></script>

  <br /><br />

  <input type="text" id="txt_premio" name="txt_premio"></input>

  <button type="submit" class="btn btn-primary" id="btn_reclamar_premio" data-bs-toggle="modal" data-bs-target="#premioModal">
  Reclamar Premio
      </button>



 
      

  <!-- Modal -->
  <div class="modal fade" id="premioModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          
        <?php if( $this->input->post('txt_premio')  == 'Bon $50'){  ?>
          
          <?php echo form_open('reporte_compras/index'); ?>
          <select id="select_categoria" name="select_categoria" value="<?php echo $this->input->post('select_categoria'); ?>" class="cajatexto" >
            <?php foreach ($tarjetas as $t) { ?>
              <option><?php echo $t['numero_tarjeta'] ?></option>
              <?php } ?>

          </select>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Aplicar premio</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
        <?php echo form_close(); ?>

        <?php }?>

          
      </div>
    </div>
  </div>

</body>



</html>