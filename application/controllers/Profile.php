<?php

Class Profile extends CI_Controller {

// function load_data_view($view)
//     {
//     	//precarga todos los datos con los que la vista debe iniciar
//     	$this->load->model('Home_model');
//        	$data['nombre_usuario'] = $this->Home_model->get_usuario_tienda();
//         $data['_view'] = $view;
// 		$this->load->view('layouts/main',$data);
//     }

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