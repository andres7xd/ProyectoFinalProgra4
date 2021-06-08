
<?php

Class Product extends CI_Controller {

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
        $this->load->model('Product_model');
        $this->load->library('session');
    }

    function index($id)
    {   
        
        $data['producto'] = $this->Product_model->get_producto($id);
        
       
        $data['_view'] = 'product/index';
        $this->load->view('layouts/main', $data);

    }

}