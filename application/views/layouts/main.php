<!DOCTYPE HTML>
<html>
  <head>
  	<link rel="icon" href="<?php echo site_url('resources/img/favicon.png');?>" type="image/x-icon">
    <script type="text/javascript" src="<?php echo site_url('resources/js/axios.min.js');?>"></script>
    <script type="text/javascript" src="<?php echo site_url('resources/js/functions.js');?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo site_url('resources/css/style.css');?>">
    <link rel="stylesheet" href="<?php echo site_url('resources/css/reportes.css');?>">
    <title>Chatwitter</title>
  </head>

  <body id="main_page">
  	<div id="main_box">
	    <?php                    
	    if(isset($_view) && $_view)
	        $this->load->view($_view);
	    ?> 
    </div> 
  </body>
</html>