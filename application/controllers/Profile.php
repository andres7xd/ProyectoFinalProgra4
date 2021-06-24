<?php

Class Profile extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('Profile_model');
        $this->load->library('session');
    }

    function index($id,$ventana_redireccionamiento)
    {    


        $data['usuario'] = $this->Profile_model->get_info_usuario($id);
       $data['ventana'] = $ventana_redireccionamiento;
        $data['_view'] = 'profile/index';
        $this->load->view('layouts/main', $data);
      
     
        
        
      
    }

   



    

}