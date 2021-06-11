<?php

class Suscripciones_tienda extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Suscripciones_tienda_model');
        $this->load->library('session');
    }

    function index()
    {
      
        $data['suscripciones'] = $this->Suscripciones_tienda_model->get_usuarios_suscritos($this->session->userdata['logged_in']['usuario_id']);
        
        $data['_view'] = 'suscripciones_tienda/index';
        $this->load->view('layouts/main', $data);
        

        
    }

    
}
