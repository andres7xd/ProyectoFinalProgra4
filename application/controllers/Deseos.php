<?php

class Deseos extends CI_Controller
{
    public $mensaje = null;
    public $mensaje_error = null;
    function __construct()
    {
        parent::__construct();
        $this->load->model('Deseos_model');
        $this->load->model('Product_model');
        $this->load->library('session');
    }

    function index()
    {
        $data['deseos'] = $this->Deseos_model->get_deseos($this->session->userdata['logged_in']['usuario_id']);
        $data['fotos_producto'] = $this->Deseos_model->get_fotos_producto();
        $data['message_display'] = $this->mensaje;
        $data['error_message'] = $this->mensaje_error;
        $data['_view'] = 'deseos/index';
        $this->load->view('layouts/main', $data);
    }

    function delete($id)
    {
        $this->Deseos_model->delete_deseo($id);
        $this->index();
    }

    function add_carrito($id){
        $exist = $this->Deseos_model->get_carritos($id,$this->session->userdata['logged_in']['usuario_id']);

        if(empty($exist)){
            $params = array(
                'usuario_id' =>  $this->session->userdata['logged_in']['usuario_id'],
                'producto_id' =>  $id,
                'cantidad_productos' =>  1,
            );
    
         
            $this->Product_model->add_carrito($params);
            $params = array();
            $this->mensaje = "Se ha añadido el producto al carrito";
        }
        else{
            $this->mensaje_error = "El producto ya se encuentra en el carrito";
        }
      
        $this->index('');



    }
}
