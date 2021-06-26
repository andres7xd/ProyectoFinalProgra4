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

  <div id="panel_app_add_user">
    <div class="box-header">
      <h2 class="box-title">Ruleta de la suerte</h2>
      <?php echo form_open('buyer/index'); ?>
      <button type="submit" name="btn_return" id="btn_return" class="boton" title="Regresar">←</button>
      <?php echo form_close(); ?>
    </div>

  </div>

  <div id="div_principal_ruleta">
    <div id="div_ruleta">
      <?php if (empty($ruleta)) { ?>

        

      <?php } else { ?>

        <?php foreach ($ruleta as $r) { ?>

          <?php if ($r['giros_disponibles'] >0) { ?>
            <input type="button" class="btn btn-primary" value="Girar" onclick="miRuleta.startAnimation();" />
        <br /><br />
        <?php } ?>
        <?php } ?>

      <?php } ?>


      <canvas id="canvas" height="400" width="400"></canvas>
      <script type="text/javascript" src="<?php echo site_url('resources/js/ruleta_js/functions.js'); ?>"></script>

      <br /><br />

      <?php echo form_open('ruleta/add_premio'); ?>
      <input type="text" id="txt_premio" name="txt_premio"></input>

      <button type="submit" class="btn btn-primary" id="btn_reclamar_premio" data-bs-toggle="modal" data-bs-target="#premioModal">
        Reclamar Premio
      </button>
      <?php echo form_close(); ?>

    </div>
  </div>
</body>



</html>