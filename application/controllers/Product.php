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
        $data['fotos_productos'] = $this->Product_model->get_fotos_producto($id);
        $data['_view'] = 'product/index';
        $this->load->view('layouts/main', $data);
        if( isset($_POST['prod_carrito']) == true){
            $this->add_carrito($id);
        }

        if( isset($_POST['prod_deseos']) == true){
            $this->add_deseo($id);
        }

        
      
    }



    function add_carrito($id){
        $params = array(
            'usuario_id' =>  $this->session->userdata['logged_in']['usuario_id'],
            'producto_id' =>  $id,
            'cantidad_productos' =>  $this->input->post('txt_cantidad_prod'),
        );

     
        $this->Product_model->add_carrito($params);
        $params = array();

      

    }


    function add_deseo($id){
        $params_deseos =array(
            'usuario_id' =>  $this->session->userdata['logged_in']['usuario_id'],
            'producto_id' =>  $id,
        );


        $this->Product_model->add_deseo($params_deseos);
        $params_deseos = array();

    }

    function add_suscripciones($id,$id_producto){
        $params_suscripciones = array(
            'comprador_id' => $this->session->userdata['logged_in']['usuario_id'],
            'tienda_id' =>  $id,
        );
        
        $this->Product_model->add_suscripcion($params_suscripciones);
        $params_suscripciones = array();
        $this->index($id_producto);
    }


    function add_calificacion($id_producto,$id_usuario){
        $existe =  $this->Product_model->existe_calificacion($id_producto,$id_usuario);
      
         if(empty($existe)){
            $calificaciones = array(
                'usuario_id' => $id_usuario,
                'producto_id' =>  $id_producto,
                'calificacion' => $this->input->post('select_calificacion'),
            );
            
            $this->Product_model->add_calificacion_producto($calificaciones);
            $calificaciones = array();
          
        }

        else{
            foreach($existe as $e){
                $calificaciones = array(
            
                    'calificacion' => $this->input->post('select_calificacion'),
                );
                $this->Product_model->update_user($e['calificacion_producto_id'],$calificaciones);
                $calificaciones = array();
            }
           
         }
        $this->index($id_producto);
        
        
    }

}