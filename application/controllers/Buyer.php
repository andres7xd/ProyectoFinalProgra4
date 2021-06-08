
<?php

Class Buyer extends CI_Controller {

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
        $this->load->model('Home_model');
        $this->load->library('session');
    }

    function index()
    {   
        
        $data['usuarios'] = $this->Home_model->get_usuario_tienda();
        $data['productos'] = $this->Home_model->get_productos_vendidos();
       
        $data['_view'] = 'buyer/index';
        $this->load->view('layouts/main', $data);

    }

}
