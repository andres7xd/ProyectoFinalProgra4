<?php

Class Carrito extends CI_Controller {

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
        $this->load->model('Carrito_model');
        $this->load->library('session');
    }

    function index()
    {    


        $data['productos'] = $this->Carrito_model->get_producto($this->session->userdata['logged_in']['usuario_id']);
        $data['fotos_producto'] = $this->Carrito_model->get_fotos_producto();
        $data['_view'] = 'carrito/index';
        $this->load->view('layouts/main', $data);
       
      
    }

    function eliminar_producto($id_carrito){
        $this->Carrito_model->delete($id_carrito);
        $this->index();
    }

    function aumentar_producto($id_carrito,$cantidad, $cantidad_maxima){
        $this->Carrito_model->aumentar_cantidad_producto($id_carrito,$cantidad,$cantidad_maxima);
        $this->index();
    }

    function disminuir_producto($id_carrito,$cantidad){
        $this->Carrito_model->disminuir_cantidad_producto($id_carrito,$cantidad);
        $this->index();
    }





}