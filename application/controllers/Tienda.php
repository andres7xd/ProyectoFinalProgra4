<?php

class Tienda extends CI_Controller
{

  function __construct()
    {
        parent::__construct();
        $this->load->model('Tienda_model');
        $this->load->library('session');
    }

    function index($tweets_data = array())
    {   
        $data['nombre_usuario'] = $this->Tienda_model->get_usuario_tienda();
        
       
        $data['_view'] = 'home/index';
        $this->load->view('layouts/main', $data);

    }


}